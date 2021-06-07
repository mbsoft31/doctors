<?php

Route::get("/appointment", function () {

    if (Auth::user()->hasRole("doctor")) redirect()->route("doctor.appointment.index");

    $appointments = Appointment::where("patient_id", Auth::id())->get();

    return view("appointment.index", [
        "appointments" => $appointments,
    ]);

})->middleware("auth:sanctum", "role:patient")->name("appointment.index");

Route::get("/appointment/create", function() {

    return view("appointment.create", [
        "doctor" => User::find(2),
        //"patient" => Auth::user(),
    ]);

})->middleware(["auth:sanctum", "role:doctor"])->name("appointment.create");

Route::post("/appointment/store", function() {

    $inputs = request()->all();

    $appointment = (new CreateAppointment())->create($inputs);

    $appointment->accept();

    return redirect()->route("appointment.index");

})->middleware(["auth:sanctum", "role:doctor"])->name("appointment.store");
