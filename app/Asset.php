<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
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
}
