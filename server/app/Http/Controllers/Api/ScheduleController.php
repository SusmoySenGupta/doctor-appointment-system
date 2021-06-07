<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Schedule\UpdateScheduleRequest;
use App\Models\Appointment;
use App\Models\Day;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules   = Schedule::where('user_id', Auth()->user()->id)->get();
        $days        = Day::all();
        $gap         = Auth()->user()->gap;
        $appointment = Appointment::where('appointment_date', '>=', now())->first();
        $status      = sizeof($schedules) && !is_null($gap) ? true : false;

        return response()->json([
            'schedules'       => $schedules,
            'days'            => $days,
            'gap'             => $gap,
            'status'          => $status,
            'has_appointment' => $appointment ? true : false,
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
    public function update(UpdateScheduleRequest $request, Schedule $schedule)
    {
        $appointment = Appointment::where('appointment_date', '>=', now())->first();

        if ($appointment == null)
        {
            $status = $schedule->update($request->validated());
        }
        else
        {
            $status = false;
        }

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
