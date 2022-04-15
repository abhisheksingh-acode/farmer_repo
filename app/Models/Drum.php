<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drum extends Model
{
    use HasFactory;

    protected $fillable = [
        'qty', 'fc_order_id'
    ];

    public function getFcById($ids)
    {
        return $this->whereIn('fc_order_id', $ids)->get();
    }

    public function idList($model)
    {
        $list = array();

        foreach ($model as $val) {
            $list[] = $val->id;
        }
        return $list;
    }
}
