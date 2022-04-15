<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'lang',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];


    public function searchFilter($request)
    {
        $name = $request['name'] ?? null;
        $query = $request['email_phone'] ?? null;
        $sortby = $request['sort_by'] ?? null;

        $model = $this;

        if ($sortby) {

            switch ($sortby) {
                case 'alphabetic_asc':
                    $type = 'name';
                    $order = "ASC";
                    break;
                case 'alphabetic_dsc':
                    $type = 'name';
                    $order = "DESC";

                    break;
                case 'date_asc':
                    $type = 'id';
                    $order = "ASC";
                    break;
                case 'date_dsc':
                    $type = 'id';
                    $order = "DESC";
                    break;
            }

            $model = $model::orderBy($type, $order);
        }

        if ($name) {
            $model = $model->where("name", "LIKE", "%$name%");
        }
        if ($query) {
            $model = $model->orWhere("email", "LIKE", "%$query%");
            $model = $model->orWhere("phone", "LIKE", "%$query%");
        }

        return $model->get();
    }


    public function bank()
    {
        return $this->hasOne('App\Models\BankDetail', 'farmer_id', 'id');
    }

    public function kyc()
    {
        return $this->hasOne('App\Models\Kyc', 'farmer_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\OrderTable', 'farmer_id', 'id');
    }
}
