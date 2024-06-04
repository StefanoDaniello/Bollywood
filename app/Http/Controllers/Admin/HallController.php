<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreHallRequest;
use App\Http\Requests\UpdateHallRequest;
class HallController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $halls = Hall::all();
        return view('admin.halls.index', compact('halls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.halls.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHallRequest $request)
    {
        $form_data = $request->validated();
        $newHall = Hall::create($form_data);
        return redirect()->route('admin.halls.show', $newHall->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hall $hall)
    {
        return view('admin.halls.show', compact('hall'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hall $hall)
    {
        return view('admin.halls.edit', compact('hall'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHallRequest $request, Hall $hall)
    {
        $form_data = $request->validated();
        $hall->update($form_data);
        return redirect()->route('admin.halls.show', $hall->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('admin.halls.index')->with('message', 'Hall,' . $hall->name .' deleted successfully');
    }
}
