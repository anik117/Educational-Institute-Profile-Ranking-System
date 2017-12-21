<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = 'rank';

    public function school(){
    	return $this->belongsTo(School::class);
    }
}
