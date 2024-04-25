<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);
        $locale = LaravelLocalization::getCurrentLocale();

        return view('home', [
            'movies' => $movies,
            'locale' => $locale
        ]);
    }
}
