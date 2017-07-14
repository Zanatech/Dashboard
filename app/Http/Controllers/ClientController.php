<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Asset;
use DB;

class ClientController extends Controller
{
    public function show(){

    	try {
	    	DB::connection()->getPdo();
		} catch (\Exception $e) {
    		return back();
		}

        $clients = Client::all();
        return view('dashboard.client', compact('clients'));
    }

    public function assets($id){

    	try {
	    	DB::connection()->getPdo();
		} catch (\Exception $e) {
    		return back();
		}

    	$assets = Asset::all()->where('client_id','=', $id);
    	return view('dashboard.asset', compact('assets'));
    }
}
