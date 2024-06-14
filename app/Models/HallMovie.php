<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\TimeSlot;
use Illuminate\Database\Eloquent\Relations\Pivot; 

class HallMovie extends Pivot
{
    use HasFactory;

    protected $table = 'hall_movie';
    protected $fillable = ['hall_id', 'movie_id', 'date', 'price_ticket', 'time_slot_id'];	
    public function time_slot(){
        return $this->belongsTo(TimeSlot::class);
    }
    public function hall(){
        return $this->belongsTo(Hall::class);
        
    } public function movie(){
        return $this->belongsTo(Movie::class);
    }
}
