<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HallMovie;
class Hall extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color', 'seats_num', 'isense', 'availability', 'base_price'];

    public function movies()
    {
        return $this->belongsToMany(Movie::class)->withTimestamps();
    }
    public function hall_movie(){
        return $this->hasMany(HallMovie::class)->withTimestamps();
    }
}
