<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Serie extends Model
{
    public function users(){
		return $this->belongsTo('App\User'); /* retorna usuarios que assistem tal serie */
	}
}
