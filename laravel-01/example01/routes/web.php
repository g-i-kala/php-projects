<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

//liesten for get at / /about and run a function that returns a view of 'welcome'
Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    return view('jobs', ['jobs' => Job::all()]);
    });

Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    //dd($job); //dump and die, quicly see and dump 
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});

//for example when building an API
// Route::get('/about', function () {
//     return ['foo' => 'bar'];
// });