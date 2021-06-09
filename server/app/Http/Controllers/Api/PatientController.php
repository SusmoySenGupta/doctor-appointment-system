<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

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
}
