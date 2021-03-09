<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'name',
        'parent_id'
    ];

    public function toTree()
    {

    }

    public function configuration()
    {
        return $this->belongsTo(Configuration::class);
    }

}
