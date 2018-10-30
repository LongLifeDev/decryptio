<?php
session_start();
require'config/config.php';	
if( isset($_SESSION['user_id']) ){
	
	$records = connect_to_auth()->prepare('SELECT id, email, username FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	
	$user = NULL;
	
	if (count($results) > 0){
		$user = $results['username'];
	}
	
} else {
	$user = 'Guest';
	date_default_timezone_set('America/Los_Angeles');
$time = date('l jS \of F Y h:i:s A');
$cip = $_SERVER['HTTP_CLIENT_IP'];
$cff = $_SERVER['HTTP_X_FORWARDED_FOR'];
$cxf = $_SERVER['HTTP_X_FORWARDED'];
$cra = $_SERVER['REMOTE_ADDR'];
$log = $time.' remote addr: '.$cra.' x forward for: '.$cff.' x forwarded: '.$cxf.' client ip: '.$cip."\n";
file_put_contents('user/userpagedec.txt', $log, FILE_APPEND | LOCK_EX);
		mail("longlifemicro@gmail.com","userpagedec",$log, "From: decrypto@host.com" );
		
  };
  

if ($user != 'Guest'){
	header('location: userpage.php');
};


?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8"/>
	<!-- make sure latest IE is used -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="Cryptocurrency, Cryptocurrency news, Cryptocurrency research, Cryptocurrency blog, Crypto, news, research, games"/>
	<meta name="author" content="T.Lindsey"/>
	<title>Please sign in</title>
	<!-- Bootstrap CSS -->
	<link href="/../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="/../bootstrap/css/basic-template.css" rel="stylesheet"/>
	<!-- HTML shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- [if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
		
	</style>
</head>
<body style="background: black">
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="">
				<span style="color:gold;font-size:1.5em">Decrypto</span>
			</a>	
		</div>
		<div class="collapse navbar-collapse" id="navbar-container">
			<ul class="nav navbar-nav">
			    <li class="active"><a href=""><span class="glyphicon glyphicon-flag"></span>      Please sign in</a></li>	
			</ul>	
		</div>
	</div>        
</nav><br /><br />
<div class="container-fluid" style="margin-top:1px">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-lg-push-3">
		    <div class="jumbotron text-center" style="background: black">
				<h2 class="text-center" style="color:white;font-size:2.5em"><b>Please sign in to use this area</b></h2><br />	
                 <span class="text-center" style="font-size:2em">close tab to return to home page</span>		
			</div>
		</div>	
	</div>
</div>
</body>
</html>