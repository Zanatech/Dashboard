<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use DB;

class JobController extends Controller
{
    private function user_jobs($user_id){
        return  DB::table('jobs')
                    ->join('assets', 'assets.id', '=', 'jobs.asset_id')
                    ->where('assets.user_id', '=', $user_id)
                    ->get();
    }

    private function is_mine($job){

        $job = DB::table('jobs')
                    ->join('assets', 'assets.id', '=', 'jobs.asset_id')
                    ->select('assets.user_id')
                    ->where('jobs.id', '=', $job)
                    ->get();

        if($job[0]->user_id !== Validations::my_id()){
            return FALSE;
        }else{
            return TRUE;
        }
    }

   public function showall(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if(!Validations::is_Admin()){
                   $jobs = $this->user_jobs(Validations::my_id());
                }else{
                    $jobs = Job::all();
                }
                return view('dashboard.job', compact('jobs'));
                
            }else {return view('errors.letlogin'); }
        }else { return back(); }

    }

    public function jobtests($job){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    if (!$this->is_mine($job)) {
                        return back();
                    }
                }

                $jobs[] = Job::find($job);
                $tests = DB::table('tests')
                            ->join('jobs', 'tests.job_id', '=', 'jobs.id')
                            ->where('jobs.id', '=', $job)
                            ->get();


                return view('dashboard.test', compact('jobs', 'tests'));

            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }
}
