<?php

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
    return view("welcome");
});

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

require "appointment.php";
