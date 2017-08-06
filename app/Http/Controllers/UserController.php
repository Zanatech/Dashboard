<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function showall(){

        Validations::is_Connected();
        Validations::is_Guest();

        if (!Validations::is_Admin()) {
            return back();
        }

        $clients = User::all()->where("user_role","=", 0);
        return view('dashboard.client', compact('clients'));
    }

    public function clientassets($client){

        Validations::is_Connected();
        Validations::is_Guest();

        if (!Validations::is_Admin()) {
            return back();
        }
        
        $clients[] = User::find($client);
        $assets = User::find($client)->assets;

        return view('dashboard.asset', compact('clients', 'assets'));
    }
}
