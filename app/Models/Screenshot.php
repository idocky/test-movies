<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['movie_id', 'screenshot'];
}
