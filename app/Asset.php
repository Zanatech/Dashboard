<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Asset extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plant', 'substation', 'location', 'eq_type', 'asset_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id', 'id',
    ];

    public function jobs(){
    	return $this->hasMany(Job::class);
    }

    public function client(){
    	return $this->belongsTo(User::class);
    }

    public static function user_assets($user_id){
        // Elequent - Get only few fields
        
        return Asset::all()
            ->where('user_id', '=', $user_id);
    }

    public static function is_mine($asset_id, $user_id){
        if(Asset::find($asset_id)->user_id !== $user_id){
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function array(){
        return [

            'id'                => $this->id,
            'plant'             => $this->plant,
            'subtation'         => $this->substation,
            //'location'   		=> $this->location,
            'eq_type'	        => $this->eq_type,
            'name'	         	=> $this->asset_name,
            //'user_id'        => $this->user_id,
            //'created_at' => $this->created_at,
            //'updated_at'    => $this->updated_at,
        ];
    }

    public static function asset_tests($asset){

        return DB::table('tests')
            ->select('tests.id', 'test_group', 'result_group', 'test_status')
            ->join('jobs', 'tests.job_id', '=', 'jobs.id')
            ->join('assets', 'jobs.asset_id', '=', 'assets.id')
            ->where('assets.id', '=', $asset)
            ->get();
    }
}
