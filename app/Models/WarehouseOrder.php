<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WarehouseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_id', 'logistic_id', 'drums', 'qty', 'status', 'additional', 'created_at', 'updated_at'
    ];


    public function logistic()
    {
        return $this->hasOne('App\Models\Logistic', 'logistic_id', 'id');
    }
}
