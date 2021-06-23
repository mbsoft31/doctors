<?php

use App\Models\Appointment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view("welcome", [
        "doctors" => User::whereType('doctor')->get(),
    ]);
});

Route::get("/profile/doctor/{user}", function ($user) {

    $doctor = User::findOrFail($user);

    if ( ! $doctor->hasRole("doctor") ) abort(404, "this is not a doctor");

    return view("doctor.profile", compact("doctor"));

})->name("doctor.profile");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth:sanctum', 'verified'])->name('dashboard');

Route::prefix("role")->name("role.")->middleware(["auth:sanctum", "role:admin"])->group(function () {
    Route::get("/", \App\View\Role\Index::class)->name("index");
});

Route::prefix("speciality")->middleware(["auth:sanctum", "role:admin"])->name("speciality.")->group(function () {
    Route::get("/", \App\View\Speciality\Index::class)->name("index");
});

require "doctor.php";

require "patient.php";

require "appointment.php";

Route::get("test", function() {

    $doctors = User::where("type", "doctor")->where("id", "<>", Auth::id())->get();

    $appointments = [];

    foreach ($doctors as $doctor) {
        $test = $doctor->getDoctorCalendar($doctor);

        $appointments[$doctor->id] = $test;
        dump($test);

        dump($doctor->isOccupied(Carbon::today(), "08:00" ));
    }

    $times = Appointment::$times;

    $args = [
        "times" => $times,
        "doctors" => User::where("type", "doctor")->where("id", "<>", Auth::id())->get(),
        "appointments" => $appointments,
    ];

    //if (request()->has("doctor"))
    $args = array_merge($args, [
        "doctor" => User::find(request()->get("doctor"))
    ]);

    dd($args);


});
