<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Job extends Model
{
    public function tests(){
    	return $this->hasMany(Test::class);
    }

    public function asset(){
    	return $this->belongTo(Asset::class);
    }

    public function user(){
    	return $this->belongTo(User::class);
    }

    public function array(){
        return [

            'id'                => $this->id,
            'target_date'       => $this->target_date,
            //'created_at'        => $this->created_at,
            //'updated_at'   		=> $this->updated_at,
            'due_date'	        => $this->due_date,
            //'job_complete'	    => $this->job_complete,
            //'invoice_sent'      => $this->invoice_sent,
            //'user_id' 			=> $this->user_id,
            //'asset_id'    		=> $this->asset_id,
        ];
    }

    public static function user_jobs($user_id){
        return  DB::table('jobs')
                    ->select('jobs.id', 'jobs.target_date', 'jobs.due_date', 'jobs.job_complete', 'jobs.invoice_sent')
                    ->join('assets', 'assets.id', '=', 'jobs.asset_id')
                    ->where('assets.user_id', '=', $user_id)
                    ->get();
    }

    public static function job_tests($job){
        return DB::table('tests')
                    ->select('tests.id', 'test_group', 'result_group', 'test_status')
                    ->join('jobs', 'tests.job_id', '=', 'jobs.id')
                    ->where('jobs.id', '=', $job)
                    ->get();
}

    public static function is_mine($job, $user_id){

        $job = DB::table('jobs')
                    ->join('assets', 'assets.id', '=', 'jobs.asset_id')
                    ->select('assets.user_id')
                    ->where('jobs.id', '=', $job)
                    ->get();

        if($job[0]->user_id !== $user_id){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}
