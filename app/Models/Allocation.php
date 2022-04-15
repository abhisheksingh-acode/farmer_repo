<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Cast\Double;
use SnoerenDevelopment\CurrencyCasting\Currency;

class Allocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'fc_id',
        'amount',
        'status',
        'additional'
    ];

    protected $appends = [
        'format_amount'
    ];

    public function getSum()
    {
        return $this->get()->sum('amount');
    }

    public function getSumById($id)
    {
        return $this->where('fc_id', $id)->get()->sum('amount');
    }

    public function getByFcId($id)
    {
        return $this->where('fc_id', $id)->orderBy('id', 'DESC')->get();
    }


    public function recent($count = 3)
    {
        return $this->join('fcenters', 'allocations.fc_id', '=', 'fcenters.id')
            ->orderBy('allocations.id', 'DESC')
            ->select('fcenters.name AS name', 'allocations.*')
            ->limit($count)
            ->get();
    }

    protected function getFormatAmountAttribute()
    {
        return "₹" . $this->amount . ".00";
    }

    public function fc()
    {
        return $this->hasOne('App\Models\Fcenter', 'id', 'fc_id');
    }
}
