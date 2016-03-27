@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default col-md-12">
                <div class="panel-body">

                    <h2 class="title lecture_title">{{$lecture->title}}</h2>


                    @foreach($lecture->lecture_parts as $part)
                        <h4 class="title lecture_subtitle">{{$part->title}}</h4>
                            <div class="lecture_part">
                                <p class="lecture_part_text">{{$part->text}}</p>
                            </div>
                    @endforeach

                        <!-- /* <form method="POST" class="main-form" action="/lectures/store">
                            <input type="hidden" name="uid" value="">
                            <div class="form-group">
                                <input name="title[0][]" type="text" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'"  class="form-control title lecture_title"/>
                            </div>



                            <div class="form-group first-goup">
                                <input type="checkbox" id="1" class="hidden selectionCheckBox" checked>
                                <textarea name="text[0][]" class="form-control lecture_part" placeholder="Text"></textarea>
                            </div>

                            <div class="form-group formControls">
                                <a class="btn btn-primary" onclick="addSelection()">Add Section</a>
                                <a class="btn btn-primary">Add Question</a>
                                <a class="btn btn-primary">Add Answer</a>
                                <button type="submit" class="btn btn-primary pull-right">Complete</button>
                            </div>  
                        </form> */ -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection