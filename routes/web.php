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


Route::get('/role/create', function () {
    $user = Auth::user();
    return "connected user email is: " . $user->email;
})->middleware( ['auth:sanctum', 'can:create role'] );

Route::get('/permission/create', function () {
    return "create faculty page";
})->middleware( ['auth:sanctum', 'role:admin'] );
