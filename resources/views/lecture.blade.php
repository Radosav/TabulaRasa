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
                        <div class="lecture_part <?php if($i != 0) {echo "sakriveniDeo";} ?>" style="<?php if($i != 0) {echo "display:none;";}   ?>">
                            <p class="lecture_part_text"><?php echo $lecture->lecture_parts[$i]->text; ?></p>
                            <?php if($i != 0): ?>
                                <h4 class="title lecture_subtitle"><?php echo $lecture->lecture_parts[$i]->title ?></h4>
                            <?php  endif; ?>
                            <div class="questions">
                                <?php 
                                    $questions_count = count($lecture->lecture_parts[$i]->questions);
                                    for($q = 0; $q < $questions_count; $q++): ?>
                                        <h4 class="question"><?php echo $lecture->lecture_parts[$i]->questions[$q]->question; ?></h4>
                                        <?php $answer_count = count($lecture->lecture_parts[$i]->questions[$q]->answers); ?>
                                        <ul class="answers">
                                            <form>
                                                <?php for($a = 0; $a < $answer_count; $a++): ?>
                                                    <li>
                                                        <input type="radio" name="question-<?php echo $q; ?>">
                                                            <?php echo $lecture->lecture_parts[$i]->questions[$q]->answers[$a]->answer; ?>
                                                        </input>
                                                    </li>
                                                <?php endfor; ?>
                                            </form>
                                            <button class="Answer" onclick="NextPart()">Answer</button>
                                        </ul>
                                <?php endfor; ?>
                            </div>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
            <div class="center">
                <button class="endLecture">Lecture Finished</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')

<script type="text/javascript">
    function NextPart() {
        jQuery(".sakriveniDeo").first().fadeIn().removeClass('sakriveniDeo');
    }
</script>

@endsection