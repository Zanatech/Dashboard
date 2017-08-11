<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class TestController extends Controller
{
    public function showall(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if(!Validations::is_Admin()){
                   $tests = Test::user_tests(Validations::my_id())->toArray();
                }else{
                    $tests = Test::all();
                }

                $tables[] = 
                TableController::new_table
                (
                    'Tests', 
                    'test', 
                    $tests, 
                    true, 
                    '/test/', 
                    false,
                    null
                );

                return view('dashboard.table', compact('tables'));
                
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function import(){

        if(Validations::is_Connected()) {
            if(!Validations::is_Guest()){
                if(!Validations::is_Admin()){
                   return back();
                }else{
                    return view('dashboard.import');
                }              
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function details($test_id){

        $test = Test::find($test_id)->array();
        $tests[] = $test; 

        $tables[] = 
        TableController::new_table
                (
                    'Tests', 
                    'test', 
                    $tests, 
                    false, 
                    '', 
                    false,
                    null
                );

        $tables[] = DetailsController::get_details_from($test);

        return view('dashboard.table', compact('tables'));

    }
}
