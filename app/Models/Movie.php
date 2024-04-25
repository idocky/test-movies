<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Movie extends Model
{
    use HasFactory;

    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title_uk'
            ]
        ];
    }

    protected $fillable = ['title_uk', 'title_en', 'description_uk',
        'description_en', 'is_hidden', 'youtube_trailer_id', 'released_at', 'start_rental', 'end_rental'];

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'tags_movies',
            'movie_id',
            'tag_id'
        );
    }

    public function cast()
    {
        return $this->belongsToMany(
            Tag::class,
            'cast_movies',
            'movie_id',
            'cast_id'
        );
    }

    public function screenshots()
    {
        return $this->hasMany(Screenshot::class, 'movie_id');
    }

    public static function add($fields)
    {
        $movie = new static;
        $movie->fill($fields);

        return $movie;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function uploadPoster($photo)
    {
        if($photo == null){return;}
        $filename = Str::random(10) . '.' . $photo->extension();
        $photo->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function setGallery($screenshots)
    {
        if($screenshots == null){return;}
        foreach ($screenshots as $screen)
        {
            $filename = Str::random(10) . '.' . $screen->extension();
            $screen->storeAs('uploads', $filename);
            Screenshot::create([
                'movie_id' => $this->id,
                'screenshot' => $filename
            ]);
        }
    }

    public function setCast($ids)
    {
        if($ids == null){return;}

        $this->cast()->sync($ids);
    }

    public function setTags($ids)
    {
        if($ids == null){return;}

        $this->tags()->sync($ids);
    }

    public static function findBySlug($slug)
    {
        $movie = Movie::where('slug', $slug)->first();

        return $movie;
    }
}
