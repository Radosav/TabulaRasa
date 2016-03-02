@extends('about.aboutLayout')
@section('content')
    <div class="content">
        <div class="title">
            {{$name}}
        </div>
        <div class="description">
            {{$desc}}
        </div>
    </div>
@stop
