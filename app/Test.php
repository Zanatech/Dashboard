<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Test extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'test_group', 'result_group', 'test_status', 'comments', 'deficiencies',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id', 'job_id',
    ];

    public function asset(){
    	return $this->belongTo(Job::class);
    }

    public function array(){
        return [

            'id'                => $this->id,
            'test_group'       	=> $this->test_group,
            'result_group'      => $this->result_group,
            'test_status'   	=> $this->test_status,
            //'deficiencies'	    => $this->deficiencies,
            //'job_id'	    	=> $this->job_id,
            //'created_at'      	=> $this->created_at,
            //'updated_at' 		=> $this->updated_at,
        ];
    }

    public static function user_tests($user_id){

        return  DB::table('tests')
                    ->select('tests.id', 'tests.test_group', 'tests.result_group', 'tests.test_status')
                    ->join('jobs', 'jobs.id', '=', 'tests.job_id')
                    ->join('assets', 'assets.id', '=', 'jobs.asset_id')
                    ->where('assets.user_id', '=', $user_id)
                    ->get();
    }

    public static function is_mine($test, $user_id){

        $test = DB::table('tests')
                    ->join('jobs', 'jobs.id', '=', 'tests.job_id')
                    ->join('assets', 'assets.id', '=', 'jobs.asset_id')
                    ->select('assets.user_id')
                    ->where('tests.id', '=', $test)
                    ->get();

        if($test[0]->user_id !== $user_id){
            return FALSE;
        }else{
            return TRUE;
        }
    }
}
