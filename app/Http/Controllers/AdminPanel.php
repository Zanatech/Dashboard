<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPanel extends Controller
{
    public function home(){
    	if (Validations::is_Admin()) {
    		return view('master.page.admin_panel');
    	}{ return back(); }
    }

    public function showusers(){
    	if (Validations::is_Admin()) {


    		return view('master.page.admin_table', compact('table'));
    	}{ return back(); }
    }
}
