<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthenticationController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $user = User::create($request->validated());

        return response()->json(
            [
                'data'    => $user,
                'message' => 'Registration Successfull',
                'status'  => 200,
            ]
        );
    }
}
