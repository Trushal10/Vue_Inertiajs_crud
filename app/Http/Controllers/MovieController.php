<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::with('genres:movie_id,genre')->get();
        return inertia('Movie/Index',  compact('movies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'director' =>'required|string',
            'producer' =>'required|string',
            'releaseDate' =>'required',
            'genre' =>'required',
            'verdict' =>'required',
        ]);

        $movie = Movie::create([
            'name' => $request->name,
            'director' => $request->director,
            'producer' => $request->producer,
           'releaseDate' => $request->releaseDate,
           'verdict' => $request->verdict,
        ]);

        $genres = [];
        foreach($request->genre as $genre) {
            $genres = ['genre'=>$genre];
            $movie->genres()->create($genres);
        }

        return redirect()->route('movies.index');
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' =>'required|string|max:255',
            'director' =>'required|string',
            'producer' =>'required|string',
           'releaseDate' =>'required',
            'genre' =>'required',
           'verdict' =>'required',
        ]);

        $movie = Movie::find($id);
        $movie->update([
            'name' => $request->name,
            'director' => $request->director,
            'producer' => $request->producer,
           'releaseDate' => $request->releaseDate,
           'verdict' => $request->verdict,
        ]);

        $movie->genres()->delete();

        $genres = [];
        foreach($request->genre as $genre) {
            $genres = ['genre'=>$genre];
            $movie->genres()->create($genres);
        }
        return redirect()->route('movies.index');
    }

    public function destroy(string $id)
    {
        $movie = Movie::with('genres:movie_id,genre')->find($id);
        
        $movie->delete();
    
        return redirect()->route('movies.index');
    }
}
