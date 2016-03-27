<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Lecture;
use App\Lecture_part;

use Illuminate\Http\Request;
use App\Http\Requests;

class LectureController extends Controller
{
	public function index() {
		if (Auth::check()) {
			return view('lectures');
		}
		else {
			return redirect('login');
		}
	}


    public function lecture($id) {
        $lecture = Lecture::find($id);
        return view('lecture',[
            'lecture' => $lecture
        ]);
    }

    public function create() {
    	return view('create');
    }

    public function store(Request $request){
        
        $titles = $request->title;
        $texts = $request->text;


        

        $lecture = new Lecture;

        $lecture->title = $titles[0][0];
        
        $lecture->save();

        $count = count($titles);
        for($i = 0; $i < $count; $i++) {
            $lecture->lecture_parts()->save( new Lecture_part(
                    ['title' => $titles[$i][0],'text'=> $texts[$i][0]]
            ));
        }
        if ($request->uid != null) {
            User::find($request->uid)->lectures()->save($lecture);
        }
       

        return redirect('lecture/'.$lecture->id);
    }

    public function destory(Request $request){
        if(Lecture::find($request->id)->delete()){
            return ['success' => true];
        }
        elseif(Lecture::find($request->id)->forceDelete()){
            return ['success' => true];
        }
        else{
            return ['success' => false];
        }
    }
}
