<?php

namespace App\Http\Controllers\Api;

use App\Models\Day;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Appointment;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\UpdateGapRequest;
use App\Http\Requests\Doctor\StoreDoctorRequest;

class DoctorController extends Controller
{

    public function index()
    {
        $doctors = User::doctors()->with('specialities')->get();
        $status  = sizeof($doctors) ? true : false;

        return response()->json([
            'data'   => $doctors,
            'status' => $status,
        ]);
    }

    public function store(StoreDoctorRequest $request)
    {
        $doctor = User::create($request->validated() + ['password' => 'secret'] + ['role_id' => 2] + ['gap' => 30]);
        $status = $doctor ? true : false;

        User::find($doctor->id)->specialities()->attach($request->validated()['specialities']);

        $days = Day::all();

        foreach($days as $day) {
            Schedule::create([
                'user_id'=> $doctor->id,
                'day_id' => $day->id, 
                'start_at' => '09:00', 
                'end_at' => '06:00', 
                'break_start_at' => '14:00', 
                'break_end_at' => '15:00', 
                'is_offday' => Str::lower($day->name)  == 'friday' ? true : false]);
        }


        return response()->json([
            'data'   => $doctor,
            'status' => $status,
        ]);
    }

    public function update(UpdateGapRequest $request)
    {
        $appointment = Appointment::where('appointment_date', '>=', now())->first();
        
        if($appointment == null) {
            $status = User::find(Auth()->user()->id)->update($request->validated());
        }
        else {
            $status = false;
        }
        
        return response()->json([
            'status' => $status,
        ]);
    }

    public function show(User $doctor)
    {
        $doctor_data = User::doctors()->with('specialities')->get()->find($doctor);
        $status      = $doctor_data ? true : false;

        return response()->json([
            'data'   => $doctor_data,
            'status' => $status,
        ]);
    }
}
