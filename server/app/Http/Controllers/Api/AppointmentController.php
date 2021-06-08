<?php

namespace App\Http\Controllers\Api;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Appointment\UpdateFeedbackRequest;
use App\Http\Requests\Appointment\StoreAppointmentRequest;

class AppointmentController extends Controller
{
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
                ->join('appointments', 'users.id', '=', 'appointments.doctor_id')
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


    public function store(StoreAppointmentRequest $request)
    {
        $appointment = Appointment::create($request->validated() + ['patient_id' => Auth()->user()->id]);
        $status = $appointment ? true : false;

        return response()->json([
            'status' => $status
        ]);
    }


    public function markAsChecked( $id)
    {
        $status = Appointment::findOrFail($id)->update(['checked_at' => now(), 'is_pending' => 0]);

        return response()->json([
            'status' => $status,
        ]);
    }
  

    public function saveFeedback(UpdateFeedbackRequest $request, $id)
    {
        $appointment = Appointment::findOrFail($id);

        if(is_null($appointment->feedback)){
            $status = $appointment->update($request->validated());
        }
        else {
            $status = false;
        }
        return response()->json([
            'status' => $status,
        ]);
    }
}
