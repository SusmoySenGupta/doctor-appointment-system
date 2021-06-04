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
            [
                'name'       => 'Heart',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Brain',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Kidhey',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

    }
}
