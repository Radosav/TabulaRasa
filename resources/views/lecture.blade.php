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
                                <p class="lecture_part_text"><?php echo $part->text; ?></p>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection