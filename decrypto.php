<?php
session_start();
include 'process/session.php';	

?>

<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8"/>
	<!-- make sure latest IE is used -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="Cryptocurrency, Cryptocurrency news, Cryptocurrency research, Cryptocurrency blog, Crypto, news, research, games"/>
	<meta name="author" content="T.L."/>
	<title>Decrypto</title>
	<!-- Bootstrap CSS -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="bootstrap/css/basic-template.css" rel="stylesheet"/>
	<!-- HTML shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- [if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<style type="text/css">
		
	    .slide1{	    
			height: 200px;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		
		.slide2{
			height: 200px;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		
		.slide3{
			height: 200px;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		
		.carousel-caption {
			
		    margin: 0 auto;
			
			text-align:center;
			width: auto;
			height: auto;
		}
		
		.carousel-inner img {
			
            margin: 0 auto;
			text-align:center;
			
			width: auto;
			height: auto;
        } 
		
	</style>
</head>
<body style="background: black;background: linear-gradient(black 14%, #450f57, #23072c, black)">
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">
				<span style="color:gold;font-size:1.6em">Decrypto</span>
			</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-container">
				<span class="sr-only">Show and Hide Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>			
		</div>
		<div class="collapse navbar-collapse" id="navbar-container">
			<ul class="nav navbar-nav">
			    <li class="active"><a href="#" class="hidden-md hidden-sm"><span class="glyphicon glyphicon-home"></span> Home</a></li>
				<li><a href="news.php" style="color:white"><span class="glyphicon glyphicon-globe" ></span> Crypto News</a></li>
				<li><a href="cryptocurrency.php" style="color:white"><span class="glyphicon glyphicon-bitcoin" ></span> Crypto Prices</a></li>
				<li><a href="ico.php" class="" style="color:white"><span class="glyphicon glyphicon-flash" ></span> Ico Watch</a></li>
				<li><a href="userctrl.php" target='_blank' style="color:white"><span class="glyphicon glyphicon-user" ></span> User Page</a></li>
				<!--<li><a href="games.php" class="hidden-md hidden-sm" style="color:white"><span class="glyphicon glyphicon-fire" ></span> Learning Center</a></li>-->
		        <li class="dropdown hidden-md hidden-sm">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white">Contact<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#"><span class="glyphicon glyphicon-comment"></span> LongLifeMicro@gmail.com</a></li>	
					</ul>
				</li>
			</ul>
			<form class="navbar-form navbar-right" role="form">
				<span style="font-size:1.1em;color:white">Welcome </span><span style="font-size:1.1em;padding-right:1px;color:gold"><b>(<?php echo $user; ?>) </b></span>
			<?php 
				if ($user == 'Guest'){
			?>
				<a href="login.php" class="btn btn-success btn-sm" role="button">Login</a>
				<a href="register.php" class="btn btn-primary btn-sm" role="button">Register</a>
			<?php } else { ?>
				<a href="process/logout.php" class="btn btn-primary btn-sm" role="button">Logout</a>	
			<?php } ?>
			</form>
		</div>
	</div>        
</nav>

<div id="theCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
	
	<div class="carousel-inner">
		<div class="item active">
			<div class="slide1"></div>
			<div class="carousel-caption " style="" >
				<script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" style="color:white" data-currencyid="1027" data-base="USD" data-secondary="BTC" data-ticker="true" data-rank="false" data-marketcap="false" data-volume="false" data-stats="USD" data-statsticker="true"></div>
				
			</div>
		</div>
		<div class="item">
			<div class="slide2"></div>
			<div class="carousel-caption">
				<script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" style="color:white" data-currencyid="1" data-base="USD" data-secondary="BTC" data-ticker="true" data-rank="false" data-marketcap="false" data-volume="false" data-stats="USD" data-statsticker="true"></div>
			</div>
		</div>
		<div class="item">
			<div class="slide3"></div>
			<div class="carousel-caption">
				<script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" style="color:white" data-currencyid="1376" data-base="USD" data-secondary="BTC" data-ticker="true" data-rank="false" data-marketcap="false" data-volume="false" data-stats="USD" data-statsticker="true"></div>
			</div>
		</div>
	</div>		
</div>

<div class="container-fluid" style="margin-top:0px">
	
	<div class="row">
		<div class="col-lg-6 col-md-12 col-lg-push-3">
		    <div class="jumbotron" style="background: black">
				<h2 class="text-center" style="color:white;font-size:1.4em"><a href = "news.php" style="color:white;font-size:1.4em"><b>Latest Cryptocurrency News</b></a></h2>
				
				    <div style="color:gold;font-size:1.2em;margin: 0px 0px 0px 0px">
				        <?php include 'includes/headlines.php'; ?>
					</div>
				
			</div>
		</div>		
		<div class="col-lg-3 col-md-6 col-lg-pull-6" >
			<div class="jumbotron" style="background: black">
				<h2 class="text-center" style="color:white;font-size:1.4em"><a href = "cryptocurrency.php" style="color:white;font-size:1.4em"><b>Top 20 Cryptocurrencies</b></a></h2>
				<div id="headlines">
				    <div style="font-size:1.3em;text-align:left">
				        <?php include 'includes/cryptolistfrnt.php'; ?>
					</div>
				</div>
			</div>
		</div>	
		<div class="col-lg-3 col-md-6">
			<div class="jumbotron" style="background: black">
			    <h2 class="text-center" style="color:white;font-size:1.4em"><a href = "ico.php" style="color:white;font-size:1.4em"><b>Live Icos</b></a></h2>
				<div style="color:gold;font-size:1.2em;text-align:left">
				        <?php include 'includes/liveicofrnt.php'; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Bootstrap jacascript and jQuery should be loaded
         placed at the end of the document for faster load times -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script> 
</body>
<a href = "process/news_update.php" style="color:white;font-size:1.5em;margin: 0px 30px 0px 0px"><b>update news</b></a><a href = "process/cryptodata.php" style="color:white;font-size:1.5em"><b>update crypto</b></a>
</html>