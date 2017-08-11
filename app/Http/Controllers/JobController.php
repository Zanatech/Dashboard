<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobController extends Controller
{
   public function showall(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if(!Validations::is_Admin()){
                   $jobs = Job::user_jobs(Validations::my_id())->toArray();
                }else{
                    $jobs = Job::all();
                }

                $tables[] = 
                TableController::new_table
                (
                    'Jobs', 
                    'job', 
                    $jobs, 
                    true, 
                    '/job/', 
                    false,
                    null
                );

                return view('dashboard.table', compact('tables'));
                
            }else {return view('errors.letlogin'); }
        }else { return back(); }

    }

    public function jobtests($job){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    if (!Job::is_mine($job, Validations::my_id())) {
                        return back();
                    }
                }

                $array_jobs[] = Job::find($job)->array();

                $tables[] = 
                TableController::new_table
                (
                    'Jobs', 
                    'job', 
                    $array_jobs, 
                    false, 
                    '', 
                    false,
                    null
                );

                $tables[] = 
                TableController::new_table
                (
                    'Job tests', 
                    'test', 
                    Job::job_tests($job)->toArray(), 
                    true, 
                    '/test/', 
                    false,
                    null
                );

                return view('dashboard.table', compact('tables'));

            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }
}
