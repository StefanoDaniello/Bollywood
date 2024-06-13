<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Hall;
use App\Models\TimeSlot;

use App\Models\HallMovie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HallMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(HallMovie::all());
        $halls_movies = HallMovie::all();
        return view('admin.halls_movies.index', compact('halls_movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        $halls = Hall::all();
        $time_slots = TimeSlot::all();
        return view('admin.halls_movies.create', compact('movies', 'halls', 'time_slots'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $newHallMovie = HallMovie::create($form_data);
        return redirect()->route('admin.halls_movies.show', $newHallMovie->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(HallMovie $HallMovie)
    {
        return view('admin.halls_movies.show', compact('HallMovie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HallMovie $HallMovie)
    {
        $movies = Movie::all();
        $halls = Hall::all();
        $time_slots = TimeSlot::all();
        return view('admin.halls_movies.edit', compact('HallMovie', 'movies', 'halls', 'time_slots'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HallMovie $HallMovie)
    {
        $form_data = $request->all();
        $HallMovie->update($form_data);
        return redirect()->route('admin.halls_movies.show', $HallMovie->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HallMovie $HallMovie)
    {
        $HallMovie->delete();
        return redirect()->route('admin.halls_movies.index');
    }
}
