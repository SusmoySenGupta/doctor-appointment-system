<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AuthenticationController;
use App\Http\Controllers\Api\BloodGroupController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\SpecialityController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

//Registration for patients
Route::post('register', [AuthenticationController::class, 'register']);

Route::group(['middleware' => 'auth:api'], function ()
{
    //common routes for all authenticated users
    Route::get('/user', [AuthenticationController::class, 'getUser']);
    Route::get('/get-appointments', [AppointmentController::class, 'index']);
    Route::get('/get-doctors', [DoctorController::class, 'index']);
    Route::get('/get-blood-groups', [BloodGroupController::class, 'index']);
    Route::put('/user/update/{user}', [UserController::class, 'update']);

    //admin routes
    Route::group(['prefix' => 'admin'], function ()
    {
        Route::put('/make-admin/{id}', [AdminController::class, 'makeAdmin']);
        Route::post('/doctor/store', [DoctorController::class, 'store']);
        Route::get('/get-patients', [PatientController::class, 'index']);
        Route::resource('/specialities', SpecialityController::class)->only(['index', 'store', 'update']);
    });

    //doctor routes
    Route::group(['prefix' => 'doctor'], function ()
    {
        Route::put('/appointments/mark-as-checked/{id}', [AppointmentController::class, 'markAsChecked']);
        Route::put('/gap/update', [DoctorController::class, 'updateGap']);
        Route::get('/get-schedules', [ScheduleController::class, 'index']);
        Route::put('/schedules/update/{schedule}', [ScheduleController::class, 'update']);
    });

    //patient routes
    Route::group(['prefix' => 'patient', 'as' => 'patient.'], function ()
    {
        Route::put('/appointments/feedback/{id}', [AppointmentController::class, 'saveFeedback']);
        Route::post('/appointments/store', [AppointmentController::class, 'store']);
        Route::get('/get-doctor-schedule/{doctor_id}/{date}', [ScheduleController::class, 'getDoctorSchedule']);
    });
});
