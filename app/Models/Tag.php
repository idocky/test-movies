<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use Sluggable;

    public $timestamps = false;
    protected $fillable = ['title_uk', 'title_en'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_uk'
            ]
        ];
    }
}
