<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HallMovie;
class TimeSlot extends Model
{
    use HasFactory;

    protected $fillable = ['name','start_time', 'end_time'];
    public function hall_movie(){
        return $this->hasMany(HallMovie::class);
    }

}
