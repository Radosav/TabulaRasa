<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecture_part extends Model
{
	protected $fillable = ['title','text'];

	public function lecture(){
    	return $this->belongsTo(Lecture::class);
    }

	public function questions(){
		return $this->hasMany(Question::class);
	}    
}
