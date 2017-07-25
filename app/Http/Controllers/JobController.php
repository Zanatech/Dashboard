<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use DB;

class JobController extends Controller
{
    public function showall(){

    	try {
	    	DB::connection()->getPdo();
		} catch (\Exception $e) {
    		return back();
		}

        $jobs = Job::all();
        return view('dashboard.job', compact('jobs'));
    }

    public function jobtests($job){

    	try {
	    	DB::connection()->getPdo();
		} catch (\Exception $e) {
    		return back();
		}

        $jobs[] = Job::find($job);
        $tests = Job::find($job)->tests;

        return view('dashboard.test', compact('jobs', 'tests'));
    }
}
