<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = config('movies_db.movies');
        foreach ($movies as $movie) {
            $new_movie = new Movie();
            $new_movie->title = $movie["title"];
            $new_movie->original_title = $movie["original_title"];
            $new_movie->overview = $movie['overview'];
            $new_movie->cover_image = $movie["cover_image"];
            $new_movie->release_date = $movie["release_date"];
            $new_movie->trailer = $movie["trailer"];
            $new_movie->language = $movie["language"];
            $new_movie->duration = $movie["duration"];
            $new_movie->save();
        }
    }
}
