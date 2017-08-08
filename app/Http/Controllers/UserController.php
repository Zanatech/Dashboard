<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function showall(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{
                    $clients = User::all()->where("user_role","=", 0);
                    return view('dashboard.client', compact('clients'));
                }

            }else {return view('errors.letlogin'); }
        }else { return back(); }

    }

    public function clientassets($client){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{
                    $clients[] = User::find($client);
                    $assets = User::find($client)->assets;

                    return view('dashboard.asset', compact('clients', 'assets'));
                }
                
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }
}
