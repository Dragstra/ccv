<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfiguredLink extends Model
{
    use HasFactory;

    public function getLink()
    {
        return $this->belongsTo(Link::class);
    }

    public function getConfiguration()
    {
        return $this->belongsTo(Configuration::class);
    }

    public function getFinalProduct()
    {
        return $this->hasMany(FinalProduct::class);
    }
}
