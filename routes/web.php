<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});
//INDEX
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->paginate(5);
    //dd($jobs);
    return view('jobs.index',
    ['jobs' => $jobs]);
});
//CREATE
Route::get('/jobs/create', function () {
    return view('jobs.create');
});
//STORE
Route::post('/jobs', function () {
    request()->validate([
        'title' => 'required|min:3|max:255',
        'salary' => 'required',
    ]);
    Job::create([
        'title' => request()->title,
        'salary' => request()->salary,
        'employer_id' => 1
    ]);
    return redirect('jobs');
});
//SHOW
Route::get('/jobs/show/{id}', function ($id) {
    $job = \Illuminate\Support\Arr::first(Job::all(),
    fn($job)=>$job['id'] == $id);
    return view('jobs.show', ['job'=> $job]);
});
//EDIT
Route::get('/jobs/{id}/create', function ($id) {
    $job = Job::findOrFail($id);
    return view('jobs.edit',[
        'job' => $job
    ]);
});
//UPDATE
Route::patch('/jobs/{id}', function ($id) {
    //AUTHORIZE (On hold ...)
    //ROUTE MODEL BINDING
    request()->validate([
        'title' => 'required|min:3|max:255',
        'salary' => 'required',
    ]);
    $job = Job::findOrFail($id);
    // $job->update([
    //     'title' => request('title'),
    //     'salary' => request('salary')
    // ]);
    $job->update(request()->all());
    return redirect('/jobs');
});

//DELETE
Route::delete('jobs/{id}', function ($id) {
    //AUTHORIZE (On hold ...)
    Job::findOrFail($id)->delete();
    return redirect('/jobs');
});

