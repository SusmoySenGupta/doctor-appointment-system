<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Speciality::insert([
            ['name' => 'Heart'],
            ['name' => 'Brain'],
            ['name' => 'Kidhey'],
        ]);

    }
}
