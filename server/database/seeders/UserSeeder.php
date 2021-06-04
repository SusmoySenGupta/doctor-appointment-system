<?php

namespace Database\Seeders;

use App\Models\BloodGroup;
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
        $gender       = collect([1, 2]);
        $blood_groups = collect([1, 2, 3, 4, 5]);

        User::insert([
            [
                'name'          => 'Administrator',
                'email'         => 'admin@admin.com',
                'password'      => bcrypt('secret'),
                'role_id'       => 1,
                'created_at'    => now(),
                'updated_at'     => now(),
                'gender'        => $gender->random(),
                'birth_date'    => '1997-01-01',
                'phone_no'      => '01234567891',
                'address'       => 'Chittagong',
                'blood_group_id' => $blood_groups->random(),
                'gap'           => null,
            ],
            [
                'name'          => 'Doctor 1',
                'email'         => 'doctor1@doctor.com',
                'password'      => bcrypt('secret'),
                'role_id'       => 2,
                'created_at'    => now(),
                'updated_at'     => now(),
                'gender'        => $gender->random(),
                'birth_date'    => '1997-01-01',
                'phone_no'      => '01234567892',
                'address'       => 'Chittagong',
                'blood_group_id' => $blood_groups->random(),
                'gap'           => 30,
            ],
            [
                'name'          => 'Doctor 2',
                'email'         => 'doctor2@doctor.com',
                'password'      => bcrypt('secret'),
                'role_id'       => 2,
                'created_at'    => now(),
                'updated_at'     => now(),
                'gender'        => $gender->random(),
                'birth_date'    => '1997-01-01',
                'phone_no'      => '01234567893',
                'address'       => 'Chittagong',
                'blood_group_id' => $blood_groups->random(),
                'gap'           => 30,
            ],
            [
                'name'          => 'Doctor 3',
                'email'         => 'doctor3@doctor.com',
                'password'      => bcrypt('secret'),
                'role_id'       => 2,
                'created_at'    => now(),
                'updated_at'     => now(),
                'gender'        => $gender->random(),
                'birth_date'    => '1997-01-01',
                'phone_no'      => '01234567894',
                'address'       => 'Chittagong',
                'blood_group_id' => $blood_groups->random(),
                'gap'           => 30,
            ],
            [
                'name'          => 'Patient 1',
                'email'         => 'Patient1@patient.com',
                'password'      => bcrypt('secret'),
                'role_id'       => 3,
                'created_at'    => now(),
                'updated_at'     => now(),
                'gender'        => $gender->random(),
                'birth_date'    => '1997-01-01',
                'phone_no'      => '01234567895',
                'address'       => 'Chittagong',
                'blood_group_id' => $blood_groups->random(),
                'gap'           => null,
            ],
            [
                'name'          => 'Patient 2',
                'email'         => 'Patient2@patient.com',
                'password'      => bcrypt('secret'),
                'role_id'       => 3,
                'created_at'    => now(),
                'updated_at'     => now(),
                'gender'        => $gender->random(),
                'birth_date'    => '1997-01-01',
                'phone_no'      => '01234567896',
                'address'       => 'Chittagong',
                'blood_group_id' => $blood_groups->random(),
                'gap'           => null,
            ],
            [
                'name'          => 'Patient 3',
                'email'         => 'Patient3@patient.com',
                'password'      => bcrypt('secret'),
                'role_id'       => 3,
                'created_at'    => now(),
                'updated_at'     => now(),
                'gender'        => $gender->random(),
                'birth_date'    => '1997-01-01',
                'phone_no'      => '01234567897',
                'address'       => 'Chittagong',
                'blood_group_id' => $blood_groups->random(),
                'gap'           => null,
            ],
        ]);
    }
}
