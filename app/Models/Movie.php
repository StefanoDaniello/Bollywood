<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'original_title', 'overview', 'cover_image', 'release_date', 'trailer', 'language', 'duration'];
}
