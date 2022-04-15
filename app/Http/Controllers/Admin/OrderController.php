<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DaySelling;
use App\Models\Fcenter;
use App\Models\FcOrder;
use App\Models\NineR;
use App\Models\OrderTable;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $data = FcOrder::orderBy('id', 'DESC')->simplePaginate(10);
        return view("admin.order.index", compact('data'));
    }

    public function create()
    {
        return view("admin.order.create");
    }


    public function view($id)
    {
        $result = FcOrder::find($id);

        $data = "<form class='col-12'>
        <div class='row'>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>S.C No.</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->sc_number}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>Farmer ID</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->sc_order->farmer->id}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>Name</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->sc_order->farmer->name}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>Phone No</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->sc_order->farmer->phone}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>6r No.</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->six_r}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>Location</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->sc_order->farmer->address}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>Quantity</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->g_qty}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>Quantity Received</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->r_qty}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>Price </b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->amount}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b>Payment Mode</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->mode}</p>
            </div>
        </div>
        <div class='row '>
            <div class='col-md-5 col-4 col-sm-2'>
                <label for='inputbank name' class=''><b> Date</b></label>
            </div>
            <div class='col-md-7 col-8 col-sm-2'>
                <p style='color:#c7c7c7;'>{$result->created_at}</p>
            </div>
        </div>
    </form>";

        return $data;
    }


    public function price($qty = 0, DaySelling $model)
    {
        return $model->priceByQty($qty);
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

            return redirect()->route('admin.order.index')->with('success', 'order has been created for farmer id - ' . $id . ' unique SC number: ' . $validate['sc_number']);
        } catch (\Exception $ex) {
            DB::rollBack();

            return back()->with('fail', $ex->getMessage());
        }
    }


    public function nine_r(Request $request)
    {
        $data = NineR::orderBy('id', 'DESC')->simplePaginate(10);

        $fcenters = Fcenter::all();

        // return $data[0];

        // if ($q = $request->input()) {

        //     $data = NineR::where('fc_id', $q['fc_id'])
        //         ->orWhere('created_at', $q['date'])
        //         ->simplePaginate(10);
        // }
        return view("admin.nine_r.index", compact('data', 'fcenters'));
    }
}
