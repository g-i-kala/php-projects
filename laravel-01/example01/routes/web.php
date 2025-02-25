<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;



//liesten for get at / /about and run a function that returns a view of 'welcome'
Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(5);
    return view('jobs.index', [
        'jobs' => $jobs]);
    });

// Create 
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Show
Route::get('/jobs/{id}', function ($id) {
    $job = Job::find($id);
    //dd($job); //dump and die, quicly see and dump 
    return view('jobs.show', ['job' => $job]);
});

// Store
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
// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find($id);
    //dd($job); //dump and die, quicly see and dump 
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', ],
    ]);
    //authorize (on hold)
    $job = Job::findOrFail($id);
    $job->update([
        'title'=>request('title'),
        'salary'=>request('salary'),
    ]);
    return redirect('/jobs/' . $job->id);
    // redirect to the job specific page
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    //authorize (on hold)
    Job::findOrFail($id)->delete(); //short version inline
    return redirect('/jobs');
});

Route::get('/contact', function () {
    return view('contact');
});

//for example when building an API
// Route::get('/about', function () {
//     return ['foo' => 'bar'];
// });