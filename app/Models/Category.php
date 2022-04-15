<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'parent_id', 'status'
    ];

    public function video()
    {
        return $this->hasMany('App\Models\Video', 'cat_id', 'id');
    }
}
