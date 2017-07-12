<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Asset;

class ClientController extends Controller
{
    public function show(){

        $clients = Client::all();
        return view('dashboard.client', compact('clients'));
    }

    public function assets($id){
    	$assets = Asset::all()->where('client_id','=', $id);
    	return view('dashboard.asset', compact('assets'));
    }
}
