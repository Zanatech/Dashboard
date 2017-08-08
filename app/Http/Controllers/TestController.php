<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use DB;
use Input;
use Excel;

class TestController extends Controller
{
    public function showall(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if(!Validations::is_Admin()){
                   $tests = $this->user_tests(Validations::my_id());
                }else{
                    $tests = Test::all();
                }
                return view('dashboard.test', compact('tests'));
                
            }else {return view('errors.letlogin'); }
        }else { return back(); }

    }

    private function user_tests($user_id){

        return  DB::table('tests')
                    ->join('jobs', 'jobs.id', '=', 'tests.job_id')
                    ->join('assets', 'assets.id', '=', 'jobs.asset_id')
                    ->where('assets.user_id', '=', $user_id)
                    ->get();
    }

    public function import(){

        if(Validations::is_Connected()) {
            if(!Validations::is_Guest()){
                if(!Validations::is_Admin()){
                   return back();
                }else{
                    return view('dashboard.import');
                }              
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }


    public function importfile(){

        if(Input::hasFile('import_file')){

            $path = Input::file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();

            /*if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['insultest' => $value->insultest, 'testmodetxt' => $value->testmodetxt,
                                'overalleng' => $value->overalleng,'overallgnd' => $value->overallgnd,
                                'overallgar' => $value->overallgar,'overallust' => $value->overallust,
                                'kv' => $value->kv,'cap' => $value->cap,
                                 'pf' => $value->pf,'pf_20' => $value->pf_20,
                                 'corr' => $value->corr,'ma' => $value->ma,
                                 'watts' => $value->watts, 'rating' => $value->rating];
                }
                
                if(!empty($insert)){
                    DB::table('power_factors')->insert($insert);
                    return view('dashboard.home', ['charts' => null]);
                }
            }*/
            dd($data);
        }
    }
}
