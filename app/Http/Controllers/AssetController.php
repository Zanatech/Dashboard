<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

class AssetController extends Controller
{
    public function show(){
        $assets = Asset::all();
    	return view('dashboard.asset', compact('assets'));
    }
}
