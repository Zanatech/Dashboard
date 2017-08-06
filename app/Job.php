<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
