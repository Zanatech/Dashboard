<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DBController extends Controller
{
    public static function fp_table($test_id){
        return  DB::table('f_ps')
                    ->select('id', 'testmodetxt', 'kv', 'cap', 'pf', 'pf_20', 'corr', 'ma', 'watts', 'vdf')
                    ->where('f_ps.test_id', '=', $test_id)
                    ->get();
    }
    public static function corr_table($test_id){
        return  DB::table('corr_exitacions')
                    ->select('id', 'excite_CorrMa_1', 'excite_CorrWatts_1', 'excite_CorrMa_2', 'excite_CorrWatts_2', 'excite_CorrMa_3', 'excite_CorrWatts_3')
                    ->where('corr_exitacions.test_id', '=', $test_id)
                    ->get();
    }
    public static function res_table($test_id){
        return  DB::table('res_aislamientos')
                    ->select('id', 'TestTime', 'Corr1', 'Corr2', 'Corr3')
                    ->where('res_aislamientos.test_id', '=', $test_id)
                    ->get();
    }
    public static function mto_table($test_id){
        return  DB::table('m_t_os')
                    ->select('id', 'test_num', 'current', 'resw1', 'resw2', 'resw3', 'sf1', 'variance')
                    ->where('m_t_os.test_id', '=', $test_id)
                    ->get();
    }
    public static function test_date($job_id){
        return DB::table('tests')
            ->select('jobs.due_date')
            ->join('jobs', 'jobs.id', '=', 'tests.job_id')
            ->where('tests.id', '=', $job_id)
            ->get();
    }
    public static function all_user(){
        return DB::table('users')->get();
    }
}