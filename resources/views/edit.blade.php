    <?php 
    if(Auth::check()){
        $user = Auth::user();
    }else{
        $user = null;
    }
?>
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default col-md-12">
                <div class="panel-body">
                    <form method="POST" class="main-form" action="/lectures/store">
                        <ul id="selectable">
                            <input type="hidden" name="uid" value="<?php echo $user == null ? '' : $user->id; ?>">
                            <div class="form-group">
                                <input name="title[0]" type="text" placeholder="<?php echo $lecture->title; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'"  class="form-control title lecture_title" value="<?php echo $lecture->title; ?>"/>
                            </div>

                            <?php $lecutre_part_count = count($lecture->lecture_parts); ?>
                            <?php for ($i=0; $i < $lecutre_part_count; $i++): ?>
                                <li class="form-group itteration-<?php echo $i; ?> selectable">
                                    <input name="title[<?php echo $i; ?>]" type="text" placeholder="Subtitle" onfocus="this.placeholder =\'\' " onblur="this.placeholder = <?php echo $lecture->lecture_parts[$i]->title; ?>" value="<?php echo $lecture->lecture_parts[$i]->title; ?>" class="form-control title lecture_subtitle"/>
                                    <textarea name="text[<?php echo $i; ?>]" class="form-control lecture_part ckeditor" placeholder="Text"><?php echo $lecture->lecture_parts[$i]->text; ?></textarea>
                                    <div class="questions">
                                    <?php $question_count = count($lecture->lecture_parts[$i]->questions); ?>
                                    <?php for ($q=0; $q < $question_count; $q++): ?>
                                    <?php $question = $lecture->lecture_parts[$i]->questions[$q]; ?>
                                        <div class="question question-<?php echo $q; ?>">
                                            <p>Question:</p>
                                            <input type="text" name="question[<?php echo $i; ?>][<?php echo $q; ?>]" value="<?php echo $question->question; ?>"></input>
                                            <p>Answers:</p>
                                            <ul class="answers">
                                            <?php $answer_count = count($lecture->lecture_parts[$i]->questions[$q]->answers); ?>
                                            <?php for ($a=0; $a < $answer_count; $a++): ?>
                                            <?php $answer = $lecture->lecture_parts[$i]->questions[$q]->answers[$a]; ?>
                                                <li class="answer">
                                                    <input type="checkbox" class="correct" name="correct[<?php echo $i; ?>][<?php echo $q; ?>][<?php echo $a; ?>]" />
                                                    <label for="correct[<?php echo $i; ?>][<?php echo $q; ?>][<?php echo $a; ?>]"/>
                                                    <input class="answer-<?php echo $a; ?>" name="answer[<?php echo $i; ?>][<?php echo $q; ?>][<?php echo $a; ?>]" value ="<?php echo $answer->answer; ?>"></input>
                                                </li>
                                            <?php endfor; ?>
                                            </ul>
                                            <div class="form-group formControls">
                                                <a class="btn btn-primary" onclick="addAnswer(<?php echo $i; ?>,<?php echo $q; ?>,this)">Add Answer</a>
                                            </div>
                                        </div>

                                    <?php endfor; ?>
                                    </div>
                                    <div class="form-group formControls addQuestion">
                                        <a class="btn btn-primary" onclick="addQuestion(<?php echo $i; ?>,this)">Add Question</a>
                                    </div>
                                </li>
                            <?php endfor; ?>

                            <div class="form-group formControls formControls-Main">
                                <a class="btn btn-primary" onclick="addSelection()">Add Section</a>
                                <button type="submit" class="btn btn-primary pull-right">Complete</button>
                            </div>  
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
    <script type="text/javascript">
        //CKEDITOR.replace('text[0]');
    </script>

    <script type="text/javascript">
        var i = 0;
        var qi = 0;
        function addSelection(){
            i++;
            var selection  = '<li class="form-group itteration-'+i+' selectable">';
                selection +=    '<input name="title['+i+']" type="text" placeholder="Subtitle" onfocus="this.placeholder =\'\' " onblur="this.placeholder = \'Subtitle\'"  class="form-control title lecture_subtitle"/>';
                selection +=    '<textarea name="text['+i+']" class="form-control lecture_part" placeholder="Text"/>';
                selection +=    '<div class="questions">'
                selection +=        '<div class="form-group formControls addQuestion">';
                selection +=            '<a class="btn btn-primary" onclick="addQuestion('+i+',this)">Add Question</a>';
                selection +=        '</div>';
                selection +=    '</div>';
                selection += '</li>';
            jQuery(selection).insertBefore(".formControls-Main");
            CKEDITOR.replace('text['+i+']');
        }

        function addQuestion(pid,me) {
            var qi = jQuery(me).parent().parent().children("div.question").length;
            var question =  '<div class="question question-'+qi+'">';
                question +=     '<p>Question:</p>';
                question +=     '<input type="text" name="question['+pid+']['+qi+']"/>';
                question +=     '<p>Answers:</p>';
                question +=     '<ul class="answers">';
                question +=     '</ul>';
                question +=     '<div class="form-group formControls">'
                question +=         '<a class="btn btn-primary" onclick="addAnswer('+pid+','+qi+',this)">Add Answer</a>'
                question +=     '</div>'
                question += '</div>';
            
            jQuery(question).insertBefore(jQuery(".itteration-"+pid).find(".addQuestion"));
        }

        function addAnswer(pid,qid,me) {
            var ai = jQuery(me).parent().parent().children("ul.answers").children("li.answer").length;
            var answer = '<li class="answer">';
                answer +=   '<input class="answer-'+ai+'" name="answer['+pid+']['+qid+']['+ai+']"></input>';
                answer +=   '<input type="checkbox" class="correct" name="correct['+pid+']['+qid+']['+ai+']" />';
                answer +=   '<label for="correct['+pid+']['+qid+']['+ai+']">Correct?</label>';
                answer +='</li>';
            jQuery(".question-"+qid).find(".answers").append(answer);
        }
    </script>
@endsection