<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Test;

class AssetController extends Controller
{
    public function show(){
        $assets = Asset::all();
    	return view('dashboard.asset', compact('assets'));
    }

    public function tests($id){
    	$tests = Test::all()->where('asset_id','=', $id);
    	return view('dashboard.test', compact('tests'));
    }
}
