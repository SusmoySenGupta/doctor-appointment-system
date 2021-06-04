<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctors = User::doctors()->limit(2)->get();
        Schedule::insert([
            [
                'user_id' => $doctors[0]['id'],
                'day_id' => 1,
                'start_at' => "09:00",
                'end_at' => "06:00",
                'break_start_at' => "02:00",
                'break_end_at' => "03:00",
                'is_offday' => false,
                'created_at'    => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id' => $doctors[0]['id'],
                'day_id' => 2,
                'start_at' => "09:00",
                'end_at' => "06:00",
                'break_start_at' => "02:00",
                'break_end_at' => "03:00",
                'is_offday' => false,
                'created_at'    => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id' => $doctors[0]['id'],
                'day_id' => 3,
                'start_at' => "09:00",
                'end_at' => "06:00",
                'break_start_at' => "02:00",
                'break_end_at' => "03:00",
                'is_offday' => false,
                'created_at'    => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id' => $doctors[0]['id'],
                'day_id' => 4,
                'start_at' => "09:00",
                'end_at' => "06:00",
                'break_start_at' => "02:00",
                'break_end_at' => "03:00",
                'is_offday' => false,
                'created_at'    => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id' => $doctors[0]['id'],
                'day_id' => 5,
                'start_at' => "09:00",
                'end_at' => "06:00",
                'break_start_at' => "02:00",
                'break_end_at' => "03:00",
                'is_offday' => false,
                'created_at'    => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id' => $doctors[0]['id'],
                'day_id' => 6,
                'start_at' => "09:00",
                'end_at' => "06:00",
                'break_start_at' => "02:00",
                'break_end_at' => "03:00",
                'is_offday' => false,
                'created_at'    => now(),
                'updated_at'     => now(),
            ],
            [
                'user_id' => $doctors[0]['id'],
                'day_id' => 7,
                'start_at' => "09:00",
                'end_at' => "06:00",
                'break_start_at' => "02:00",
                'break_end_at' => "03:00",
                'is_offday' => true,
                'created_at'    => now(),
                'updated_at'     => now(),
            ],

        ]);
    }
}
