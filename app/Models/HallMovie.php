<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hall;
use App\Models\Movie;
use App\Models\TimeSlot;

class HallMovie extends Model
{
    use HasFactory;

    protected $table = 'hall_movie';

    protected $fillable = ['hall_id', 'movie_id', 'date', 'price_ticket', 'time_slot_id'];	
    public function time_slots(){
        return $this->belongsToMany(TimeSlot::class)->withTimestamps();
    }
    public function halls(){
        return $this->belongsToMany(Hall::class)->withTimestamps();
        
    } public function movies(){
        return $this->belongsToMany(Movie::class)->withTimestamps();
    }
}
