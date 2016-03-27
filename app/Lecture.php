<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
	public function user(){
    	return $this->belongsTo(User::class);
    }

    public function lecture_parts(){
    	return $this->hasMany(Lecture_part::class);
    }
}
