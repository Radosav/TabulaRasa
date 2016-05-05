@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default col-md-12">
                <div class="panel-body">
                    <h2 class="title lecture_title">{{$lecture->title}}</h2>
                    <?php $count = count($lecture->lecture_parts); ?>
                    <?php for ($i=0; $i < $count; $i++): ?>
                        <div class="lecture_part <?php if($i != 0) {echo "sakriveniDeo";} ?>"> 
                            <?php if($i != 0): ?>
                                <h4 class="title lecture_subtitle"><?php echo $lecture->lecture_parts[$i]->title ?></h4>
                            <?php  endif; ?>
                            <p class="lecture_part_text"><?php echo $lecture->lecture_parts[$i]->text; ?></p>
                            <div class="questions">
                                <?php 
                                    $questions_count = count($lecture->lecture_parts[$i]->questions);
                                    for($q = 0; $q < $questions_count; $q++): ?>
                                        <div class="question-container <?php if($q != 0) {echo "sakriveniDeo";} ?>">
                                            <h4 class="question"><?php echo $lecture->lecture_parts[$i]->questions[$q]->question; ?></h4>
                                            <?php $answer_count = count($lecture->lecture_parts[$i]->questions[$q]->answers); ?>
                                            <ul class="answers">
                                                <form>
                                                    <?php for($a = 0; $a < $answer_count; $a++): ?>
                                                        <li class="margin-fix">
                                                            <input type="<?php if($lecture->lecture_parts[$i]->questions[$q]->isMultiple){ echo 'checkbox';} else { echo 'radio'; }?>" class="<?php if($lecture->lecture_parts[$i]->questions[$q]->answers[$a]->right) echo "correct"; ?> answer" name="<?php echo "question-" . $q ?>"></input>
                                                            <?php echo $lecture->lecture_parts[$i]->questions[$q]->answers[$a]->answer; ?>
                                                        </li>
                                                    <?php endfor; ?>
                                                </form>
                                                <div class="centered">
                                                    <button class="btn btn-primary answer-button text-center" onclick="NextPart()">Answer</button>
                                                </div>
                                            </ul>
                                        </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="center">
                <button class="btn btn-primary endLecture sakriveniDeo" onclick="window.location.href='/'">Lecture Finished</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

<script type="text/javascript">
    function NextPart() {

        var next = true;
        jQuery(".question-container:not(.sakriveniDeo):visible").last().find(".answer").each(function (index, value) {
            if($(this).hasClass("correct")){
                if(!$(this).is(":checked")){
                    next = false;
                    return false;
                } 
            }
            if(!$(this).hasClass("correct")){
                if($(this).is(":checked")){
                    next = false;
                    return false;
                } 
            }
        });

        if(next){
            jQuery(".answer-button:visible").prop('disabled', true);
            jQuery(".question-container:not(.sakriveniDeo):visible").last().find(".answers").removeClass("answered-incorrect");
            jQuery(".question-container:not(.sakriveniDeo):visible").last().find(".answers").addClass("answered-correct");
            jQuery(".sakriveniDeo").first().fadeIn(1000).removeClass('sakriveniDeo');
        } else {
            jQuery(".question-container:not(.sakriveniDeo):visible").last().find(".answers").addClass("answered-incorrect");
        }
    }
</script>

@endsection