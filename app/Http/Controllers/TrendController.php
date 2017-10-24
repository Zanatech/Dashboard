<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Asset;

class TrendController extends Controller
{
    public static function trans_trends($asset){
        // Asset deberia tener tipo de conjunto de prueba
        return TrendController::fp_charts($asset);
    }

    private static function fp_charts($asset){

        $tests = Asset::asset_tests($asset)->toArray();

        foreach ($tests as $test) {
            switch ($test->result_group) {
                case 'PA - FP':
                    $fp[] = $test;
                    $charts = ChartController::fp_trend_charts($fp);
                    break;
                case 'PA - Corr Exitacion':
                    $corr[] = $test;
                    break;
                case 'PA - MTO':
                    $mto[] = $test;
                    break;
                case 'PA - Res Aislamiento':
                    $res[] = $test;
                    break;
                default:
            }
        }

        if (isset($charts)) {
        	return $charts;
        }else{ return null; }
    }
}
