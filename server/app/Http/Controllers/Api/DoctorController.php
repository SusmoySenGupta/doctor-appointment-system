<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
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
        $doctor = User::create($request->validated() + ['password' => 'secret'] + ['role_id' => 2]);
        $status = $doctor ? true : false;

        User::find($doctor->id)->specialities()->attach($request->validated()['specialities']);

        return response()->json([
            'data'   => $doctor,
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
