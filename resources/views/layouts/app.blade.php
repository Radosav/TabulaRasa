<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Tabula Rasa</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/css.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">

    <!-- Scripts -->



    <style>
    body{
        background-color:#fff;
        font-family: 'Lato';
        -webkit-transition: all 1s ease-in-out;
        -moz-transition: all 1s ease-in-out;
        -o-transition: all 1s ease-in-out;
        transition: all 1s ease-in-out;
    }
    a:hover{
        font-weight:bold;
        text-decoration:none;
    }
    ul{
        list-style-type:none;
        padding:0px;
    }
    input.input-question{
        margin-left:5px;
    }
    .full-width{
        width:100%;
        margin-right:10px; 
        margin-bottom:10px;
    }
    .full-width-answer{
        width:85%;
        margin-right:10px; 
        margin-bottom:10px;
    }
    input[type='checkbox']{
        width: auto;
        margin-right: 10px;
    }

    .fa-btn {
        margin-right: 6px;
    }


    .title {
        text-align: center;
        border: none;
        box-shadow: none;
        height: auto;
    }

    .lecture_title {
        font-size: 26px;
    }

    .lecture_subtitle {
        text-align: left;
        font-size: 20px;
        padding:10px;
    }

    .lecture_part {
        resize: vertical;
    }

    .navbar-default li{
        color:#fff;
    }

    .navbar-default{
        background-color:#2F3E7B;
    }

    .navbar-default .navbar-brand{
        color:#fff;
        -webkit-transition:color 0.5s ease-in-out;
        -webkit-transition:background-color 0.5s ease-in-out;
    }
    .navbar-default .navbar-brand:hover{
        color:#2F3E7B;
        background-color:#fff;
        -webkit-transition:color 0.5s ease-in-out;
        -webkit-transition:background-color 0.5s ease-in-out;
    }

    .navbar-default .navbar-nav>li>a{
        color:#fff;
    }

    .navbar-default .navbar-toggle .icon-bar{
        background-color:#fff;
    }

    .navbar-default .navbar-nav>li>a:focus, 
    .navbar-default .navbar-nav>li>a:hover{
        color:#fff;
    }

    .panel-default>.panel-heading{
        border-color:#2F3E7B;
        background-color:#2F3E7B;
    }

    .panel-default h4{
        color:#2F3E7B;
    }

    .panel-default>.panel-heading{
        color:#fff;
    }

    label.col-md-4.control-label{
        color:#7F95A9;
        color:#2F3E7B;
    }

    .btn-primary{
        background-color:#2F3E7B;
        border-color:#fff;
        -webkit-transition:background-color 0.5s ease-in-out;
    }

    .btn-primary:hover{
        background-color:#fff;
        border-color:#2F3E7B;
        color:#2F3E7B;
    }


    .answer{
        margin:auto;
    }

    li .answer{
        margin-bottom:10px;
    }

    .form-control:focus{
        border-color:#2F3E7B;
        box-shadow: inset 0 1px 1px rgba(169, 197, 211,0.6);
    }

    .question {
        padding: 10px;
        border: 1px solid #C9C9C9;
        margin: 10px 0;
        background-color:#fbfbfb;
    }
    .answers {
        list-style: none;
        margin: 0px;
    }

    ul.answers li {
        display: block;
        width: 100%;
        box-shadow: inset 0 -2px 1px rgba(47,62,123,0.1);
        padding-bottom:5px;
        padding-left: 10px;
        padding-top:5px;
    }

    ul.answers li input[type="radio"] {
        width: auto;
        margin-right: 10px;
    }
    .list-group-item{
        color:#2F3E7B;
    }
    .list-group-item:hover{font-weight:bold; text-decoration:none;}
    body {
        font-family: 'Lato';
    }

    .fa-btn {
        margin-right: 6px;
    }


    .title {
        text-align: center;
        border: none;
        box-shadow: none;
        height: auto;
    }

    .lecture_title {
        font-size: 26px;
    }

    .lecture_subtitle {
        text-align: left;
        font-size: 20px;
    }            

    .lecture_part {
        resize: vertical;
        margin: 30px 0;
        padding-bottom: 30px;
        border-bottom: 1px solid #eee;
    }
    .margin-fix { 
        margin-left:10px;
        margin-bottom:10px;
        float:left;
    }
    .new{
        padding-top: 12px;
        padding-bottom:12px;
        width:50%;
        margin:10px;
    }

    h4.dashboard {
        color: #fff;
    }
    .question-container{
        padding:10px;
        border:1px solid #eee;
        margin-bottom:20px;
    }
    form{
        overflow:hidden;
    }

    .sakriveniDeo {
        display: none;
    }

    button.btn.btn-primary.endLecture {
        margin-bottom: 20px;
        width: 100%;
        height: 100px;
        font-size: 3em;
        font-weight: 200;
    }
    button.btn.btn-primary.completeLecture:focus{
        background-color:#2F3E7B;
        color:#fff;
    }

    button.btn.btn-primary.completeLecture:focus:hover{
        background-color:#fff;
        color:#2F3E7B;
    }        
    button.btn.btn-primary.endLecture:focus{
        background-color:#2F3E7B;
        color:#fff;
    }

    button.btn.btn-primary.endLecture:focus:hover{
        background-color:#fff;
        color:#2F3E7B;
    }

    button.btn.btn-primary.Answer.text-center {
        margin: 20px 0 10px;
        width: 50%;
        height: 50px;

    }

    button.btn.btn-primary.Answer:focus{
        background-color:#2F3E7B;
        color:#fff;
    }
    button.btn.btn-primary.Answer:focus:hover{
        background-color:#fff;
        color:#2F3E7B;
    }
    .btn:focus{
        outline:none;
    }
    .centered{
        text-align:center;
    }
    .answered-correct{
        background-color: rgba(89, 249, 89, 0.4);
        -webkit-transition:background-color 0.3s ease-in-out;
    }

    .answered-incorrect{
        background-color: rgba(249, 89 , 89, 0.4);
        -webkit-transition:background-color 0.3s ease-in-out;
    }            
    button.btn.btn-primary.completeLecture {
        margin-bottom: 20px;
        width: 100%;
        height: 100px;
        font-size: 3em;
        font-weight: 200;
    } 

</style>

@yield('header')
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Tabula Rasa
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- <li><a href="{{ url('/') }}">Home</a></li> -->
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Login</a></li>
                    <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
    <script src="//cdn.ckeditor.com/4.5.8/full-all/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    @yield('footer')
</body>
</html>
