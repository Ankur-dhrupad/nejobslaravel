<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Check if there is a success message in the session
        $successMessage = session('success');
        return Inertia::render('Dashboard/Index', [
            'successMessage' => $successMessage,
        ]);    }
    public function jobpost()
    {
        $authUserId = auth()->id();
    
        // Dump and die for debugging
        //dd($authUserId);
    
        return Inertia::render('Dashboard/Jobpost', [
            'authUserId' => $authUserId,
        ]);
    }

    public function jobstore(Request $request)
    {
   // dd($request->skills);
        $validatedData =  Request::validate([
            'title' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'emp_id' => ['required'],
            'type' => ['required'],
            'salary' => ['nullable'],
            'min' => ['required'],
            'max' => ['required'],
            'experience' => ['required'],
            'industry' => ['required'],
            'location' => ['required'],
            'english_fluency' => ['required'],
            'address' => ['required'],
            'country' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'skills' => ['required'], // Assuming skills is an array

        ]);
     // dd($validatedData);
        // $job = Job::create($validatedData);
        $job = new Job();
        $job->title = $validatedData['title'];
        $job->description = $validatedData['description'];
        $job->category = $validatedData['category'];
       $job->employer_id = $validatedData['emp_id'];
       $job->skills = $validatedData['skills'];
        $job->type = $validatedData['type'];
        $job->salary = $validatedData['salary'];
        $job->min = $validatedData['min'];
        $job->max = $validatedData['max'];
        $job->experience = $validatedData['experience'];
        $job->industry = $validatedData['industry'];
        $job->location = $validatedData['location'];
        $job->english_fluency = $validatedData['english_fluency'];
        $job->address = $validatedData['address'];
        $job->country = $validatedData['country'];
        $job->city = $validatedData['city'];
        $job->state = $validatedData['state'];
        $job->save();
        return Redirect::route('dashboard')->with('success', 'Job Posted.');
        
    }


    
    
}
