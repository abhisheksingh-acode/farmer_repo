<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Allocation;
use App\Models\Fcenter;
use App\Models\FcOrder;
use App\Models\OrderTable;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
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

    public function index(Allocation $model, Request $request)
    {
        $data = $model::orderBy('id', 'DESC')->simplePaginate(4);

        $fcenters  = Fcenter::all();


        if ($q = $request->search) {
            $result = Fcenter::orderBy('id', 'DESC')
                ->where('name', 'LIKE', "%$q%")
                ->orWhere('email', 'LIKE', "%$q%")
                ->orWhere('phone', 'LIKE', "%$q%")
                ->orWhere('pincode', 'LIKE', "%$q%")
                ->select('id')
                ->get();

            $list = array();
            foreach ($result as $key => $value) {
                $list[] = $value->id;
            }

            $data = $model::whereIn('fc_id', $list)->simplePaginate(4);
        }

        return view("admin.payment.index", compact('data', 'fcenters'));
    }


    public function show($id, FcOrder $model, Request $request)
    {
        $data = $model::where(['fc_id' => $id, 'mode' => 'cash'])->get();

        if ($q = $request->input()) {
            $data = $model::where(['fc_id' => $id, 'mode' => 'cash'])
                ->orWhere('date', 'LIKE', "%$q->date%")
                ->orWhere('sc_number', 'LIKE', "%$q->search%")
                ->orWhere('6r', 'LIKE', "%$q->search%")
                ->orWhere('status', 'LIKE', "%$q->status%")
                ->get();
        }

        return view("admin.payment.show", compact('data', 'id'));
    }

    public function store(Request $req, Allocation $model, Fcenter $user)
    {
        $validate = $req->validate([
            'fc_id' => ['required', 'exists:fcenters,id'],
            'amount' => ['required', 'min:2']
        ], [
            'amount.min' => 'minimum amount should be higher than 10'
        ]);

        try {
            DB::beginTransaction();

            $validate['status'] = 1;
            $data = $model::create($validate);

            $amount = $model->getSumById($req->fc_id);
            $user->allocateById($req->fc_id, $amount);

            DB::commit();
            return back()->with('success', $validate['amount'] . ' allocated to facilitator id ' . $validate['fc_id']);
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('fail', $ex->getMessage());
        }

        $model::create($validate);

        return back()->withSuccess('operation performed successfuly');
    }


    public function history(Request $request)
    {

        $data = Allocation::orderBy('id', 'DESC')->simplePaginate(10);

        return view("admin.payment.history", compact('data'));
    }

    public function request()
    {
        $data = FcOrder::where([
            'mode' => 'online',
            'status' => '1'
        ])->get();


        return view("admin.payment.request", compact("data"));
    }

    public function pay($sc, Request $request)
    {
        /* $sc = sc_number
         pay online to farmer and update order status to 1 = paid and accepted */
        try {
            DB::beginTransaction();

            $data = FcOrder::where(['sc_number' => $sc, 'status' => '1'])->first();

            $query = FcOrder::where(['sc_number' => $sc, 'status' => '1'])->update(['status' => '2']);

            OrderTable::where('id', $data->sc_order->id)->update(['status' => '1']);

            DB::commit();

            return back()->with('success', 'amount paid for order successfuly');
        } catch (\Exception $ex) {
            DB::rollBack();
            return back()->with('fail', $ex->getMessage());
        }
    }
}
