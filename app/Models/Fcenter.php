<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Fcenter extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'pincode',
        'password',
        'allocation',
        'status'
    ];

    protected $appends = ['spent', 'total'];


    protected $hidden = [
        'password',
    ];

    public function allocateById($id, $amount)
    {
        return Self::where('id', $id)->update(['allocation' => $amount]);
    }

    public function allocations()
    {
        return $this->hasMany('App\Models\Allocation', 'id', 'fc_id');
    }

    public function farmer()
    {
        return $this->hasMany('App\Models\User', 'added_by', 'id');
    }



    public function getTotalAttribute()
    {
        return Allocation::where('fc_id', $this->id)->sum('amount');
        // return "200";
    }
    public function getSpentAttribute()
    {
        return FcOrder::where([
            'fc_id' => $this->id,
            'mode'  => 'cash'
        ])->sum('amount');
    }
}
