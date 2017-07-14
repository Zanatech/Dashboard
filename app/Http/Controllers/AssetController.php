<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;
use App\Test;
use App\PowerFactor;
use Charts;
use DB;

class AssetController extends Controller
{
    public function show(){
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return back();
        }

        $assets = Asset::all();
    	return view('dashboard.asset', compact('assets'));
    }

    public function tests($id){

        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            return back();
        }

        $tests = Test::all()->where('asset_id','=', $id);

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
}
