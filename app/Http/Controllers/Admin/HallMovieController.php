<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Hall;
use App\Models\TimeSlot;
use App\Models\HallMovie;
use Illuminate\Support\Facades\DB;


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
        $HallMovie = HallMovie::all();
        $time_slots = TimeSlot::first();
        $hall = Hall::where('id', $request->hall_id)->first();
        // $form_data = $request->validate([
        //     'date' => 'required|date|exists:hall_movie,date',
        //     'time_slot_id' => 'required|integer|exists:hall_movie,time_slot_id',
        //     'hall_id' => 'required|integer|exists:hall_movie,hall_id',
        //     'movie_id' => 'required'
        // ]);
        
        $form_data = $request->all();
        
        // dd($form_data['hall_id']);
        //dd($hall);
        //$price_ticket = 0;
        //$form_data->$price_ticket;

        


        if($hall->isense === 1){
            $ticket_price = $hall->base_price;
            $form_data['price_ticket'] = $ticket_price + 3;
            //dd($form_data);
        } else {
            $ticket_price = $hall->base_price;
            $form_data['price_ticket'] = $ticket_price;
        }
        
        if (DB::table('hall_movie')
            ->where('date', $form_data['date'])
            ->where('time_slot_id', $form_data['time_slot_id'])
            ->where('hall_id', $form_data['hall_id'])
            ->exists()) {
            return redirect()->route('admin.halls_movies.index')->with('message', 'Proiezione gia esistente cambiare la data o la sala!');
        }
    
        // dd($time_slots);
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

        if($hall->isense === 1){
            $ticket_price = $hall->base_price;
            $form_data['price_ticket'] = $ticket_price + 3;
            //dd($form_data);
        } else {
            $ticket_price = $hall->base_price;
            $form_data['price_ticket'] = $ticket_price;
        }

        if (DB::table('hall_movie')
        ->where('date', $form_data['date'])
        ->where('time_slot_id', $form_data['time_slot_id'])
        ->where('hall_id', $form_data['hall_id'])
        ->exists()) {
        return redirect()->route('admin.halls_movies.index')->with('message', 'Proiezione gia esistente cambiare la data o la sala!');
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
