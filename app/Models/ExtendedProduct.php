<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExtendedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'order',
        'price',
        'links_id',
        'length',
        'width',
        'percent'
    ];

    public function link()
    {
        return $this->belongsTo(Link::class);
    }

}
