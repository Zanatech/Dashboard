<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use Auth;
use DB;

class TestController extends Controller
{
    public function showall(){

        Validations::is_Connected();
        Validations::is_Guest();

        if(!Validations::is_Admin()){
           $tests = $this->user_tests(Validations::my_id());
        }else{
            $tests = Job::all();
        }
        return view('dashboard.test', compact('tests'));
    }

    private function user_tests($user_id){
        return  DB::table('tests')
                    ->join('jobs', 'jobs.id', '=', 'tests.job_id')
                    ->join('assets', 'assets.id', '=', 'jobs.asset_id')
                    ->where('assets.user_id', '=', $user_id)
                    ->get();
    }
}
