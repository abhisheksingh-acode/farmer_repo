<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Warehouse extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'pincode', 'password', 'status', 'drum_total', 'qty_total', 'created_at', 'update_at',
    ];

    public function orders()
    {
        return $this->hasMany('App\Models\WarehouseOrder', 'warehouse_id', 'id');
    }
}
