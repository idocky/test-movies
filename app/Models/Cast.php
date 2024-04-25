<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Cast extends Model
{
    use HasFactory;

    protected $table = 'cast';

    public $timestamps = false;

    protected $fillable = ['title_uk', 'title_en', 'type_id'];

    public function cast_type()
    {
        return $this->belongsTo(CastType::class, 'type_id');
    }

    public static function add($fields)
    {
        $cast = new static;
        $cast->fill($fields);
        $cast->save();

        return $cast;
    }

    public function uploadPhoto($photo)
    {
        if($photo == null){return;}
        $filename = Str::random(10) . '.' . $photo->extension();
        $photo->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }
}
