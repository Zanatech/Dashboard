<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function assets(){
    	return $this->hasMany(Asset::class, 'client_id');
    }
}
