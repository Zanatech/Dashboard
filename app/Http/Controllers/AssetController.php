<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\User;

class AssetController extends Controller
{
    public function showall(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if(!Validations::is_Admin()){
                    $assets = Asset::user_assets(Validations::my_id());
                }else{
                    $assets = Asset::all();
                }

                $tables[] = 
                TableController::new_table
                (
                    'dashboard.title_asset', 
                    'asset', 
                    $assets, 
                    true, 
                    '/asset/', 
                    false,
                    null
                );

                return view('master.page.table', compact('tables'));

            }else {return view('errors.letlogin'); }
        }else { return back(); }

    }

    public function jobs($asset){

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
                    'dashboard.title_asset', 
                    'asset', 
                    $array_assets, 
                    false, 
                    '', 
                    false,
                    null
                );

                $jobs = Asset::find($asset)->jobs;
                
                if (!is_null(TrendController::trans_trends($asset))) {
                    $draw = true;
                }else{
                    $draw = false;
                }

                $tables[] = 
                TableController::new_table
                (
                    'dashboard.title_job', 
                    'job', 
                    $jobs, 
                    true, 
                    '/job/', 
                    $draw,
                    TrendController::trans_trends($asset)
                );

                return view('master.page.table', compact('tables'));
                
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function new(){
        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{

                    $create_forms = config('user.create_form');
                    $content = $create_forms['create_asset'];

                    foreach (User::non_admins() as $user) {
                        if (is_object($user)) {
                            $data[] = 
                            [
                                'option_name'    =>  $user->name,
                                'option_value'   =>  $user->id,
                            ];
                        }else{
                            $data[] = 
                            [
                                'option_name'    =>  $user['name'],
                                'option_value'   =>  $user['id'],
                            ];
                        }
                    }

                    $content['fields'][] = [
                            'name'      => 'user_id',
                            'text'      => 'create_asset_user',
                            'type'      => 'combobox',
                            'icon'      => 'info',
                            'size'      => 'm6 s12',
                            'data'      => $data,
                        ];

                    return view('master.page.create_form', compact('content'));
                }

            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function save(){

        // Guardar Asset recibido
        $errors[] = 'Funcion no implemetada - ERROR 001';
        return view('master.page.home', compact('errors'));
    }
}
