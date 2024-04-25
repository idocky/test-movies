<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieCreateRequest;
use App\Http\Requests\MovieUpdateRequest;
use App\Models\Cast;
use App\Models\Movie;
use App\Models\Tag;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::paginate(10);

        return view('admin.dashboard', [
            'movies' => $movies
        ]);
    }

    public function create()
    {
        $tags = Tag::all();
        $cast = Cast::all();

        return view('admin.movies.create', [
            'tags' => $tags,
            'cast' => $cast
        ]);
    }

    public function store(MovieCreateRequest $request)
    {
        $movie = Movie::add($request->all());
        $movie->uploadPoster($request->file('image'));
        $movie->setGallery($request->file('screenshots'));
        $movie->setTags($request->tags);
        $movie->setCast($request->cast);

        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $tags = Tag::pluck('title_uk', 'id')->toArray();
        $cast = Cast::pluck('title_uk', 'id')->toArray();

        return view('admin.movies.edit', [
            'movie' => $movie,
            'tags' => $tags,
            'cast' => $cast
        ]);
    }

    public function update(MovieUpdateRequest $request, $id)
    {
        $movie = Movie::find($id);
        $movie->edit($request->all());
        $movie->uploadPoster($request->file('image'));
        $movie->setGallery($request->file('screenshots'));
        $movie->setTags($request->tags);
        $movie->setCast($request->cast);

        return redirect()->route('dashboard');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);

        $movie->delete();

        return redirect()->route('dashboard');
    }

    public function show($slug)
    {
        $movie = Movie::findBySlug($slug);
        $locale = LaravelLocalization::getCurrentLocale();

        return view('movie_info', [
            'movie' => $movie,
            'locale' => $locale
        ]);
    }
}
