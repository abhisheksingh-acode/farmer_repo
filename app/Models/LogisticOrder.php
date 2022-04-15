<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogisticOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'nine_r', 'logistic_id', 'source', 'destiny', 'gate_pass', 'additional', 'status'
    ];

    protected $appends = [
        'status_format'
    ];


    public function lg()
    {
        return $this->hasOne('App\Models\Logistic', 'id', 'logistic_id');
    }


    public function fc()
    {
        return $this->hasOne('App\Models\Fcenter', 'id', 'source');
    }


    public function warehouse()
    {
        return $this->hasOne('App\Models\Warehouse', 'id', 'destiny');
    }

    public function recentById($id)
    {
        return $this->where('source', $id)->where('status', '!=', '4')->orderBy('id', 'DESC')->simplePaginate(10);
    }
    public function history($id)
    {
        return $this->where('source', $id)->where('status', '=', '4')->orderBy('id', 'DESC')->simplePaginate(10);
    }

    public function nr()
    {
        return $this->hasOne('App\Models\NineR', 'nine_r', 'nine_r');
    }

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
            return "picked up";
        }
        if ($check == 3) {
            return "cancelled";
        }
        if ($check == 4) {
            return "delivered";
        }
    }
}
