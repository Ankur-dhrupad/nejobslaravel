<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
class JobController extends Controller
{
    // public function index()
    // {
    //     return Inertia::render('Jobs/Index', [
    //         'filters' => Request::all('search', 'role', 'trashed'),
    //         'jobs' => Job::all()->get()
    //        // 'organizations' => Auth::user()->account->organizations()

    //             // ->orderBy('title')
    //             // ->filter(Request::only('search', 'role', 'trashed'))
    //             // ->get()
    //             ->transform(fn ($job) => [
    //                 'id' => $job->id,
    //                 'title' => $job->title,
    //                 'description' => $job->description,
    //                 // 'owner' => $user->owner,
    //                 // 'photo' => $user->photo_path ? URL::route('image', ['path' => $user->photo_path, 'w' => 40, 'h' => 40, 'fit' => 'crop']) : null,
    //                 // 'deleted_at' => $user->deleted_at,
    //             ]),

              
    //     ]);
    // }

    public function index()
    {
        return Inertia::render('Jobs/Index', [
            // 'filters' => Request::all('search', 'role', 'trashed'),
            'jobs' => Job::orderBy('title')
                ->get()
                ->transform(fn ($job) => [
                    'id' => $job->id,
                    'title' => $job->title,
                    'description' => $job->description,
                    'experience' => $job->experience,
                    'created_at' => $job->created_at,


                ]),
        ]);
    }
    

}


