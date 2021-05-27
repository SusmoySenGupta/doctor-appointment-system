<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name'     => 'Administrator',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('secret'),
                'role_id'  => 1,
            ],
            [
                'name'     => 'Doctor 1',
                'email'    => 'doctor1@doctor.com',
                'password' => bcrypt('secret'),
                'role_id'  => 2,
            ],
            [
                'name'     => 'Doctor 2',
                'email'    => 'doctor2@doctor.com',
                'password' => bcrypt('secret'),
                'role_id'  => 2,
            ],
            [
                'name'     => 'Doctor 3',
                'email'    => 'doctor3@doctor.com',
                'password' => bcrypt('secret'),
                'role_id'  => 2,
            ],
            [
                'name'     => 'Patient 1',
                'email'    => 'Patient1@patient.com',
                'password' => bcrypt('secret'),
                'role_id'  => 3,
            ],
            [
                'name'     => 'Patient 2',
                'email'    => 'Patient2@patient.com',
                'password' => bcrypt('secret'),
                'role_id'  => 3,
            ],
            [
                'name'     => 'Patient 3',
                'email'    => 'Patient3@patient.com',
                'password' => bcrypt('secret'),
                'role_id'  => 3,
            ],
        ]);
    }
}
