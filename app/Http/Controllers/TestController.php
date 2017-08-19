<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Job;

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
                    'dashboard.title_test', 
                    'test', 
                    $tests, 
                    true, 
                    '/test/', 
                    false,
                    null
                );

                return view('master.page.table', compact('tables'));
                
            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function details($test_id){

        $test = Test::find($test_id)->array();
        $tests[] = $test; 

        $tables[] = 
        TableController::new_table
                (
                    'dashboard.title_test', 
                    'test', 
                    $tests, 
                    false, 
                    '', 
                    false,
                    null
                );

        $tables[] = DetailsController::get_details_from($test);

        return view('master.page.table', compact('tables'));
    }

    public function new(){
        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{
                    $create_forms = config('user.create_form');
                    $content = $create_forms['create_test'];

                    foreach (Job::all() as $job) {
                        if (is_object($job)) {
                            $jobs[] = 
                            [
                                'option_name'    =>  $job->id,
                                'option_value'   =>  $job->id,
                            ];
                        }else{
                            $jobs[] = 
                            [
                                'option_name'    =>  $job['id'],
                                'option_value'   =>  $job['id'],
                            ];
                        }
                    }

                    $content['fields'][] = [
                            'name'      => 'job_id',
                            'text'      => 'create_test_job',
                            'type'      => 'combobox',
                            'icon'      => 'info',
                            'size'      => 'm3 s12',
                            'data'      => $jobs,
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
