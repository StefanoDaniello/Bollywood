<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Hall;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $halls = config('halls_db.halls');
        foreach ($halls as $hall) {
            $new_hall = new Hall();
            $new_hall->name = $hall["name"];
            $new_hall->color = $hall['color'];
            $new_hall->seats_num = $hall["seats_num"];
            $new_hall->isense = $hall["isense"];
            $new_hall->availability = $hall["availability"];
            $new_hall->base_price = $hall["base_price"];
            $new_hall->save();
        }
    }
}
