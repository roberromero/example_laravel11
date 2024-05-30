<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(5);
    return view('jobs',
    ['jobs' => $jobs]);
});
Route::get('/job/{id}', function ($id) {
    $job = \Illuminate\Support\Arr::first(Job::all(),
    fn($job)=>$job['id'] == $id);
    return view('job', ['job'=> $job]);
});
