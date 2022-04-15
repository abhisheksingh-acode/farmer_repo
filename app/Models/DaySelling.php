<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaySelling extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'date'
    ];

    protected $appends = [
        'format_price'
    ];

    public function getFormatPriceAttribute()
    {
        return "₹" . $this->price . "00";
    }

    public function priceByQty($qty)
    {
        return ($qty > 0) ? $this->orderBy('id', 'DESC')->first()->price * $qty : '00';
    }

    public function getSellId()
    {
        return $this->orderBy('id', 'DESC')->first()->id;
    }
}
