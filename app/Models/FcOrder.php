<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class FcOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'sc_number', 'g_qty', 'r_qty', 'q', 'tax', 'mode', 'six_r', 'fc_id', 'status', 'amount', 'status'
    ];

    protected $appends = [
        "status_format"
    ];

    public function getStatusFormatAttribute()
    {

        $check = $this->status;

        if ($check == 0) {
            return "pending";
        }
        if ($check == 1) {
            return "approved";
        }
        if ($check == 2) {
            return "complete";
        }
        if ($check == 3) {
            return "cancelled";
        }
    }

    public function fc()
    {
        return $this->hasOne('App\Models\Fcenter', 'id', 'fc_id');
    }

    public function sc_order()
    {
        return $this->hasOne('App\Models\OrderTable', 'sc_number', 'sc_number');
    }

    public function recent($count = 3)
    {
        return $this->orderBy('allocations.id', 'DESC')
            ->limit($count)
            ->get();
    }
    public function recentById($count = 3, $id)
    {
        return $this->where('fc_id', $id)
            ->orderBy('id', 'DESC')
            ->limit($count)
            ->get();
    }

    public function idList($model)
    {
        $list = array();

        foreach ($model as $val) {
            $list[] = $val->id;
        }
        return $list;
    }
}
