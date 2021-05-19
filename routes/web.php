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
    return redirect()->route("dashboard");
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix("role")->name("role.")->middleware(["auth:sanctum", "role:admin"])->group(function () {

    Route::get("/", \App\View\Role\Index::class)->name("index");
    // Route::get('/{role}/edit', \App\View\Role\Edit::class)->name("edit")->middleware( ['can:update role'] );
});

Route::prefix("speciality")->name("speciality.")->middleware(["auth:sanctum", "role:admin"])->group(function () {

    Route::get("/", \App\View\Speciality\Index::class)->name("index");
    // Route::get('/{role}/edit', \App\View\Role\Edit::class)->name("edit")->middleware( ['can:update role'] );
});


Route::get('/permission/create', function () {
    return "create faculty page";
})->middleware( ['auth:sanctum', 'role:admin'] );
