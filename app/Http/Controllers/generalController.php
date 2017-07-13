<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Input;
use DB;
use Charts;

class generalController extends Controller
{
    public function importExcelFile(){

    	if(Input::hasFile('import_file')){

			$path = Input::file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();

			/*if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['insultest' => $value->insultest, 'testmodetxt' => $value->testmodetxt,
                                'overalleng' => $value->overalleng,'overallgnd' => $value->overallgnd,
                                'overallgar' => $value->overallgar,'overallust' => $value->overallust,
                                'kv' => $value->kv,'cap' => $value->cap,
                                 'pf' => $value->pf,'pf_20' => $value->pf_20,
                                 'corr' => $value->corr,'ma' => $value->ma,
                                 'watts' => $value->watts, 'rating' => $value->rating];
				}
                
				if(!empty($insert)){
					DB::table('power_factors')->insert($insert);
                    return view('dashboard.home', ['charts' => null]);
				}
			}*/
            dd($data);
		}
    }
}
