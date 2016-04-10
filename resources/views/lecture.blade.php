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
                        <?php if($i != 0): ?>
                            <h4 class="title lecture_subtitle"><?php echo $lecture->title ?></h4>
                        <?php  endif; ?>
                        <div class="lecture_part">
                            <p class="lecture_part_text"><?php echo $lecture->lecture_parts[$i]->text; ?></p>
                        </div>

                        <div class="questions">
                            <?php 
                                $questions_count = count($lecture->lecture_parts[$i]->questions);
                                for($q = 0; $q < $questions_count; $q++): ?>
                                    <h4 class="question"><?php echo $lecture->lecture_parts[$i]->questions[$q]->question; ?></h4>
                                    <?php $answer_count = count($lecture->lecture_parts[$i]->questions[$q]->answers); ?>
                                    <ul class="answers">
                                        <form>
                                            <?php for($a = 0; $a < $answer_count; $a++): ?>
                                                <li><input type="radio" name="question-<?php echo $q; ?>"><?php echo $lecture->lecture_parts[$i]->questions[$q]->answers[$a]->answer; ?></input></li>
                                            <?php endfor; ?>
                                        </form>
                                        </ul>
                            <?php endfor; ?>
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection