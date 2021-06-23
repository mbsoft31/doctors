<?php


use Illuminate\Support\Facades\Hash;

return [
    // start admin
    [
        "name" => "admin",
        "email" => "admin@mail.com",
        "phone" => "0666666661",
        "type" => "admin",
        "password" => "admin1234",
    ],
    // end admin

    // start doctors
    [
        "name" => "Harathi Rania",
        "email" => "rania@mail.com",
        "phone" => "0666666561",
        "type" => "doctor",
        "speciality_id" => 1,
        "password" => "rania",
    ],
    [
        "name" => "Zeghadenia Feriel",
        "email" => "feriel@mail.com",
        "phone" => "0666666562",
        "type" => "doctor",
        "speciality_id" => 2,
        "password" => "feriel",
    ],
    [
        "name" => "Djemai Djamel",
        "email" => "djamel@mail.com",
        "phone" => "0666666563",
        "type" => "doctor",
        "speciality_id" => 3,
        "password" => "djamel",
    ],

    // end doctors

    // start patients
    [
        "name" => "patient1",
        "email" => "patient1@mail.com",
        "phone" => "0666666761",
        "type" => "patient",
        "password" => "patient1",
    ],
    [
        "name" => "patient2",
        "email" => "patient2@mail.com",
        "phone" => "0666666762",
        "type" => "patient",
        "password" => "patient2",
    ],
    [
        "name" => "patient3",
        "email" => "patient3@mail.com",
        "phone" => "0666666763",
        "type" => "patient",
        "password" => "patient3",
    ],

    // edn patients

];
