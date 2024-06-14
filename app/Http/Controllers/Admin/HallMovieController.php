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
        $hall = Hall::where('id', $request->hall_id)->first();
        $form_data = $request->all();
        // dd($form_data['hall_id']);
        //dd($hall);
        //$price_ticket = 0;
        //$form_data->$price_ticket;
        if($hall->seats_num > 50){
            $ticket_price = $hall->base_price + 2;
            $form_data['price_ticket'] = $ticket_price;
        }
        if($hall->isense == 1){
            $form_data['price_ticket'] = $form_data['price_ticket'] + 3;
            //$ticket_price = $hall->$form_data['price_ticket'] + 3;
            //$form_data['price_ticket'] = $ticket_price;
            //dd($form_data);

        }
        $newHallMovie = HallMovie::create($form_data);
        return redirect()->route('admin.halls_movies.index', $newHallMovie->id);
        
    }

     /**
      * Display the specified resource.
      */
     public function show(HallMovie $halls_movie)

     {   
        return view('admin.halls_movies.show', compact('halls_movie'));
     }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HallMovie $halls_movie)
    {
        $movies = Movie::all();
        $halls = Hall::all();
        $time_slots = TimeSlot::all();
        return view('admin.halls_movies.edit', compact('halls_movie', 'movies',
        'halls', 'time_slots'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HallMovie $halls_movie)
    {
        $hall = Hall::where('id', $request->hall_id)->first();
        $form_data = $request->all();
        if($hall->seats_num > 50){
            $ticket_price = $hall->base_price + 2;
            $form_data['price_ticket'] = $ticket_price;
        } else {
            $form_data['price_ticket'] = $hall->base_price;
        }
        if($hall->isense == 1){
            $form_data['price_ticket'] = $form_data['price_ticket'] + 3;
        }
        $halls_movie->update($form_data);
        return redirect()->route('admin.halls_movies.show', $halls_movie->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HallMovie $halls_movie)
    {
        $halls_movie->delete();
        return redirect()->route('admin.halls_movies.index');
    }
}
