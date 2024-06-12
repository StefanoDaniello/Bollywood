<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TimeSlot;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time_slots = config('time_slots_db.time_slots');
        foreach ($time_slots as $time_slot) {
            $new_time_slot = new TimeSlot();
            $new_time_slot->name =   $time_slot["name"];
            $new_time_slot->start_time =  $time_slot["start_time"];
            $new_time_slot->end_time =   $time_slot['end_time'];
            $new_time_slot->save();
        }
    }
}
