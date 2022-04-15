<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'farmer_id',
        'bank_name',
        'ac_holder',
        'ac_number',
        'ac_ifsc',
    ];
}
