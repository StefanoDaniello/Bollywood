<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Time_Slot;

class TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $time_solts = config('time_slots_db.time_slots');
        foreach ($time_solts as $time_solt) {
            $new_time_solt = new Time_Slot();
            $new_time_solt->name =   $time_solt["name"];
            $new_time_solt->start_time =  $time_solt["start_time"];
            $new_time_solt->end_time =   $time_solt['end_time'];
            $new_time_solt->save();
        }
    }
}
