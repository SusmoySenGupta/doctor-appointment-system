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

    public function getDoctorSchedule($doctor_id, $date)
    {
        $appointments = Appointment::where('doctor_id', $doctor_id)->where('appointment_date', $date)
            ->select('start_at', 'end_at')
            ->get();

        $gap             = User::find($doctor_id)->gap;
        $day_id          = Day::where('name', date('l', strtotime($date)))->pluck('id');
        $doctor_schedule = Schedule::where('user_id', $doctor_id)
            ->where('day_id', $day_id)
            ->where('is_offday', 0)
            ->select('start_at', 'end_at', 'break_start_at', 'break_end_at')
            ->first();

        $times = collect([]);

        if (!is_null($doctor_schedule))
        {
            $start_at       = date('H:i', strtotime($doctor_schedule->start_at));
            $end_at         = date('H:i', strtotime($doctor_schedule->end_at));
            $break_start_at = date('H:i', strtotime($doctor_schedule->break_start_at));
            $break_end_at   = date('H:i', strtotime($doctor_schedule->break_end_at));

            for ($i = 0; $start_at < $end_at; $i++)
            {
                $shift_start = $start_at;
                $shift_end   = date('H:i', strtotime($start_at) + 60 * $gap);

                if (($start_at < $break_start_at || $start_at >= $break_end_at)
                    && (!$appointments->contains('start_at', date('H:i:s', strtotime($start_at)))))
                {
                    $times->push($shift_start . '-' . $shift_end);
                }

                $start_at = date('H:i', strtotime($start_at) + 60 * $gap);
            }
        }

        return response()->json([
            'times'        => $times,
        ]);
    }
}
