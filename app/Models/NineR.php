<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NineR extends Model
{
    use HasFactory;

    protected $fillable = [
        'nine_r', 'drum_id', 'gate_pass', 'status', 'fc_id', 'created_at', 'updated_at'
    ];

    protected $appends = [
        'qty_total',
        'status_format'
    ];

    // public function fc()
    // {
    //     return $this->hasOne('App\Models\Fcenter', 'id', 'fc_id');
    // }

    // public function lg()
    // {
    //     return $this->hasOne('App\Models\Logistic', 'id', 'logistic');
    // }
    public function lgOrder()
    {
        return $this->hasOne('App\Models\LogisticOrder', 'nine_r', 'nine_r');
    }

    public function getByFcID($id)
    {
        $data = Drum::all();
    }

    public function getQtyTotalAttribute()
    {
        $id = json_decode($this->drum_id);

        return Drum::whereIn('id', $id)->sum('qty');
    }

    public function getStatusFormatAttribute()
    {
        $code = $this->status;

        if ($code == 0) {
            return "pending";
        }
        if ($code == 1) {
            return "picked up";
        }
        if ($code == 2) {
            return "delivered";
        }
        if ($code == 3) {
            return "cancelled";
        }
    }
}
