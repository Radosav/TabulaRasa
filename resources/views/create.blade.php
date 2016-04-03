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
                                    <input name="title[0][]" type="text" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'"  class="form-control title lecture_title"/>
                                </div>



                                <li class="form-group selectable">
                                    <textarea name="text[0][]" class="form-control lecture_part" placeholder="Text"></textarea>
                                </li>

                                <div class="form-group formControls">
                                    <a class="btn btn-primary" onclick="addSelection()">Add Section</a>
                                    <a class="btn btn-primary">Add Question</a>
                                    <a class="btn btn-primary">Add Answer</a>
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
        CKEDITOR.replace('text[0][]');
    </script>



    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery("#selectable").draggable({
              filter: "li"
            });
        });

        var i = 0;
        function addSelection(){
            i++;
            var selection = '<li class="form-group itteration-'+i+' selectable"><input name="title['+i+'][]" type="text" placeholder="Subtitle" onfocus="this.placeholder =\'\' " onblur="this.placeholder = \'Subtitle\'"  class="form-control title lecture_subtitle"/><textarea   name="text['+i+'][]" class="form-control lecture_part" placeholder="Text"/></li>'
            jQuery(selection).insertBefore(".formControls");
            CKEDITOR.replace('text['+i+'][]');
        }
    </script>
@endsection