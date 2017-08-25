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
                    $charts = TrendController::fp_trend_charts($fp);
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

    private static function fp_trend_charts($tests){

        foreach ($tests as $test) {
            $date = TrendController::test_date($test->id);

            foreach ($date as $key) {
                foreach ($key as $k) {
                    $labels[] = $k;
                }
            }
        }

        // Extract Info
        for ($i=0; $i < count($tests); $i++) {    

            foreach (TrendController::fp_table($tests[$i]->id) as $detail) {
                $testmodetxt[] = $detail->testmodetxt;

                $cap[$i][] =  $detail->cap;
                $pf[$i][] =  $detail->pf;
                $pf_20[$i][] =  $detail->pf_20;
            }
        }

        for ($i=0; $i < count($tests); $i++) { 
            for ($j=0; $j < 3; $j++) { 
                $cap_trend[$j][] = $cap[$i][$j];
                $pf_trend[$j][] = $pf[$i][$j];
                $pf_20_trend[$j][] = $pf_20[$i][$j];
            }
        }

        $charts[] = 
            [
                'chart' => TableController::multi_areaspline
                (
                    'Capacitance Trend',
                    $labels,
                    [
                        ['label' => $testmodetxt[0], 'values' => $cap_trend[0]],
                        ['label' => $testmodetxt[1], 'values' => $cap_trend[1]],
                        ['label' => $testmodetxt[2], 'values' => $cap_trend[2]]
                    ]
                ),
                'size' => 'xl4 l4 m12 s12' 
            ];

            $charts[] = 
            [
                'chart' => TableController::multi_areaspline
                (
                    'Power Factor Trend',
                    $labels,
                    [
                        ['label' => $testmodetxt[0], 'values' => $pf_trend[0]],
                        ['label' => $testmodetxt[1], 'values' => $pf_trend[1]],
                        ['label' => $testmodetxt[2], 'values' => $pf_trend[2]]
                    ]
                ),
                'size' => 'xl4 l4 m12 s12' 
            ];

            $charts[] = 
            [
                'chart' => TableController::multi_areaspline
                (
                    'Power Factor @20 Trend',
                    $labels,
                    [
                        ['label' => $testmodetxt[0], 'values' => $pf_20_trend[0]],
                        ['label' => $testmodetxt[1], 'values' => $pf_20_trend[1]],
                        ['label' => $testmodetxt[2], 'values' => $pf_20_trend[2]]
                    ]
                ),
                'size' => 'xl4 l4 m12 s12' 
            ];


        return $charts;

    }

    private static function test_date($job_id){
        return DB::table('tests')
            ->select('jobs.due_date')
            ->join('jobs', 'jobs.id', '=', 'tests.job_id')
            ->where('tests.id', '=', $job_id)
            ->get();
    }

    private static function cor_trend_chart($corr){
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
}
