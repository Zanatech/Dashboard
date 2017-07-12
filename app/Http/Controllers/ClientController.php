<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
    public function show(){

        $clients = Client::all();
        return view('dashboard.client', compact('clients'));
    }
}
