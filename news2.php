<?php
session_start();
include 'process/session.php';
include 'functions/newsfunctions.php';

$k1 = $_GET['k1'];
$k2 = $_GET['k2'];
$k3 = $_GET['k3'];
if (empty($k1)){
	header('location: news.php');
};

function get_browser_name($user_agent){
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
	elseif (strpos($user_agent, 'Android') !== false) return 'Android';
    elseif (strpos($user_agent, 'Mobile') !== false) return 'Mobile';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
    
return 'Other';
};

$dbh = connect_to_db();// function created in dbconnect.
if ($k1 == 'Cryptocurrency'){
	$news = fetchNews2($dbh);
} else {
	$news = fetchKyword2($dbh,$k1,$k2,$k3 );// Fetch news
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
	<meta name="author" content="T.L."/>
	<title>Decryptio News</title>
	<!-- Bootstrap CSS -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="bootstrap/css/basic-template.css" rel="stylesheet"/>
	<!-- HTML shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- [if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
<?php
	if (get_browser_name($_SERVER['HTTP_USER_AGENT']) == 'Chrome'){
        ?><link href="style/chrome.css" rel="stylesheet"/><?php
    } else {
        ?><link href="style/other.css" rel="stylesheet"/><?php
    }
?>
	<style type="text/css">
	    h1, h2 {
	font-family: Avant Garde, Tahoma;	
   -webkit-text-stroke: 1px black;
   
   text-shadow:
       3px 3px 0 #000,
     -1px -1px 0 #000,  
      1px -1px 0 #000,
      -1px 1px 0 #000,
       1px 1px 0 #000;
} 
	
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
<body style="background: black;background: linear-gradient(black,#23072c,black)">
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">
				<span style="color:gold;font-size:1.5em">Decryptio</span>
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
			    <li><a href="index.php" style="color:white"><span class="glyphicon glyphicon-home" ></span> Home</a></li>
				<li class="active"><a href="news.php" class="hidden-md hidden-sm" ><span class="glyphicon glyphicon-globe"></span> Crytpo News</a></li>
				<li><a href="cryptocurrency.php" style="color:white"><span class="glyphicon glyphicon-bitcoin" ></span> Crypto Prices</a></li>
				<li><a href="ico.php" class="" style="color:white"><span class="glyphicon glyphicon-globe" ></span> Ico Watch</a></li>
				<li><a href="userctrl.php" target='_blank' style="color:white"><span class="glyphicon glyphicon-user" ></span> User Page</a></li>
				<!--<li><a href="games.php" class="hidden-md hidden-sm" style="color:white"><span class="glyphicon glyphicon-fire" ></span> Learning Center</a></li>-->
		        <li class="dropdown hidden-md hidden-sm">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white">Contact<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#"><span class="glyphicon glyphicon-comment"></span> Decryptio@protonmail.com</a></li>	
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
<div><a href="news.php"><span class="glyphicon glyphicon-backward" style="color:gold;font-size:3em;margin: 1% 0% 0% 4%"></span></a></div>
<div class="container-fluid" style="margin-top:6px">
	
	<div class="row">
		<div class="col-lg-4 col-md-12 col-lg-push-4">
		    <div class="jumbotron" id="about" >
				<h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.2em">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[0]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[0]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[0]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[0]->news_short_description); ?></span>
			    </div>
		    </div>	
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-6 col-lg-pull-4" >
			<div class="jumbotron" >
			    <h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.2em">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[1]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[1]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[1]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[1]->news_short_description); ?></span>
			    </div>
		    </div>	
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="jumbotron" >
			    <h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div style="color:gold;font-size:1.2em;text-align:left">
				    <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[2]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[2]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[2]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[2]->news_short_description); ?></span>
			    </div>
		    </div>	    
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-12 col-lg-push-4">
		    <div class="jumbotron" id="about" >
				<h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.2em">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[3]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[3]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[3]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[3]->news_short_description); ?></span>
			    </div>
		    </div>	
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-6 col-lg-pull-4" >
			<div class="jumbotron" >
			    <h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.2em;text-align:left">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[4]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[4]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[4]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[4]->news_short_description); ?></span>
			    </div>
		    </div>	
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="jumbotron" >
			    <h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div style="color:gold;font-size:1.2em;text-align:left">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[5]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[5]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[5]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[5]->news_short_description); ?></span>
			    </div>
		    </div>	
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-12 col-lg-push-4">
		    <div class="jumbotron" id="about" >
				<h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.2em">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[6]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[6]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[6]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[6]->news_short_description); ?></span>
			    </div>
		    </div>	
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-6 col-lg-pull-4" >
			<div class="jumbotron" >
			    <h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.2em;text-align:left">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[7]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[7]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[7]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[7]->news_short_description); ?></span>
			    </div>
		    </div>	
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="jumbotron" >
			    <h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div style="color:gold;font-size:1.2em;text-align:left">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[8]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[8]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[8]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[8]->news_short_description); ?></span>
			    </div>
		    </div>	
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4 col-md-12 col-lg-push-4">
		    <div class="jumbotron" id="about" >
				<h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.2em">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[9]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[9]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[9]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[9]->news_short_description); ?></span>
			    </div>
		    </div>	
					</div>
				</div>
			</div>
		</div>
		
		<div class="col-lg-4 col-md-6 col-lg-pull-4" >
			<div class="jumbotron" >
			    <h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.2em;text-align:left">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[10]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[10]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[10]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[10]->news_short_description); ?></span>
			    </div>
		    </div>	
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-4 col-md-6">
			<div class="jumbotron" >
			    <h2 class="text-center" style="color:white;font-size:1.85em"><b></b></h2>
				<div style="color:gold;font-size:1.2em;text-align:left">
				        <div class="col-lg-12 col-md-12 col-xsm-1 col-lg-push-0" align="center">
		<div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
			<img style='width: 90%;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[11]->image_url; ?>'></img>			
		</div>
	</div>			
	
		
		    <div class="col-lg-12 col-md-12 col-lg-push-0" align="center">
		        <div class="container" style='margin: 0% 0% .5% 0%;padding: 1% 0% 0% 0%'>
					<a class="headline" style="color:gold;font-size:1.15em;margin: 0px 0px 0px 0px" href="<?= $news[11]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[11]->news_title); ?></a>			
			    </div>
		    			
	    </div>
	    
		    <div class="col-lg-12 col-md-12 col-lg-push-0" >
		        <div class="container" style='margin: 0% 0% 1.5% 0%;padding: 0% 0% 0% 0%'>
					<span class="headline" style="color:white;font-size:.95em;font-style: italic;margin: 0% 0% 0% 5%;padding: 0% 0% 0% 0%"><?= stripslashes($news[11]->news_short_description); ?></span>
			    </div>
		    </div>	
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
<footer class="page-footer font-small blue pt-4 mt-4" style="background-color:black;margin-top:17%;padding: 2% 0% 2% 0%">
    <!--Footer Links-->
    <div class="container-fluid text-center text-md-left " style="background-color:black">
        <div class="row">
            <!--First column-->
            <div class="col-md-6">
                <h5 class="text-uppercase" style="color:gold">Decryptio.org</h5>
                <ul class="list-unstyled">
				    <li style="color:white">
                        Email: Decryptio@protonmail.com
                    </li>
                    <li style="color:white">
                        Donate Bitcoin: 1Dpe4udqVy2AgyPHFbx56L6h9vmg64Vhjq
                    </li>
                </ul>
            </div>
            <!--/.First column-->
			
            <!--Second column-->
            <div class="col-md-6">
                <h5 class="text-uppercase" style="color:gold">Links</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="https://coinmarketcap.com" style="color:white" target="_blank">powered by Coinmarketcap.com</a>
                    </li>
                    <li>
                        <a href="https://cryptocompare.com" style="color:white" target="_blank">powered by Cryptocompare.com</a>
                    </li>
                </ul>
            </div>
            <!--/.Second column-->
        </div>
		<div class="footer-copyright py-3 text-center" style="color:white">
        © 2018 Copyright:
        <a href="" style="color:gold"> Decryptio.org </a>
    </div>
    </div>
</footer>

</html>