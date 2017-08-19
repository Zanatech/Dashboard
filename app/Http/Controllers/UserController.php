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
                        'dashboard.title_client', 
                        'client', 
                        User::non_admins(), 
                        true, 
                        '/client/', 
                        false,
                        null
                    );

                    return view('master.page.table', compact('tables'));
                }

            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function assets($client){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{

                    $array_clients[] = User::find($client)->array();

                    $tables[] = 
                    TableController::new_table
                    (
                        'dashboard.title_client', 
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
                        'dashboard.title_asset', 
                        'asset', 
                        User::find($client)->assets, 
                        true, 
                        '/asset/', 
                        false,
                        null
                    );

                    return view('master.page.table', compact('tables'));
                }
                
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
                    $content = $create_forms['create_client'];

                    return view('master.page.create_form', compact('content'));
                }

            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function save(){

        $data = request();

        $this->validate($data, [
            'full_name' => 'required|string|min:4|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        User::create([
            'name' => $data['full_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $notifications[] = "Usuario agregado";
        return view('master.page.home', compact('notifications'));
    }
}
