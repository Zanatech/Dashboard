<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class Validations extends Controller
{

    public static function is_Connected(){

    	try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {

            return view('errors.login');
        }

        return TRUE;
    }

    public static function is_Guest(){

	    if (Auth::Guest()) {
	        return view('errors.letlogin');
	    }

	    return FALSE;
    }

    public static function is_Admin(){

        if (Auth::user()->user_role < config('user.role.ADMIN')) {
            return FALSE;
        }

        return TRUE;
    }

    public static function my_id(){

        if (!is_null(Auth::user())) {
            return Auth::user()->id;
        }
    }
}
