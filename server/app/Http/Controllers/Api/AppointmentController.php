<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = null;

        if (Auth()->user()->role_id == 1)
        {
            $appointments = Appointment::all();
        }
        else if (Auth()->user()->role_id == 2)
        {
            $appointments = DB::table('users')
                ->join('appointments', 'users.id', '=', 'appointments.patient_id')
                ->where('appointments.doctor_id', Auth()->user()->id)
                ->join('blood_groups', 'users.blood_group_id', '=', 'blood_groups.id')
                ->select(
                    'users.name as patient_name',
                    'users.email as patient_email',
                    'users.phone_no as patient_phone_no',
                    'users.address as patient_address',
                    'users.gender as patient_gender',
                    'appointments.*',
                    'blood_groups.name as blood_group'
                )
                ->get();

        }
        else if (Auth()->user()->role_id == 3)
        {
            $appointments = DB::table('users')
                ->join('appointments', 'users.id', '=', 'appointments.patient_id')
                ->where('appointments.patient_id', Auth()->user()->id)
                ->select(
                    'users.name as doctor_name',
                    'users.email as doctor_email',
                    'users.phone_no as doctor_phone_no',
                    'users.address as doctor_address',
                    'appointments.*'
                )
                ->get();
        }

        $status = sizeof($appointments) ? true : false;

        return response()->json([
            'data'   => $appointments,
            'status' => $status,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $status = Appointment::findOrFail($id)->update(['checked_at' => now(), 'is_pending' => 0]);

        return response()->json([
            'status' => $status,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
