<?php

Route::get('/register-patient', function () {
    return view("auth.patient.register", [

    ]);
})->name("register.patient");

Route::post('/register-patient', function () {

    $input = request()->all();

    $user = (new CreatePatient())->create($input);

    Auth::login($user);

    return redirect()->route("dashboard");

})->name("auth.patient.register");
