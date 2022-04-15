<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'fc_id',
        'qty',
        'price',
        'date',
        'day_selling_id',
        'sc_number'
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
            return "paid";
        }
        if ($check == 2) {
            return "cancelled";
        }
    }

    public function farmer()
    {
        return $this->hasOne('App\Models\User', 'id', 'farmer_id');
    }
}
