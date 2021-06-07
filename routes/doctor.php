<?php

use App\Actions\Appointment\CreateAppointment;
use App\Actions\Appointment\CreateDoctor;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

Route::get('/register-doctor', function () {
    return view("auth.doctor.register");
})->name("register.doctor");

Route::post('/register-doctor', function () {

    $input = request()->all();

    $user = (new CreateDoctor())->create($input);

    Auth::login($user);

    return redirect()->route("dashboard");

})->name("auth.doctor.register");

Route::get("/doctor/profile/{user}", function ($user) {

    $doctor = User::findOrFail($user);

    if ( ! $doctor->hasRole("doctor") ) abort(403);

    return view("doctor.profile", compact("doctor"));

})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.profile");

Route::get("/doctor/appointment", function (){

    $appointments = Appointment::where("doctor_id", Auth::id())->get();

    return view("appointment.index", [
        "appointments" => $appointments,
    ]);

})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.index");

Route::get("/doctor/appointment/{appointment}", function($appointment) {})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.show");
Route::post("/doctor/appointment/{appointment}/destroy", function($appointment) {})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.destroy");
Route::post("/doctor/appointment/{appointment}/delay", function($appointment) {})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.delay");
