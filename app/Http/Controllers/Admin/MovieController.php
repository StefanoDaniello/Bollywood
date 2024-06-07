<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Review;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $reviews = Review::all();
        $halls = Hall::all();
        return view('admin.movies.create', compact('reviews', 'halls'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {
        $form_data = $request->validated();
        
        if ($request->hasFile('cover_image')) {
            $path = Storage::put('movie_images', $request->cover_image);
            $form_data['cover_image'] = $path;
        }
        $newMovie = Movie::create($form_data);
        return redirect()->route('admin.movies.show', $newMovie->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie', 'reviews', 'halls'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $form_data = $request->validated();
        $movie->update($form_data);
        if ($request->hasFile('cover_image')) {
            $path = Storage::put('movie_images', $request->cover_image);
            $form_data['cover_image'] = $path;
        }
        return redirect()->route('admin.movies.show', $movie->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        // elimina il record dell' immagine della copertina
        if ($movie->cover_image) {
            Storage::delete($movie->cover_image);
        }
        $movie->delete();
        return redirect()->route('admin.movies.index')->with('message', 'Movie,' . $movie->name .' deleted successfully');
    }
}

