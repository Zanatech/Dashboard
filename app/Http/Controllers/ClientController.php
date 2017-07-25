<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use DB;

class ClientController extends Controller
{
    public function showall(){

    	try {
	    	DB::connection()->getPdo();
		} catch (\Exception $e) {
    		return back();
		}

        $clients = Client::all();
        return view('dashboard.client', compact('clients'));
    }

    public function clientassets($client){

    	try {
	    	DB::connection()->getPdo();
		} catch (\Exception $e) {
    		return back();
		}

        $clients[] = Client::find($client);
        $assets = Client::find($client)->assets;

        return view('dashboard.asset', compact('clients', 'assets'));
    }
}
