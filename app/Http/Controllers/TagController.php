<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagCreateRequest;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return view('admin.tags.index', [
            'tags' => $tags
        ]);
    }
    public function create()
    {
        return view('admin.tags.create');
    }

    public function store(TagCreateRequest $request)
    {
        Tag::create($request->all());

        return redirect()->route('tags.index');
    }

    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);

        $tag->delete();

        return redirect()->route('tags.index');
    }
}
