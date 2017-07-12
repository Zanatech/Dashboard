<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PowerFactor extends Model
{
    public function test(){
    	return $this->belongTo(Test::class);
    }
}
