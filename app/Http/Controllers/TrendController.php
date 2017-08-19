<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrendController extends Controller
{
    public static function get_trends_from($tests){

    	foreach ($tests as $test) {
	    	if (isset($test) and !is_null($test)) {
	    		return TrendController::group_test($test);
	    	}
    	}

    	return back();
    }
    private static function group_test($test){

    	if (is_object($test)) {
    		$group = $test->test_group;
    	}else{ $group = $test['test_group']; }

        switch ($group) {
            case 'TRANS':
                return TrendController::transformer_trends($test);            
            default:
                $errors[] = 'Tabla no terminada - ERROR 002';
        }   
    }

    private static function transformer_trends($test){

    	if (is_object($test)) {
    		$group = $test->test_group;
    	}else{ $group = $test['result_group']; }

        switch ($group) {

            case 'PA - FP':

            case 'PA - Corr Exitacion':

            case 'PA - MTO':

            case 'PA - Res Aislamiento':

            default:
                $errors[] = 'Prueba no existe - ERROR 003';
	            return view('master.page.home');
	    }
    }

    private static function fp_table_charts($details){
    }
    private static function corr_table_chart($details){
    }
    private static function res_table_chart($details){
    }
    private static function mto_table_chart($details){
    }
}
