<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserController extends Controller
{
    public function showall(){

        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return back();
        }

        $clients = User::all()->where("user_role","=", 0);
        return view('dashboard.client', compact('clients'));
    }

    public function clientassets($client){

        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return back();
        }

        $clients[] = User::find($client);
        $assets = User::find($client)->assets;

        return view('dashboard.asset', compact('clients', 'assets'));
    }
}
