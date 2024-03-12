<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateJobController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|


Route::get('/', function () {
    return view('index');
});
*/


Route::get("/",[HomeController::class,"index"])->name('home');
Route::get("/jobs",[HomeController::class,"jobs"])->name('jobs');
Route::get("/jobdetails",[HomeController::class,"jobdetails"])->name('jobdetails');



Route::group(['account'],function(){
//Guest Route
Route::group(['middleware' => 'guest'],function(){
    Route::get('/register',[AccountController::class,'registration'])->name('account.registration');
    Route::post('/process-register',[AccountController::class,'processRegistration'])->name('account.processRegistration');
    Route::get('/login',[AccountController::class,'login'])->name('account.login');
    Route::post('/authenticate',[AccountController::class,'authenticate'])->name('account.authenticate');


});
//Authenticated Route
Route::group(['middleware' => 'auth'],function(){
    Route::get('/profile',[AccountController::class,'profile'])->name('account.profile');
    Route::get('/logout',[AccountController::class,'logout'])->name('account.logout');
    Route::get('/createjob',[AccountController::class,'createjob'])->name('account.createjob');
    Route::post('/createjob',[AccountController::class,'savejob'])->name('account.savejob');


});

});

