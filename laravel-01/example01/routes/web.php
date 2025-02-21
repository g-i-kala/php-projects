<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;



//liesten for get at / /about and run a function that returns a view of 'welcome'
Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs]);
    });

Route::get('/jobs/create', function () {
    return view('jobs.create');
});
    
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    //dd($job); //dump and die, quicly see and dump 
    return view('jobs.show', ['job' => $job]);
});

Route::post('/jobs', function () {
    // debugging dd(request()->all());
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', ],
        ]);

        Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1
        ]);

        return redirect('/jobs');

});

Route::get('/contact', function () {
    return view('contact');
});

//for example when building an API
// Route::get('/about', function () {
//     return ['foo' => 'bar'];
// });