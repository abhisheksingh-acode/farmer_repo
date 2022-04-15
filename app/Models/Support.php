<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = ['role', 'role_id', 'query', 'file', 'reply', 'status', 'created_at', 'updated_at'];


    protected $appends = [
        'status_format'
    ];

    public function getStatusFormatAttribute()
    {
        $code = $this->status;

        if ($code == 0) {
            return "pending";
        }
        if ($code == 1) {
            return "resolved";
        }
    }

    public function activeFcTickets()
    {
        return $this->where(['role' => 'fcenter', 'role_id' => auth()->user()->id])->orderBy('id', 'DESC')->get();
    }


    public function activeFarmerTickets()
    {
        return $this->where(['role' => 'user', 'role_id' => auth()->user()->id])->orderBy('id', 'DESC')->get();
    }


    public function activeWarehouseTickets()
    {
        return $this->where(['role' => 'warehouse', 'role_id' => auth()->user()->id])->orderBy('id', 'DESC')->get();
    }

    public function activeLogiTickets()
    {
        return $this->where(['role' => 'logistic', 'role_id' => auth()->user()->id])->orderBy('id', 'DESC')->get();
    }

    public function getByRole($role)
    {
        return $this->where('role', $role)->orderBy('id', 'DESC')->get();
    }

    public function farmer()
    {
        return $this->hasOne('App\Models\User', 'id', 'role_id');
    }
    public function warehouse()
    {
        return $this->hasOne('App\Models\Warehouse', 'id', 'role_id');
    }
    public function lg()
    {
        return $this->hasOne('App\Models\Logistic', 'id', 'role_id');
    }
    public function fc()
    {
        return $this->hasOne('App\Models\Fcenter', 'id', 'role_id');
    }
}
