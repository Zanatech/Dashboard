<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use DB;

class TestController extends Controller
{
    public function showall(){

    	try {
	    	DB::connection()->getPdo();
		} catch (\Exception $e) {
    		return back();
		}

        $tests = Test::all();
        return view('dashboard.test', compact('tests'));
    }
}
