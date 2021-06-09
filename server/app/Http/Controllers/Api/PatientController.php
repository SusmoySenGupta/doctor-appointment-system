<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\UpdatePatientRequest;

class PatientController extends Controller
{
    public function index()
    {
        $patients = User::patients()->get();

        return response()->json([
            'data'   => $patients,
            'status' => sizeof($patients) ? true : false,
        ]);
    }

    public function update(UpdatePatientRequest $request, User $user)
    {
        $status = $user->update($request->validated()) ? true : false;

        return response()->json([
            'status' => $status,
        ]);
    }
}
