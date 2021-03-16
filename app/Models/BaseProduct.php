<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaseProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id',
        'company_id',
        'order',
        'length'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getConfigurations()
    {
        return $this->hasMany(Configuration::class);
    }

}
