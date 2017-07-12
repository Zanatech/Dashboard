<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    public function show(){
        $tests = Test::all();
    	return view('dashboard.test', compact('tests'));
    }

    public function test($id){
        $test = Test::find($id);
        return view('dashboard.testdetail', compact('test'));
    }
}
