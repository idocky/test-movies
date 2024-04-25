<?php

namespace App\Http\Controllers;

use App\Http\Requests\CastCreateRequest;
use App\Models\Cast;
use App\Models\CastType;
use Illuminate\Http\Request;

class CastController extends Controller
{
    public function index()
    {
        $cast = Cast::all();

        return view('admin.cast.index', [
            'cast' => $cast
        ]);
    }

    public function create()
    {
        $cast_types = CastType::all();

        return view('admin.cast.create', [
            'cast_types' => $cast_types
        ]);
    }

    public function store(CastCreateRequest $request)
    {
        $cast = Cast::add($request->all());

        $cast->uploadPhoto($request->image);

        return redirect()->route('cast.index');
    }

    public function destroy($id)
    {
        $cast = Cast::findOrFail($id);
        $cast->delete();

        return redirect()->route('cast.index');
    }
}
