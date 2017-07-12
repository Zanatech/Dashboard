<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    public function tests(){
    	return $this->hasMany(Test::class);
    }

    public function client(){
    	return $this->belongTo(Client::class);
    }
}
