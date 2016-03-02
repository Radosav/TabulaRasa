@extends('about.aboutLayout')
@section('content')
    <div class="content">
        <div class="title">
            @foreach($people as $title => $name)
                <div class="title">{{$title}}</div>

                @foreach($name as $person)
                    <p class="description">{{$person}}</p>
                @endforeach
            @endforeach
        </div>
    </div>
@stop

