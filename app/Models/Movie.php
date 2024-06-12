<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;
use App\Models\hall_movie;
class Movie extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'original_title', 'overview', 'cover_image', 'release_date', 'trailer', 
    'language', 'duration', 'review_id'];
    public function reviews(){
        return $this->hasMany(Review::class);
    }
    public function halls(){
        return $this->belongsToMany(Hall::class)->withTimestamps();
    }
    public function hall_movie(){
        return $this->hasMany(hall_movie::class)->withTimestamps();
    }
}
