<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

Route::view('/', 'home');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::post('/jobs', [JobController::class, 'store']);
Route::get('/jobs/{job}', [JobController::class, 'show']);
// OPTION 1: Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware(['auth', 'can:edit-job,job']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])
    ->middleware('auth')
    ->can('edit', 'job');
    // FOR FIRST OPTION : ->can('edit-job', 'job');

Route::patch('/jobs/{job}', [JobController::class, 'update'])
    ->middleware('auth');
Route::delete('jobs/{job}', [JobController::class, 'destroy'])
    ->middleware('auth');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
// OPTION 3 Route::resource('jobs', JobController::class);

//-----OPTION 2--------///
/*Route::controller(JobController::class)->group(function(){
    Route::get('/jobs','index');
    Route::get('/jobs/create', 'create');
    Route::post('/jobs', 'store');
    Route::get('/jobs/{job}','show');
    Route::get('/jobs/{job}/edit', 'edit');
    Route::patch('/jobs/{job}', 'update');
    Route::delete('jobs/{job}', 'destroy');
});*/
//-----OPTION 1--------///
//Route::get('/jobs', [JobController::class, 'index']);
//Route::get('/jobs/create', [JobController::class, 'create']);
//Route::post('/jobs', [JobController::class, 'store']);
//Route::get('/jobs/{job}', [JobController::class, 'show']);
//Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
//Route::patch('/jobs/{job}', [JobController::class, 'update']);
//Route::delete('jobs/{job}', [JobController::class, 'destroy']);

