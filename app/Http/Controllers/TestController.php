<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use DB;
use App\PowerFactor;

class TestController extends Controller
{
    public function show(){
        $tests = Test::all();
    	return view('dashboard.test', compact('tests'));
    }

    public function test($id){
        $test = Test::find($id);
        $columns = DB::select('SHOW COLUMNS FROM power_factors');
        $datas = PowerFactor::all()->where('test_id','=',$id);

        //dd($datas);

        return view('dashboard.testdetail', compact('test','columns','datas'));
    }
}
