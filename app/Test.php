<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    public function asset(){
    	return $this->belongTo(Job::class);
    }
}
