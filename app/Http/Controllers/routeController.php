<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class routeController extends Controller
{
    public function index(){
    	return view('index');
    }

    public function home(){
    	return view('dashboard.home');
    }

    public function import(){
    	return view('dashboard.import');
    }
}
