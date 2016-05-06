<?php 
    $user = Auth::user();
?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default col-md-12">
                <div class="panel-heading row">
                    <div class="col-md-10">
                        <h4 class="dashboard">Dashboard</h4>
                    </div>
                    
                    <div class="col-md-2">
                        <a href="<?php echo '/create' ?>" class="btn btn-primary pull-right">Create!</a>
                    </div>

                </div>

                <div class="panel-body">


                        @if($user->lectures->isEmpty())
                            {{'You have not created any lectures yet!'}}
                        
                        @else
                            <ul class="list-group">
                                @foreach($user->lectures->reverse() as $lecture)
                                        <li id="lecture-<?php echo $lecture->id; ?>" class="list-group-item">
                                            <a  href="lecture/<?php echo $lecture->id ?>">{{$lecture->title}}</a>
                                            <a class="pull-right" onclick="deleteLecture({{$lecture->id}})">X</a>
                                            <a class="pull-right editLink" onclick="editLecture({{$lecture->id}})">Edit</a>
                                        </li>
                                @endforeach
                            </ul>
                        @endif


                	<br/>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script type="text/javascript">
        function deleteLecture(lid){
            jQuery.ajax({
                type:"POST",
                url:"/lecture/" + lid + "/delete",
                data: {id: lid},
                success: function(){
                    jQuery('#lecture-' + lid).remove();
                }
            })
        }

        function editLecture(lid){
            window.location = "/lecture/" + lid + "/edit";
        }
    </script>
@endsection