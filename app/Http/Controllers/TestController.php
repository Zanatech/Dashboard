<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    public function test(){
        $tests = Test::all();
    	return view('dashboard.result', compact('tests'));
    }

    public function show($id){
        $test = Test::find($id);
        return view('dashboard.testdetail', compact('test'));
    }
}
