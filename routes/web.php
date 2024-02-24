<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateJobController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::view("index","index");
Route::view("jobdetails","jobdetails");
Route::view("createjob","createjob");
Route::view("jobs","jobs");
Route::get("/",[CategoryController::class,"index"]);
Route::get("/createjob",[CreateJobController::class,"createjob"]);
Route::post("/createjob",[CreateJobController::class,"insertjob"]);
Route::view("/login",'login');
Route::view("/register",'registration');
