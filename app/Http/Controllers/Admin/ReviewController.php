<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\controller;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Review;
use App\Models\Movie;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $movies = Movie::all();
        return view('admin.reviews.create', compact('movies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $form_data = $request->all();
        $newReview = Review::create($form_data);
        return redirect()->route('admin.reviews.show', $newReview->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        return view('admin.reviews.show', compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        $movies = Movie::all();
        return view('admin.reviews.edit', compact('review', 'movies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {   
        $form_data = $request->all();
        //
        $review->update($form_data);
        return redirect()->route('admin.reviews.show', $review->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('message', 'Review,' . $review->author .' deleted successfully');
    }
}
