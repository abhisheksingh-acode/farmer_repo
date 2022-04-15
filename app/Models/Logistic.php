<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Logistic extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'pincode',
        'password',
        'status'
    ];


    public function orders()
    {
        return $this->hasMany('App\Models\LogisticOrder', 'logistic_id', 'id');
    }
}
