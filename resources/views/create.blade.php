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
                                    <input name="title[0]" type="text" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'"  class="form-control title lecture_title"/>
                                </div>



                                <li class="form-group itteration-0 selectable">
                                    <textarea name="text[0]" class="form-control lecture_part" placeholder="Text"></textarea>
                                    <div class="questions">
                                        <div class="question question-0">
                                            <p>Question:</p>
                                            <input type="text" class="full-width" name="question[0][0]"></input>
                                            <p>Answers:</p>
                                            <ul class="answers">
                                                <li class="answer">
                                                    <input class="full-width answer-0" name="answer[0][0][0]"></input>
                                                    <input type="checkbox" class="correct" name="correct[0][0][0]" />
                                                    <label for="correct[0][0][0]">Correct?</label>
                                                </li>
                                            </ul>
                                            <div class="form-group formControls centered">
                                                <a class="btn btn-primary new" onclick="addAnswer(0,0,this)">Add Answer</a>
                                            </div>
                                        </div>
                                        <div class="form-group formControls addQuestion centered">
                                            <a class="btn btn-primary new" onclick="addQuestion(0,this)">Add Question</a>
                                        </div>
                                    </div>
                                </li>

                                <div class="form-group formControls formControls-Main">
                                    <div class="centered">
                                        <a class="btn btn-primary new" onclick="addSelection()">Add Section</a>
                                    </div>
                                </div>  
                            </ul>
                        </form>
                </div>
            </div>
            <div class="centered">
                    <button type="submit" class="btn btn-primary completeLecture">Complete</button>
            </div>
        </div>
    </div>
</div>
@endsection


@section('footer')
    <script type="text/javascript">
        CKEDITOR.replace('text[0]');
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
                selection +=        '<div class="form-group formControls addQuestion centered">';
                selection +=            '<a class="btn btn-primary new" onclick="addQuestion('+i+',this)">Add Question</a>';
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
                question +=     '<input type="text" class="full-width" name="question['+pid+']['+qi+']"/>';
                question +=     '<p>Answers:</p>';
                question +=     '<ul class="answers">';
                question +=     '</ul>';
                question +=     '<div class="form-group formControls centered">'
                question +=         '<a class="btn btn-primary new" onclick="addAnswer('+pid+','+qi+',this)">Add Answer</a>'
                question +=     '</div>'
                question += '</div>';
            
            jQuery(question).insertBefore(jQuery(".itteration-"+pid).find(".addQuestion"));
        }

        function addAnswer(pid,qid,me) {
            var ai = jQuery(me).parent().parent().children("ul.answers").children("li.answer").length;
            var answer = '<li class="answer">';
                answer +=   '<input class="full-width answer-'+ai+'" name="answer['+pid+']['+qid+']['+ai+']"></input>';
                answer +=   '<input type="checkbox" class="correct" name="correct['+pid+']['+qid+']['+ai+']" />';
                answer +=   '<label for="correct['+pid+']['+qid+']['+ai+']">Correct?</label>';
                answer +='</li>';
            jQuery(".question-"+qid).find(".answers").append(answer);
        }
    </script>
@endsection