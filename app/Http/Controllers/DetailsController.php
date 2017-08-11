<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
                echo "Invalid Test - Please call IT";
        }   
    }

    private static function transformer_details($test){

        switch ($test['result_group']) {

            case 'PA - FP':

            	$details = DetailsController::fp_table($test['id'])->toArray();

	            return 
                	TableController::new_table
                (
                    'Power Factor Table', 
                    'fp_table', 
	                $details, 
                    false,
                    '',
                    true,
                    DetailsController::fp_table_charts($details)
                );
            case 'PA - Corr Exitacion':

            	$details = DetailsController::corr_table($test['id'])->toArray();

	            return 
                	TableController::new_table
                (
                    'Corr Table', 
                    'corr_table', 
	                $details, 
                    false, 
                    '',
                    true,
                    DetailsController::corr_table_chart($details)
                );
            case 'PA - MTO':
                echo "Invalid Test - Please call IT";
                return view('home');
            case 'PA - Res Aislamiento':

            	$details = DetailsController::res_table($test['id'])->toArray();

	            return 
                	TableController::new_table
                (
                    'Res Table', 
                    'res_table', 
	                $details, 
                    false, 
                    '',
                    true,
                    DetailsController::res_table_chart($details)
                );
            default:
                echo "Invalid Test - Please call IT";
	            return view('home');
	    }
    }

    private static function fp_table($test_id){
        return  DB::table('f_ps')
                    ->select('id', 'testmodetxt', 'kv', 'cap', 'pf', 'pf_20', 'corr', 'ma', 'watts', 'vdf')
                    ->where('f_ps.test_id', '=', $test_id)
                    ->get();
    }

    private static function corr_table($test_id){
        return  DB::table('corr_exitacions')
                    ->select('id', 'excite_CorrMa_1', 'excite_CorrWatts_1', 'excite_CorrMa_2', 'excite_CorrWatts_2', 'excite_CorrMa_3', 'excite_CorrWatts_3')
                    ->where('corr_exitacions.test_id', '=', $test_id)
                    ->get();
    }

    private static function res_table($test_id){
        return  DB::table('res_aislamientos')
                    ->select('id', 'TestTime', 'Corr1', 'Corr2', 'Corr3')
                    ->where('res_aislamientos.test_id', '=', $test_id)
                    ->get();
    }

    private static function mto_table($test_id){
        return  DB::table('m_t_os')
                    //->where('m_t_os.test_id', '=', $test_id)
                    ->get();
    }

    private static function fp_table_charts($details){

        foreach ($details as $detail) {
        	$labels[] = $detail->testmodetxt;
	        $cap[] = [$detail->cap];
	        $pf_20[] = [$detail->pf_20];
	        $pf[] = [$detail->pf];
	    }

        $charts[] = 
        TableController::multi_bar
        (
        	"Factor de Potencia - Devanado de alta tensión",
        	["Capacitancia"],
        	[
        		['label' => $labels[0], 'values' => $cap[0]],
        		['label' => $labels[1], 'values' => $cap[1]],
        		['label' => $labels[2], 'values' => $cap[2]]
    		]
        );

        $charts[] = 
        TableController::multi_bar
        (
        	"Factor de Potencia - Devanado de alta tensión",
        	["FP @20"],
        	[
        		['label' => $labels[0], 'values' => $pf_20[0]],
        		['label' => $labels[1], 'values' => $pf_20[1]],
        		['label' => $labels[2], 'values' => $pf_20[2]]
    		]
        );

        $charts[] = 
        TableController::multi_bar
        (
        	"Factor de Potencia - Devanado de baja tensión",
        	["FP"],
        	[
        		['label' => $labels[0], 'values' => $pf[0]],
        		['label' => $labels[1], 'values' => $pf[1]],
        		['label' => $labels[2], 'values' => $pf[2]]
        	]
        );

        return $charts;
    }

    private static function corr_table_chart($details){

    	foreach ($details as $detail) {
            $labels[] = $detail->id;
            $ma1[] = $detail->excite_CorrMa_1;
            $ma2[] = $detail->excite_CorrMa_2;
            $ma3[] = $detail->excite_CorrMa_3;
            $watts1[] = $detail->excite_CorrWatts_1;
            $watts2[] = $detail->excite_CorrWatts_2;
            $watts3[] = $detail->excite_CorrWatts_3;
        }

        $charts[] = 
        	TableController::multi_areaspline
        	(
        		'mA',
        		$labels,
        		[
	        		['label' => 'Fase A', 'values' => $ma1],
        			['label' => 'Fase B', 'values' => $ma2],
        			['label' => 'Fase C', 'values' => $ma3]
        		]
        	);

    	$charts[] = 
        	TableController::multi_areaspline
        	(
        		'Watts',
        		$labels,
        		[
        			['label' => 'Fase A', 'values' => $watts1],
        			['label' => 'Fase B', 'values' => $watts2],
        			['label' => 'Fase C', 'values' => $watts3]
    			]
        	);

        return $charts;
    }

    private static function res_table_chart($details){

		foreach ($details as $detail) {
			$labels[] = $detail->TestTime;
			$corr1[] = $detail->Corr1;
			$corr2[] = $detail->Corr2;
			$corr3[] = $detail->Corr3;
		}

        $charts[] = 
        	TableController::create_line
        (
        	'Low Grounded',
        	'Label',
        	$labels,
        	$corr1
        );

        $charts[] = 
        	TableController::create_line
        (
        	'High Grounded',
        	'Label',
        	$labels,
        	$corr2
        );

        $charts[] = 
        	TableController::create_line
        (
        	'Low + High Grounded',
        	'Label',
        	$labels,
        	$corr3
        );

        return $charts;
    }

    private static function mto_table_chart($details){
    }
}
