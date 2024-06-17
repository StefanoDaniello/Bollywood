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
            'status' => 'success',
            'messsage'=> 'Halls and Movies',
            'results' => $halls_movies->load('movie', 'hall', 'time_slot')
        ]);
    }

    public function show($id)
    {
        $hall_movie = HallMovie::where('id', $id)
        ->with(['movie.reviews', 'hall', 'time_slot'])
        ->first();
        if($hall_movie){
            return response()->json([
               'status' => 'success',
                'message' => 'OK',
                'results' => $hall_movie
            ],200);
        } else {
            return response()->json([
                'status' => 'error',	
                'message' => 'Error'
            ],404);
        }
    }
}