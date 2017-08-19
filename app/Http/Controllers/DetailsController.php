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
                $errors[] = 'Tabla no terminada - ERROR 002';
        }   
    }
    private static function transformer_details($test){

        switch ($test['result_group']) {

            case 'PA - FP':

            	$details = DetailsController::fp_table($test['id'])->toArray();

	            return 
                	TableController::new_table
                (
                    'dashboard.title_fp_table', 
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
                    'dashboard.title_corr_table', 
                    'corr_table', 
	                $details, 
                    false, 
                    '',
                    true,
                    DetailsController::corr_table_chart($details)
                );
            case 'PA - MTO':
                $errors[] = 'Tabla no terminada - ERROR 002';
                return view('master.page.home', compact('errors'));
            case 'PA - Res Aislamiento':

            	$details = DetailsController::res_table($test['id'])->toArray();

	            return 
                	TableController::new_table
                (
                    'dashboard.title_res_table', 
                    'res_table', 
	                $details, 
                    false, 
                    '',
                    true,
                    DetailsController::res_table_chart($details)
                );
            default:
                $errors[] = 'Prueba no existe - ERROR 003';
	            return view('master.page.home');
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
        [
            'chart' => TableController::multi_bar
            (
            	trans('charts.pf_high'),
            	[trans('charts.cap')],
            	[
            		['label' => $labels[0], 'values' => $cap[0]],
            		['label' => $labels[1], 'values' => $cap[1]],
            		['label' => $labels[2], 'values' => $cap[2]]
        		]
            ),
            'size' => null
        ];

        $charts[] = 
        [
            'chart' => TableController::multi_bar
            (
            	trans('charts.pf_high'),
            	[trans('charts.fp_20')],
            	[
            		['label' => $labels[0], 'values' => $pf_20[0]],
            		['label' => $labels[1], 'values' => $pf_20[1]],
            		['label' => $labels[2], 'values' => $pf_20[2]]
        		]
            ),
            'size' => null
        ];

        $charts[] = 
        [
            'chart' => TableController::multi_bar
            (
            	trans('dashboard.pf_low'),
            	[trans('charts.fp')],
            	[
            		['label' => $labels[0], 'values' => $pf[0]],
            		['label' => $labels[1], 'values' => $pf[1]],
            		['label' => $labels[2], 'values' => $pf[2]]
            	]
            ),
            'size' => null
        ];

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
        	[ 
                'chart' => TableController::multi_areaspline
            	(
            		'mA',
            		$labels,
            		[
    	        		['label' => 'Fase A', 'values' => $ma1],
            			['label' => 'Fase B', 'values' => $ma2],
            			['label' => 'Fase C', 'values' => $ma3]
            		]
            	), 
                'size' => 'xl6 l6 m12 s12' 
            ];

    	$charts[] = 
        	[
                'chart' => TableController::multi_areaspline
            	(
            		'Watts',
            		$labels,
            		[
            			['label' => 'Fase A', 'values' => $watts1],
            			['label' => 'Fase B', 'values' => $watts2],
            			['label' => 'Fase C', 'values' => $watts3]
        			]
            	),
                'size' => 'xl6 l6 m12 s12' 
            ];

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
        [
            'chart' => TableController::create_line
            (
            	trans('charts.res_htl'),
            	trans('charts.megohms'),
            	$labels,
            	$corr1
            ), 
            'size' => null
        ];

        $charts[] = 
        [
            'chart' => TableController::create_line
            (
            	trans('charts.res_lth'),
            	trans('charts.megohms'),
            	$labels,
            	$corr2
            ), 
            'size' => null
        ];

        $charts[] = 
        [
            'chart' => TableController::create_line
            (
            	trans('charts.res_hal'),
            	trans('charts.megohms'),
            	$labels,
            	$corr3
            ),
            'size' => null
        ];

        return $charts;
    }
    private static function mto_table_chart($details){
    }
}
