<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuration extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'base_product_id',
        'extended_product_id',
        'links_id'
    ];

    public function getLink()
    {
        return $this->belongsTo(Link::class);
    }

    public function getBaseProduct()
    {
        return $this->belongsTo(BaseProduct::class);
    }

    public function getExtendedProduct()
    {
        return $this->hasMany(ExtendedProduct::class);
    }
}
