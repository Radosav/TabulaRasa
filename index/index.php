<?php

$target_time = mktime(0,0,0,03,12,2016);

$current_time = time();

$difference = $target_time - $current_time;

$days = floor($difference / 86400);


?>

<!DOCTYPE html>
<html>
<head>
	<title>Under Construction</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Vollkorn:700,400' rel='stylesheet' type='text/css'>

    

	<script src="js/bootstrap.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
<!--
<section>
	<div class="container-fluid">
	<row>
		<div class="space"></div>
			<div class="col-sm-2 col-sm-offset-5">
				<p class="small-text">we can do it</p>
				<p class="medium-text">education is for life</p>
				<p class="medium-title-text">a fun new way to teach and learn</p>
			</div>
		<div class="hidden-xs hidden-sm col-sm-6  straight-line"></div>
		<div class="hidden-xs hidden-sm col-sm-6"></div>
		</div>
	</row>

</section>

<section>
	<div class="container-fluid">
	<row>
			<div class="hidden-xs hidden-sm col-md-12">
			
			<div class="col-sm-3 draw-line left-line">
				<h1 class="text-float-right text-large">Education</h1>

				<p class="text-float-right text-small-under">is not</p>

				<p class="text-float-right text-medium-under">PREPARATION</p>

				<p>education is</p>
				<h1>LIFE</h1>
			</div>
			
			<div class="col-sm-1 "><button type="button" class="btn btn-danger btn-circle btn-lg">T</button></div>
			
			<div class="col-sm-3 draw-line right-line">
			</row>
			</div>
			
				
			</div>
			</div>

			<div class="hidden-md hidden-lg col-sm-12">
				<h2 class="text-center">Design</h2>
				<div class="progress">
  					<div class="progress-bar progress-bar-danger progress-bar-striped active" role="progressbar" aria-valuenow="40"
  					aria-valuemin="0" aria-valuemax="100" style="width:40%">
    				40% Complete (design)
               		</div>
				</div>
				<h2 class="text-center">Code</h2>
				<div class="progress">
  					<div class="progress-bar progress-bar-info progress-bar-striped active" role="progressbar" aria-valuenow="10"
  					aria-valuemin="0" aria-valuemax="100" style="width:10%">
    				10% Complete (code)
               		</div>
				</div>
			</div>
	
	</row>

</section>
-->

<div class="container-fluid">
	
	<row>
	<div class="col-md-12">
		<img src="images/mainLogo.jpg" width="75%" class="top-margin img-responsive">
	</div>
	</row>
	<row>
		<div class="col-sm-2 col-sm-offset-3 col-md-4 information top-margin-text col-md-offset-2">
			<div class="col-sm-7">
			<img src="images/appTime.jpg" class="top-margin img-responsive"></img>
			</div>
			<div class="col-sm-1">
			<p class="countdown"><?php echo $days; ?></p>
			</div>
			
		</div>
		<div class="col-sm-3 col-sm-offset-1 col-md-4 information top-margin-text">
			<p class="information facebook">visit our facebook page for more information</p>
			<h5 class="information facebook team"> - MostWantedProgrammers</h5>
		</div>
	</row>
</div>
</body>
</html>