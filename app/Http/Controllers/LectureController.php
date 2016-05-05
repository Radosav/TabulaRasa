<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Lecture;
use App\Lecture_part;
use App\Question;
use App\Answer;

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

    public function edit($id) {
        $lecture = Lecture::find($id);
        return view('edit',[
            'lecture' => $lecture
        ]);
    }

    public function create() {
    	return view('create');
    }

    public function store(Request $request){
        
        $titles = $request->title;
        $texts = $request->text;
        $questions = $request->question;
        $answers = $request->answer;
        $correct = $request->correct;

        echo "<pre>";
        // var_dump($correct);

        // echo "\n\n\n\n\n\n\n####################\n";

        $lecture = new Lecture;

        $lecture->title = $titles[0];
        
        $lecture->save();

        $count = count($titles);
        for($i = 0; $i < $count; $i++) {
            $lecture_part = new Lecture_part(
                ['title' => $titles[$i],'text'=> $texts[$i]]
            );
            $lecture->lecture_parts()->save($lecture_part);
            if (!empty($questions[$i][0])) {
                $questions_count = count($questions[$i]);
                for($q = 0; $q < $questions_count; $q++) {
                    $question = new Question(['question' => $questions[$i][$q]]);

                    
                    if (isset($correct[$i][$q])) {
                        $correct_count = count($correct[$i][$q]);
                        if ($correct_count > 1) {
                            $question->isMultiple = true;
                        }
                        else{
                            $question->isMultiple = false;
                        }
                    }

                    $lecture_part->questions()->save($question);
                    if (!empty($answers[$i][$q][0])) {
                        $answer_count = count($answers[$i][$q]);
                        for($a = 0; $a < $answer_count; $a++) {
                            $answer = new Answer(['answer' => $answers[$i][$q][$a]]);
                            
                            if (isset($correct[$i][$q][$a])) {
                                $answer->right = $correct[$i][$q][$a] == "on" ? true : false;
                            }
                            $question->answers()->save($answer);
                        }

                    }
                    $lecture_part->questions()->save($question);
                }
                $lecture->lecture_parts()->save($lecture_part);
            }
        }
        $lecture->save();
        if ($request->uid != null) {
            User::find($request->uid)->lectures()->save($lecture);
        }
       
        return redirect('lecture/'.$lecture->id);
    }

    public function save(Request $request){
        
        $titles = $request->title;
        $texts = $request->text;
        $questions = $request->question;
        $answers = $request->answer;
        $correct = $request->correct;
        var_dump($correct);die();

        $lecture = Lecture::find($request->lecture_id());

        $lecture->title = $titles[0];
        
        $lecture->save();
        
        $count = count($titles);
        for($i = 0; $i < $count; $i++) {
            $lecture_part = new Lecture_part(
                ['title' => $titles[$i],'text'=> $texts[$i]]
            );
            $lecture->lecture_parts()->save($lecture_part);
            if (!empty($questions[$i][0])) {
                $questions_count = count($questions[$i]);
                for($q = 0; $q < $questions_count; $q++) {
                    $question = new Question(['question' => $questions[$i][$q]]);
                    $lecture_part->questions()->save($question);
                    if (!empty($answers[$i][$q][0])) {
                        $answer_count = count($answers[$i][$q]);
                        for($a = 0; $a < $answer_count; $a++) {
                            $answer = new Answer(['answer' => $answers[$i][$q][$a]]);
                            $question->answers()->save($answer);
                        }
                    }
                    $lecture_part->questions()->save($question);
                }
                $lecture->lecture_parts()->save($lecture_part);
            }
        }
        $lecture->save();
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
