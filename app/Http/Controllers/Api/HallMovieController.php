<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HallMovie;

class HallMovieController extends Controller
{
    public function index()
    {
        $halls_movies = HallMovie::all();
        // dd($halls_movies);
        return response()->json([
            'success' => true,
            'results' => $halls_movies
        ]);
    }

    public function show($id)
    {
        $hall_movie = HallMovie::where('id', $id)->with('movie', 'hall', 'time_slots')->first();
        if($hall_movie){
            return response()->json([
                'success'=> true,
                'results' => $hall_movie
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Post not found'
            ]);
        }
    }
}