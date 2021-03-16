<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function response;

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
        return $this->belongsTo(BaseProduct::class);
    }

    public function deleteIfNoChildren()
    {
        $children = self::where('parent_id', $this->id)->get();
        if ($children->isNotEmpty()) {
            return response(
                [
                    'title' => 'Niet gelukt',
                    'message' => 'Link heeft sublinks. Deze moeten eerst worden verwijderd.'
                ],
                200
            );
        } else {
            $this->delete();
            return response(
                [
                    'title' => 'Gelukt',
                    'message' => 'Link is met succes verwijderd'
                ],
                200
            );
        }
    }

}
