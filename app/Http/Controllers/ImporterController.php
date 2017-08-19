<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImporterController extends Controller
{
    public function showform(){

        if(Validations::is_Connected()) {
            if(!Validations::is_Guest()){
                if(!Validations::is_Admin()){
                   return back();
                }else{
                    $create_forms = config('user.create_form');
                    $content = $create_forms['import'];

                    return view('master.page.create_form', compact('content'));
                }              
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function import(){

    	if(Validations::is_Connected()) {
            if(!Validations::is_Guest()){
                if(!Validations::is_Admin()){
                   return back();
                }else{
                	// Import File
                }              
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }
}
