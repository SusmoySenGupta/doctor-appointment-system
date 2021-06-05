<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\SpecialityController;
use App\Http\Controllers\Api\AppointmentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::post('register', [App\Http\Controllers\Api\AuthenticationController::class, 'register'])->name('register');


Route::group(['middleware' => 'auth:api'], function ()
{
    //common routes for authenticated users
    Route::get('/user', function (Request $request)
    {
        return $request->user();
    });

    Route::resource('/appointments', AppointmentController::class)->only(['index']);


    //admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function ()
    {
        Route::resource('/doctors', DoctorController::class)->only(['index', 'store', 'show']);
        Route::resource('/specialities', SpecialityController::class)->only(['index', 'store', 'update']);
        Route::resource('/patients', PatientController::class)->only(['index']);
        Route::resource('/make-admin', AdminController::class)->only(['update']);
    });

    
    //doctor routes
    Route::group(['prefix' => 'doctor', 'as' => 'doctor.'], function ()
    {
        Route::resource('/appointments', AppointmentController::class)->only(['update']);
        Route::resource('/schedules', ScheduleController::class)->only(['index', 'update']);
        Route::put('/gap/update', [DoctorController::class, 'update']);
    });
});

