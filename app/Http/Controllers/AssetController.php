<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use DB;

class AssetController extends Controller
{
    public function showall(){

    	try {
	    	DB::connection()->getPdo();
		} catch (\Exception $e) {
    		return back();
		}

        $assets = Asset::all();
        return view('dashboard.asset', compact('assets'));
    }

    public function assetjobs($asset){

    	try {
	    	DB::connection()->getPdo();
		} catch (\Exception $e) {
    		return back();
		}

        $assets[] = Asset::find($asset);
        $jobs = Asset::find($asset)->jobs;

        return view('dashboard.job', compact('assets', 'jobs'));
    }
}
