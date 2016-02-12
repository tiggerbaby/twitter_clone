<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function tweets()
    {
    	return $this->belongsToMany('App\Tweet');
    }

}
