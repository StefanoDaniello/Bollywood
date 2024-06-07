<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $reviews = config('reviews_db.reviews');
        foreach ($reviews as $review) {
            $new_review = new Review();
            $new_review->author =  $review["author"];
            $new_review->content =  $review["content"];
            $new_review->rating =  $review['rating'];
            $new_review->save();
        }
    }
}
