<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function showall(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{
                    
                    $tables[] = 
                    TableController::new_table
                    (
                        'Clients', 
                        'client', 
                        User::non_admins(), 
                        true, 
                        '/client/', 
                        false,
                        null
                    );

                    return view('dashboard.table', compact('tables'));
                }

            }else {return view('errors.letlogin'); }
        }else { return back(); }

    }

    public function clientassets($client){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{

                    $array_clients[] = User::find($client)->array();

                    $tables[] = 
                    TableController::new_table
                    (
                        'Clients', 
                        'client', 
                        $array_clients, 
                        false, 
                        '', 
                        false,
                        null
                    );

                    $tables[] = 
                    TableController::new_table
                    (
                        'Client Assets', 
                        'asset', 
                        User::find($client)->assets, 
                        true, 
                        '/asset/', 
                        false,
                        null
                    );

                    return view('dashboard.table', compact('tables'));
                }
                
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }
}
