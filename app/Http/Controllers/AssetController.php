<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

class AssetController extends Controller
{
    public function showall(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if(!Validations::is_Admin()){
                    $assets = Asset::user_assets(Validations::my_id())->toArray();
                }else{
                    $assets = Asset::all();
                }

                $tables[] = 
                TableController::new_table
                (
                    'Assets', 
                    'asset', 
                    $assets, 
                    true, 
                    '/asset/', 
                    false,
                    null
                );

                return view('dashboard.table', compact('tables'));

            }else {return view('errors.letlogin'); }
        }else { return back(); }

    }

    public function assetjobs($asset){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    if (!Asset::is_mine($asset, Validations::my_id())) {
                        return back();
                    }
                }

                $array_assets[] = Asset::find($asset)->array();

                $tables[] = 
                TableController::new_table
                (
                    'Assets', 
                    'asset', 
                    $array_assets, 
                    false, 
                    '', 
                    false,
                    null
                );

                $jobs = Asset::find($asset)->jobs;

                $tables[] = 
                TableController::new_table
                (
                    'Asset Jobs', 
                    'job', 
                    $jobs, 
                    true, 
                    '/job/', 
                    false,
                    null
                );

                return view('dashboard.table', compact('tables'));
                
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

}
