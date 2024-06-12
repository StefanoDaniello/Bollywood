<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Hall;
use App\Models\Time_Slot;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(HallMovie $HallMovie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HallMovie $HallMovie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HallMovie $HallMovie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HallMovie $HallMovie)
    {
        //
    }
}
