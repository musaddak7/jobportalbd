<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateJobController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobsController;

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
Route::get("/jobs",[JobsController::class,"index"])->name('jobs');
Route::get("/jobs/detail/{id}",[JobsController::class,"detail"])->name('jobdetail');
Route::post('/apply-job',[JobsController::class,'applyJob'])->name('applyJob');
Route::post('/save-job',[JobsController::class,'saveJob'])->name('saveJob');



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
    Route::put('/update-profile',[AccountController::class,'updateProfile'])->name('account.updateProfile');
    Route::get('/logout',[AccountController::class,'logout'])->name('account.logout');
    Route::get('/createjob',[AccountController::class,'createjob'])->name('account.createjob');
    Route::post('/createjob',[AccountController::class,'savejob'])->name('account.savejob');
    Route::get('/my_job_applications',[AccountController::class,'myJobApplication'])->name('account.myJobApplication');
    Route::get('/saved-jobs',[AccountController::class,'savedJobs'])->name('account.savedJobs');
    Route::post('/remove-job',[AccountController::class,'removeJobs'])->name('account.removeJobs');
    Route::post('/remove-saved-jobs',[AccountController::class,'removeSavedJob'])->name('account.removeSavedJob');



});

});

