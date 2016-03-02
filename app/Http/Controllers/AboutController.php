<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AboutController extends Controller
{
    public function people(){
    	$people = ['developers'=>['Radosav','Milic','Filip','Mihail'],'Marketing'=>['Katarina']];
		return view('about.people',[
			'people'=>$people
		]);
    }

    public function project()
    {
    	$name = "TabulaRasa";
    	$description = 'TabulaRasa aims to assist teachers in making lectures easier, faster and simpler so that students can learn more efficiently over the internet.';

    	return view('about.project',[
    		'name'=>$name,
    		'desc'=>$description
    	]);
    }
}
