<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\controller;
use App\Models\TimeSlot;
use App\Models\Movie;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $time_slots = TimeSlot::all();
        return view('admin.time_slots.index', compact('time_slots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        return view('admin.time_slots.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $newTime_Slot = TimeSlot::create($form_data);
        return redirect()->route('admin.time_slots.show', $newTime_Slot->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeSlot $time_Slot)
    {
        return view('admin.time_slots.show', compact('time_Slot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimeSlot $time_Slot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimeSlot $time_Slot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeSlot $time_Slot)
    {
        //
    }
}
