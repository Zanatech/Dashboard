<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use DB;
use App\PowerFactor;
use Charts;

class TestController extends Controller
{
    public function show(){
        $tests = Test::all();
        $datas = PowerFactor::all();

        $chart = Charts::multi('bar', 'highcharts')
            ->colors(['#ff0000', '#ffffff', '#fff000']);

        foreach ($tests as $test) {
            $dates[] = $test->created_at->toFormattedDateString();

            $datas = PowerFactor::where('insultest','=',$test->id)->get();
            //dd($datas);
            foreach ($datas as $data) {
                $dat[] = $data->cap;
            }
            $chart->dataset('', $dat);
        }

        /*foreach ($datas as $data) {
            $chart->dataset($data->insultest, [$data->cap]);
        }*/

        $charts[] = $chart;
    	return view('dashboard.test', compact('tests', 'charts'));
    }

    public function test($id){
        $test = Test::find($id);
        $columns = DB::select('SHOW COLUMNS FROM power_factors');
        $datas = PowerFactor::all()->where('test_id','=',$id);

        $chart = Charts::multi('bar', 'material')
            ->title("Capacitance C (pF)")
            ->dimensions(0, 400)
            ->template("material")
            ->labels([$test->created_at]);  

            foreach ($datas as $data) {
                $chart->dataset($data->insultest, [$data->cap]);
            }

        $charts[] = $chart;

        $chart = Charts::multi('bar', 'material')
            ->title("Measured")
            ->dimensions(0, 400)
            ->template("material")
            ->labels([$test->created_at]);  

            foreach ($datas as $data) {
                $chart->dataset($data->insultest, [$data->pf]);
            }  

        $charts[] = $chart;

        $chart = Charts::multi('bar', 'material')
            ->title("@20°C")
            ->dimensions(0, 400)
            ->template("material")
            ->labels([$test->created_at]);  

            foreach ($datas as $data) {
                $chart->dataset($data->insultest, [$data->pf_20]);
            }  

        $charts[] = $chart;

        return view('dashboard.testdetail', compact('test','columns','datas', 'charts'));
    }
}
