<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;

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

    public function previewform(){

        if(Validations::is_Connected()) {
            if(!Validations::is_Guest()){
                if(!Validations::is_Admin()){
                   return back();
                }else{
                    $create_forms = config('user.create_form');
                    $content = $create_forms['preview'];

                    return view('master.page.create_form', compact('content'));
                }              
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function preview(Request $request){

        if(Validations::is_Connected()) {
            if(!Validations::is_Guest()){
                if(!Validations::is_Admin()){
                   return back();
                }else{
                    if ($request->hasFile('file_name')) {

                       $data = Excel::load($request->file('file_name')->getRealPath(), function ($reader) {})->get();

                       $tables[] = 
                        TableController::excelhtmltable
                        (
                            'Data preview',
                            $data->toArray()
                        );

                        return view('master.page.tableraw', compact('tables'));

                    }else{ return back(); }
                }              
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }
}
