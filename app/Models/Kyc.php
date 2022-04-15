<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyc extends Model
{
    use HasFactory;

    protected $table = 'kyc';

    protected $fillable = [
        'photo',
        'doc_type',
        'doc',
        'farmer_id',
    ];

    protected $appends = [
        'document'
    ];


    public function getDocumentAttribute()
    {
        if ($this->doc_type != "electricity") {
            return ucfirst($this->doc_type) . " Card";
        }
        return ucfirst($this->doc_type) . " Bill";
    }
}
