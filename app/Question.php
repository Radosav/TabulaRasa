<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
	public function lecture_part(){
    	return $this->belongsTo(Lecture_part::class);
    }

    public function answers(){
    	return $this->hasMany(Answer::class);
    }
}
