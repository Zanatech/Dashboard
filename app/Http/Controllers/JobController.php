<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\User;
use App\Asset;

class JobController extends Controller
{
   public function showall(){
        if(!Validations::is_Admin()){
           $jobs = Job::user_jobs(Validations::my_id())->toArray();
        }else{
            $jobs = Job::all();
        }

        $tables[] = 
        TableController::new_table
        (
            'dashboard.title_job', 
            'job', 
            $jobs, 
            true, 
            '/job/', 
            false,
            null
        );

        return view('master.page.table', compact('tables'));
    }

    public function tests($job){
        if (!Validations::is_Admin()) {
            if (!Job::is_mine($job, Validations::my_id())) {
                return back();
            }
        }

        $array_jobs[] = Job::find($job)->array();

        $tables[] = 
        TableController::new_table
        (
            'dashboard.title_job', 
            'job', 
            $array_jobs, 
            false, 
            '', 
            false,
            null
        );

        $tables[] = 
        TableController::new_table
        (
            'dashboard.title_test', 
            'test', 
            Job::job_tests($job)->toArray(), 
            true, 
            '/test/', 
            false,
            null
        );

        return view('master.page.table', compact('tables'));
    }

    public function new(){
        if (!Validations::is_Admin()) {
            return back();
        }else{

            $create_forms = config('user.create_form');
            $content = $create_forms['create_job'];

            foreach (User::admins() as $user) {
                if (is_object($user)) {
                    $users[] = 
                    [
                        'option_name'    =>  $user->name,
                        'option_value'   =>  $user->id,
                    ];
                }else{
                    $users[] = 
                    [
                        'option_name'    =>  $user['name'],
                        'option_value'   =>  $user['id'],
                    ];
                }
            }

            foreach (Asset::all() as $asset) {
                if (is_object($asset)) {
                    $assets[] = 
                    [
                        'option_name'    =>  $asset->asset_name,
                        'option_value'   =>  $asset->id,
                    ];
                }else{
                    $assets[] = 
                    [
                        'option_name'    =>  $asset['asset_name'],
                        'option_value'   =>  $asset['id'],
                    ];
                }
            }

            $content['fields'][] = 
                [
                    'name'      => 'user_id',
                    'text'      => 'create_job_user',
                    'type'      => 'combobox',
                    'icon'      => 'info',
                    'size'      => 'm5 s12',
                    'data'      => $users,
                ];
                
            $content['fields'][] = [
                    'name'      => 'asset_id',
                    'text'      => 'create_job_asset',
                    'type'      => 'combobox',
                    'icon'      => 'info',
                    'size'      => 'm5 s12',
                    'data'      => $assets,
                ];

            return view('master.page.create_form', compact('content'));
        }

    }

    public function save(){

        // Guardar Asset recibido
        $errors[] = 'Funcion no implemetada - ERROR 001';
        return view('master.page.home', compact('errors'));
    }
}
