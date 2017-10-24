<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChartController extends Controller
{
    public static function fp_table_charts($details){

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
                trans('charts.cap_high'),
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
                trans('charts.pf_low'),
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
                trans('charts.pf_high'),
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
    public static function corr_table_chart($details){

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
                    trans('charts.ma'),
                    $labels,
                    [
                        ['label' => trans('charts.fase_a'), 'values' => $ma1],
                        ['label' => trans('charts.fase_b'), 'values' => $ma2],
                        ['label' => trans('charts.fase_c'), 'values' => $ma3]
                    ]
                ), 
                'size' => 'xl6 l6 m12 s12' 
            ];

        $charts[] = 
            [
                'chart' => TableController::multi_areaspline
                (
                    trans('charts.watts'),
                    $labels,
                    [
                        ['label' => trans('charts.fase_a'), 'values' => $watts1],
                        ['label' => trans('charts.fase_b'), 'values' => $watts2],
                        ['label' => trans('charts.fase_c'), 'values' => $watts3]
                    ]
                ),
                'size' => 'xl6 l6 m12 s12' 
            ];

        return $charts;
    }
    public static function res_table_chart($details){

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
    public static function mto_table_chart($details){

        foreach ($details as $detail) {
            $labels[] = $detail->test_num;
            $h1[] = $detail->resw1;
            $h2[] = $detail->resw2;
            $h3[] = $detail->resw3;
        }

        $charts[] = 
            [
                'chart' => TableController::multi_areaspline
                (
                    trans('charts.mto_title'),
                    $labels,
                    [
                        ['label' => trans('charts.h1h0'), 'values' => $h1],
                        ['label' => trans('charts.h2h0'), 'values' => $h2],
                        ['label' => trans('charts.h3h0'), 'values' => $h3]
                    ]
                ),
                'size' => 'xl12 l12 m12 s12' 
            ];

        return $charts;
    }
    public static function fp_trend_charts($tests){

        foreach ($tests as $test) {
            $date = DBController::test_date($test->id);

            foreach ($date as $key) {
                foreach ($key as $k) {
                    $labels[] = $k;
                }
            }
        }

        // Extract Info
        for ($i=0; $i < count($tests); $i++) {    

            foreach (DBController::fp_table($tests[$i]->id) as $detail) {
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
}