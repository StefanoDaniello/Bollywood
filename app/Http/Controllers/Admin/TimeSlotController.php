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
        return view('admin.time_slots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $newTime_slot = TimeSlot::create($form_data);
        return redirect()->route('admin.time_slots.show', $newTime_slot->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(TimeSlot $time_slot)
    {
        return view('admin.time_slots.show', compact('time_slot'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimeSlot $time_slot)
    {
        return view('admin.time_slots.edit', compact('time_slot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimeSlot $time_slot)
    {
        $from_data = $request->all();
        $time_slot->update($from_data);
        return redirect()->route('admin.time_slots.show', $time_slot->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TimeSlot $time_slot)
    {
        $time_slot->delete();
        return redirect()->route('admin.time_slots.index');
    }
}
