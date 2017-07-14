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

        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return back();
        }

        $tests = Test::all();

        foreach ($tests as $test) {
            $dates[] = $test->created_at->toFormattedDateString();
        }

        $capacitance = null;
        $power_factors = null;
        $power_factors20 = null;

        $datas = PowerFactor::where('insultest','=','A')->get();
        foreach ($datas as $data) {
            $capacitance[] = $data->cap;
            $power_factors[] = $data->pf;
            $power_factors20[] = $data->pf_20;
        }

        $chart = Charts::multi('areaspline', 'highcharts')
            ->title('Insulation -  A')
            ->colors(['#F44336', '#2196F3', '#009688'])
            ->labels($dates)
            ->dataset('Capacitance', $capacitance)
            ->dataset('Measured', $power_factors)
            ->dataset('@20°C', $power_factors20);

        $charts[] = $chart;

        $capacitance = null;
        $power_factors = null;
        $power_factors20 = null;

        $datas = PowerFactor::where('insultest','=','B')->get();
        foreach ($datas as $data) {
            $capacitance[] = $data->cap;
            $power_factors[] = $data->pf;
            $power_factors20[] = $data->pf_20;
        }

        $chart = Charts::multi('areaspline', 'highcharts')
            ->title('Insulation - B')
            ->colors(['#F44336', '#2196F3', '#009688'])
            ->labels($dates)
            ->dataset('Capacitance', $capacitance)
            ->dataset('Measured', $power_factors)
            ->dataset('@20°C', $power_factors20);

        $charts[] = $chart;

        $capacitance = null;
        $power_factors = null;
        $power_factors20 = null;
        
        $datas = PowerFactor::where('insultest','=','C')->get();
        foreach ($datas as $data) {
            $capacitance[] = $data->cap;
            $power_factors[] = $data->pf;
            $power_factors20[] = $data->pf_20;
        }

        $chart = Charts::multi('areaspline', 'highcharts')
            ->title('Insulation - C')
            ->colors(['#F44336', '#2196F3', '#009688'])
            ->labels($dates)
            ->dataset('Capacitance', $capacitance)
            ->dataset('Measured', $power_factors)
            ->dataset('@20°C', $power_factors20);

        $charts[] = $chart;
    	return view('dashboard.test', compact('tests', 'charts'));
    }

    public function test($id){

        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return back();
        }

        $test = Test::find($id);
        $columns = DB::select('SHOW COLUMNS FROM power_factors');
        $datas = PowerFactor::all()->where('test_id','=',$id)->take(3);

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

        $datas = PowerFactor::all()->where('test_id','=',$id);
        return view('dashboard.testdetail', compact('test','columns','datas', 'charts'));
    }
}
