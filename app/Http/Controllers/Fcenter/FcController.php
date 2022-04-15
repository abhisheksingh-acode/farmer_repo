<?php

namespace App\Http\Controllers\Fcenter;

use App\Http\Controllers\Controller;
use App\Models\Allocation;
use App\Models\Drum;
use App\Models\FcOrder;
use App\Models\Logistic;
use App\Models\NineR;
use App\Models\User;
use Illuminate\Http\Request;

class FcController extends Controller
{
    public function index(FcOrder $model, Drum $drum)
    {
        $id = auth()->user()->id;
        $farmers = User::where('added_by', $id)->count();
        $orders = FcOrder::where('fc_id', $id)->count();

        $niner = $model->where('fc_id', auth()->user()->id)->get();
        $list = $model->idList($niner);
        $drumList = $drum->idList($drum->whereIn('fc_order_id', $list)->get());
        foreach ($drumList as $id) {
            $nine_r = NineR::where('drum_id', 'LIKE', "%$id%")->count();
        }

        $logi = Logistic::all()->count();

        $recent = $model->recentById(4, $id);

        return view("fc.home.index", compact('farmers', 'orders', 'nine_r', 'logi', 'recent'));
    }



    public function wallet()
    {
        $id = auth()->user()->id;
        $data = FcOrder::where('fc_id', $id)
            ->where(['status' => '2', 'mode' => 'cash'])
            ->orderBy('id', 'DESC')
            ->simplePaginate(10);

        return view("fc.wallet.index", compact('data'));
    }
}
