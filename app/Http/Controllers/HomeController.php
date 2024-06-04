<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $halls = Hall::all();
        $movies = Movie::all();
        return view('home', compact('halls', 'movies'));
    }
}
