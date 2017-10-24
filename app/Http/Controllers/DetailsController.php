<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public static function get_details_from($test){

    	if (isset($test) and !is_null($test)) {
    		return DetailsController::group_test($test);
    	}

    	return back();
    }
    private static function group_test($test){
        switch ($test['test_group']) {
            case 'TRANS':
                return DetailsController::transformer_details($test);            
            default:
                $errors[] = 'ERROR 002';
        }   
    }
    private static function transformer_details($test){

        switch ($test['result_group']) {

            case 'PA - FP':

            	$details = DBController::fp_table($test['id'])->toArray();

	            return 
                	TableController::new_table
                (
                    'dashboard.title_fp_table', 
                    'fp_table', 
	                $details, 
                    false,
                    '',
                    true,
                    ChartController::fp_table_charts($details)
                );
            case 'PA - Corr Exitacion':

            	$details = DBController::corr_table($test['id'])->toArray();

	            return
                	TableController::new_table
                (
                    'dashboard.title_corr_table', 
                    'corr_table', 
	                $details, 
                    false, 
                    '',
                    true,
                    ChartController::corr_table_chart($details)
                );
            case 'PA - MTO':
                $details = DBController::mto_table($test['id'])->toArray();

                return
                    TableController::new_table
                (
                    'dashboard.title_mto_table', 
                    'mto_table', 
                    $details, 
                    false, 
                    '',
                    true,
                    ChartController::mto_table_chart($details)
                );
            case 'PA - Res Aislamiento':

            	$details = DBController::res_table($test['id'])->toArray();

	            return 
                	TableController::new_table
                (
                    'dashboard.title_res_table', 
                    'res_table', 
	                $details, 
                    false, 
                    '',
                    true,
                    ChartController::res_table_chart($details)
                );
            default:
                $errors[] = 'ERROR 003';
	            return view('master.page.home');
	    }
    }
}
