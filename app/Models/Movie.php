<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Review;

class Movie extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'original_title', 'overview', 'cover_image', 'release_date', 'trailer', 
    'language', 'duration', 'review_id'];
    public function reviews(){
        return $this->hasMany(Review::class);
    }
}
