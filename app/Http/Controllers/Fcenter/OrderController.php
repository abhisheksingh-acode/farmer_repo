<?php

namespace App\Http\Controllers\Fcenter;

use App\Http\Controllers\Controller;
use App\Models\DaySelling;
use App\Models\Drum;
use App\Models\Fcenter;
use Illuminate\Http\Request;
use App\Models\FcOrder;
use App\Models\Logistic;
use App\Models\LogisticOrder;
use App\Models\NineR;
use App\Models\OrderTable;
use App\Models\User;
use App\Models\Warehouse;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /*
     fc order status;
     0 = pending work for fc on order
     1 = fc proceeded work on order pending for pay or paid by cash
     2 = order is successfuly accepted and paid


     order table status;
     0 = order created but payment not released
     1 = order accepted and paid
     2 = order rejected for various reason
    */

    public function index(Request $request)
    {
        $drums = Drum::select('fc_order_id')->get();
        $list = array();
        foreach ($drums as $val) {
            $list[] = $val->fc_order_id;
        }
        $data = FcOrder::whereNotIn('id', $list)->orderBy('id', 'DESC')->simplePaginate(10);
        $warehouse = Warehouse::all();
        $logi = Logistic::all();

        return view("fc.order.index", compact('data', 'warehouse', 'logi'));
    }

    public function proceed($sc, Request $request, DaySelling $model)
    {

        if (FcOrder::where('sc_number', $sc)->first()->status == 2) {
            return back()->with('fail', 'order already approved, next step is create 9r');
        }
        $input = $request->all();

        unset($input['_token']);
        $input['amount'] = $model->priceByQty($input['r_qty']);
        $input['status'] = '1';

        if ($input['mode'] == 'cash') {
            $input['status'] = '2';
        }

        $fcOrderTable = FcOrder::where('sc_number', $sc)->update($input);

        // update for farmer order table
        if ($fcOrderTable) {
            if ($input['mode'] == 'cash') {
                $orderTable = OrderTable::where('sc_number', $sc)->update(['status' => '1']);
            } else {
                $orderTable = OrderTable::where('sc_number', $sc)->update(['status' => '0']);
            }
        }

        return back()->with('success', 'order approved successfuly');
    }

    public function create()
    {
        return view("fc.order.create");
    }

    public function store(Request $request, OrderTable $model, DaySelling $saleModel)
    {
        $validate = $request->validate(
            [
                'farmer_id' => 'required_without:phone',
                'phone' => 'required_without:farmer_id',
                'fc_id'     => 'required',
                'price'     => 'required',
                'qty'       => 'required',
                'mode'      => 'required'
            ],
            [
                'fc_id.required' => 'facilitator field is required',
                'farmer_id.exists'     => 'farmer id is not registered',
                'phone.required_without'     => 'farmer phone field is required without farmer id',
                'mode.required'     => 'payment mode field is required',
            ]
        );

        if ($validate['farmer_id'] == null) {
            $id = User::where('phone', $validate['phone'])->first()->id ?? false;
        } else {
            $id = User::find($validate['farmer_id'])->id ?? false;
        }
        if (!$id) {
            return back()->with('fail', 'farmer id is not registered');
        }

        unset($validate['phone']);

        $validate['farmer_id'] = $id;
        $validate['date'] = now();
        $validate['status'] = "0";
        $validate['day_selling_id'] = $saleModel->getSellId();
        $validate['sc_number'] = Str::random(16);
        $validate['price'] = $saleModel->priceByQty($validate['qty']);

        try {
            DB::beginTransaction();
            $data = $model::create($validate);

            $validate['g_qty'] = $validate['qty'];
            FcOrder::create($validate);

            DB::commit();

            return redirect()->route('fcenter.order.index')->with('success', 'order has been created for farmer id - ' . $id . ' unique SC number: ' . $validate['sc_number']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('fail', $ex->getMessage());
        }
    }


    public function nine_r(FcOrder $model, Drum $drum)
    {

        $data = $model->where('fc_id', auth()->user()->id)->get();
        $list = $model->idList($data);

        $drumList = $drum->idList($drum->whereIn('fc_order_id', $list)->get());

        foreach ($drumList as $id) {
            $data = NineR::where('drum_id', 'LIKE', "%$id%")->get();
        }

        return view("fc.nine_r.index", compact('data'));
    }

    public function price($qty = 0, DaySelling $model)
    {
        return $model->priceByQty($qty);
    }

    public function create_nine_r(Request $req, Drum $model)
    {

        $fc_order_id = $req->fc_order_id;

        // drums filled
        $drums =  $this->fill_by_fc_order_ids($fc_order_id, $model);

        // create nine_r table
        $drum_ids = array();

        foreach ($drums as $val) {
            $drum_ids[] = "$val->id";
        }
        $drum_ids  = json_encode($drum_ids);

        $nine_r = $this->create_nine_r_table_with_drums($drum_ids, $req->nine_r, $req->gate_pass);

        if ($nine_r) {
            $logi =  $this->create_logi_order_table_with_9r($req);
        }
        return $logi;
    }


    public function fill_by_fc_order_ids($ids, $model)
    {
        foreach ($ids as $val) {
            $fcorder = FcOrder::find($val);
            $qty     = $fcorder->r_qty;

            $drums = array();
            /* insert if qty is less than capacity of drum */
            if ($qty < 20 && $qty > 0) {
                $drums[] = $model->create([
                    'qty' => $qty,
                    'fc_order_id' => $val
                ]);
            } else {

                $drumsCanFill   = floor($qty / 20);
                $remainder      = $qty % 20;

                // x times loop run and fill drums
                for ($i = 0; $i < $drumsCanFill; $i++) {
                    $drums[] = $model->create([
                        'qty' => 20,
                        'fc_order_id' => $val
                    ]);
                }
                // if remainder higher than 0 fill in a drum
                $drums[] = $model->create([
                    'qty' => $remainder,
                    'fc_order_id' => $val
                ]);
            }

            return $drums;
        }
    }

    public function create_nine_r_table_with_drums($drum_ids, $nine_r, $gate_pass)
    {
        if ($drum_ids) {
            $data = NineR::create([
                'nine_r' => $nine_r,
                'drum_id' => $drum_ids,
                'gate_pass' => $gate_pass,
            ]);
            return $data;
        }
    }

    public function create_logi_order_table_with_9r($request)
    {
        if ($request) {
            $data = LogisticOrder::create([
                'nine_r' => $request->nine_r,
                'logistic_id' => $request->logistic_id,
                'source' => $request->logistic_id,
                'destiny' => $request->warehouse_id,
                'gate_pass' => $request->gate_pass ?? '',
                'status' => '0',
            ]);
            return $data;
        }
    }
}
