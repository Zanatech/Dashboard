<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function jobs(){
    	return $this->hasMany(Job::class);
    }

    public function client(){
    	return $this->belongsTo(User::class, 'user_id');
    }
}
