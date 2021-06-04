<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Feedback;
use App\Models\Appointment;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $doctor = User::doctors()->first();
        $patient = User::patients()->first();
        $appointment = Appointment::first();

        Feedback::insert([
            [
                'doctor_id' => $doctor->id,
                'patient_id' => $patient->id,
                'appointment_id' => $appointment->id,
                'description' => "It was a good experience.",
                'created_at'    => now(),
                'updated_at'     => now(),
            ],
        ]);
    }
}
