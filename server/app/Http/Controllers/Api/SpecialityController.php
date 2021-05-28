<?php

namespace App\Http\Controllers\Api;

use App\Models\Speciality;
use App\Http\Controllers\Controller;
use App\Http\Requests\Speciality\StoreSpecialityRequest;
use App\Http\Requests\Speciality\UpdateSpecialityRequest;

class SpecialityController extends Controller
{

    public function index()
    {
        $specialities = Speciality::all();
        $status       = sizeof($specialities) ? true : false;

        return response()->json([
            'data'   => $specialities,
            'status' => $status,
        ]);
    }

    public function store(StoreSpecialityRequest $request)
    {
        $speciality = Speciality::create($request->validated());
        $status     = $speciality ? true : false;

        return response()->json([
            'data'   => $speciality,
            'status' => $status,
        ]);
    }

    public function update(UpdateSpecialityRequest $request, Speciality $speciality)
    {
        $speciality = Speciality::create($request->validated());
        $status     = $speciality ? true : false;

        return response()->json([
            'data'   => $speciality,
            'status' => $status,
        ]);
    }
}
