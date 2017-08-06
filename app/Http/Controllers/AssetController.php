<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

class AssetController extends Controller
{
    private function user_assets($user_id){
        return Asset::all()->where('user_id', '=', $user_id);
    }

    private function is_mine($asset){
        if(Asset::find($asset)->user_id !== Validations::my_id()){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function showall(){

        if (!Validations::is_Connected()) {
            return back();
        }

        if(Validations::is_Guest()){
            return view('guest');
        }

        if(!Validations::is_Admin()){
            $assets = $this->user_assets(Validations::my_id());
        }else{
            $assets = Asset::all();
        }

        return view('dashboard.asset', compact('assets'));
    }

    public function assetjobs($asset){

        if (!Validations::is_Connected()) {
            return back();
        }

        if(Validations::is_Guest()){
            return view('guest');
        }

        if (!Validations::is_Admin()) {
            if (!$this->is_mine($asset)) {
                return back();
            }
        }

        $assets[] = Asset::find($asset);
        $jobs = Asset::find($asset)->jobs;

        return view('dashboard.job', compact('assets', 'jobs'));
    }
}
