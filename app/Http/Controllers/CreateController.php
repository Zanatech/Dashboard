<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function client(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{
        	    	return view('dashboard.form.create_client');
                }

            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function client_save(){

        echo "Client create method is under construction";
        return view('dashboard.form.create_client');
    }

    public function asset(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{
                    return view('dashboard.form.create_asset');
                }

            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function asset_save(){

        echo "Asset create method is under construction";
        return view('dashboard.form.create_client');
    }

    public function job(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{
                    return view('dashboard.form.create_job');
                }

            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function job_save(){

        echo "Job create method is under construction";
        return view('dashboard.form.create_client');
    }


    public function test(){

        if (Validations::is_Connected()) {
            if(!Validations::is_Guest()){

                if (!Validations::is_Admin()) {
                    return back();
                }else{
                    return view('dashboard.form.create_test');
                }

            }else {return view('errors.letlogin'); }
        }else { return back(); }
    }

    public function test_save(){

        echo "Client create method is under construction";
        return view('dashboard.form.create_test');
    }
}
