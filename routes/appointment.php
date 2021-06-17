<?php

use App\Actions\Appointment\CreateAppointment;
use App\Models\Appointment;
use App\Models\User;

Route::get("/appointment", function () {

    if (Auth::user()->hasRole("doctor")) return redirect()->route("doctor.appointment.index");

    $appointments = Appointment::where("patient_id", Auth::id())->get();

    return view("appointment.index", [
        "appointments" => $appointments,
    ]);

})->middleware("auth:sanctum")->name("appointment.index");

Route::get("/appointment/create", function() {

    return view("appointment.create", [
        // "doctor" => User::find(2),
        // "patient" => Auth::user(),
    ]);

})->middleware(["auth:sanctum"])->name("appointment.create");

Route::post("/appointment/store", function() {

    $inputs = request()->all();

    $appointment = (new CreateAppointment())->create($inputs);

    $appointment->accept();

    return redirect()->route("appointment.index");

})->middleware(["auth:sanctum"])->name("appointment.store");

Route::post("/doctor/appointment/{appointment}/accept", function(Appointment $appointment) {
    $appointment->accept();
    if (request()->has('back'))
        return back();
    return redirect()->route("appointment.index");
})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.accept");

Route::post("/doctor/appointment/{appointment}/consult", function(Appointment $appointment) {
    // $appointment->consult();
    if (request()->has('back'))
        return back();
    return redirect()->route("appointment.index");
})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.consult");

Route::post("/doctor/appointment/{appointment}/delay", function(Appointment $appointment) {
    $appointment->delay();
    if (request()->has('back'))
        return back();
    return redirect()->route("appointment.index");
})->middleware(["auth:sanctum", "role:doctor"])->name("doctor.appointment.delay");

Route::post("/doctor/appointment/{appointment}/destroy", function(Appointment $appointment) {
    $appointment->delete();
    if (request()->has('back'))
        return back();
    return redirect()->route("appointment.index");
})->middleware(["auth:sanctum", "can:delete appointment"])->name("doctor.appointment.destroy");
