<?php
session_start();
include 'process/session.php';	
function get_browser_name($user_agent){
    if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
    elseif (strpos($user_agent, 'Android') !== false) return 'Android';
    elseif (strpos($user_agent, 'Mobile') !== false) return 'Mobile';
    elseif (strpos($user_agent, 'Edge')) return 'Edge';
    elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
    elseif (strpos($user_agent, 'Safari')) return 'Safari';
    elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
    elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
    
    return 'Other';};
//$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
//if(stripos($ua,'mobile') !== false) { // && stripos($ua,'mobile') !== false) {
    //echo "your on mobile! ";
//};
//if(stripos($ua,'android') !== false) { 
    //echo "your on an android!";
//};
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
	<title>Decryptio</title>
	<!-- Bootstrap CSS -->
	<link rel="canonical" href="https://decryptio.org/index.php" />
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="bootstrap/css/basic-template.css" rel="stylesheet"/>
	<!-- HTML shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- [if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="shortcut icon" href="favicon.ico" />
<?php
	if (get_browser_name($_SERVER['HTTP_USER_AGENT']) == 'Chrome'){
         ?><link href="style/chrome.css" rel="stylesheet"/><?php
        } else if (get_browser_name($_SERVER['HTTP_USER_AGENT']) == 'Android'){
         ?><link href="style/android.css" rel="stylesheet"/><?php
        } else {
         ?><link href="style/other.css" rel="stylesheet"/><?php
        }
?>
	<style type="text/css">

		h1, h2, #andcar {
        -webkit-text-stroke: 1px black; 
        text-shadow:
        3px 3px 0 #000,
       -1px -1px 0 #000,  
        1px -1px 0 #000,
        -1px 1px 0 #000,
        1px 1px 0 #000;
        }
		
	    .slide1 {	    
			height: 16em;
			width: fill;
			background-image: url('user/freebitcoindark.jpg');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		
		.slide2 {
			height: 16em;
			width: fill;
			background-image: url('user/freebitcoingold.jpg');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		
		.slide3 {
			height: 16em;
			width: fill;
			background-image: url('user/freebitcoinfire.jpg');
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		
		.carousel-inner > .item > img, .carousel-inner > .item > a > img {
			width: 100%;
        }
		
		.slide4{	    
			height: 170px;	
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		
		.slide5{
			height: 170px;
			background-repeat: no-repeat;
			background-position: center;
			background-size: cover;
		}
		
		.slide6{
			height: 170px;
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
<script>
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
	
</head>
<body style="background: linear-gradient(black 13%,#23072c,black);font-family: Avant Garde, Tahoma;">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	    <div class="container">
		   <div class="navbar-header">
			    <a class="navbar-brand" href="index.php">
				    <span style="color:gold;font-size:1.6em">Decryptio</span>
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
				    <li><a href="store.php" class="hidden-md hidden-sm" style="color:white"><span class="glyphicon glyphicon-fire" ></span> Store</a></li>
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
<?php
    if (get_browser_name($_SERVER['HTTP_USER_AGENT']) == 'Android' || get_browser_name($_SERVER['HTTP_USER_AGENT']) == 'Mobile'){ ?> 
    <div id="andcar" style="position: relative;text-align: center;font-size:2.8em;font-weight:bold; font-family: 'Avant Garde', Tahoma;color: gold"><img src="user/freebitcoindark.jpg" height="5%" width="100%" ></img><div style="position: absolute;top: 50%;left: 50%;transform: translate(-50%, -50%)">Decryptio.org</div></div><?php
    } else { ?>
    <div id="theCarousel" class="carousel slide" data-ride="carousel" data-interval="10000">
	    <div class="carousel-inner">
		    <div class="item active">
			    <div class="slide1"></div>
			    <div class="carousel-caption " style="margin-top:50%" align="center" >
				    <h1 style="font-size:3.6em;font-weight:bold; font-family: 'Avant Garde', Tahoma;color:gold">Decryptio.org!</h1><h1 style="font-size:2.2em; font-family: 'Avant Garde', Tahoma;color:white"><b><i>A cryptocurrency and blockchain information source.</i></b></h1>
			    </div>
		    </div>
		    <div class="item">
			    <div class="slide2"></div>
			    <div class="carousel-caption" style="" align="center">
				    <h1 style="font-size:2em; font-family: 'Avant Garde', Tahoma;color:white"><b><i><a class="headline" style="color:gold" href="register.php">Sign up</a> for a free user account to get a personal watchlist, customizable news feed and more! </i></b></h1>
			    </div>
		    </div>
		    <div class="item">
			    <div class="slide3"></div>
			    <div class="carousel-caption" style="" align="center" >
				    <h1 style="font-size:2em; font-family: 'Avant Garde', Tahoma;color:white"><b><i>This site is still under development. Feel free to enjoy while we get more features and exciting apps built and deployed. Thanks for visiting! </i></b></h1>
			    </div>
		    </div>
	    </div>		
    </div><?php }; ?>
<br /><form align="center">
<div style="color:white">Search for Coins</div>
<input type="text" size="20" onkeyup="showResult(this.value)">
<br /><span id="livesearch" style="color:white" ></span>
</form>
    <div class="container-fluid" style="margin-top:0px">
	    <div class="row">
		    <div class="col-lg-6 col-md-12 col-lg-push-3">
		        <div class="jumbotron" >
				    <h2 class="text-center" style="color:white;font-size:1.4em"><a href = "news.php" style="color:white;font-size:1.4em">Latest Cryptocurrency News</a></h2>
				    <div style="color:gold;font-size:1.2em;margin: 0px 0px 0px 0px">
				        <?php include 'includes/headlines.php'; ?>
					</div>
			    </div>
		    </div>		
		    <div class="col-lg-3 col-md-6 col-lg-pull-6" >
			    <div class="jumbotron" style='margin-top:0%;padding-left: 5%;padding-right: 0%' >
				    <h2 class="text-center" style="color:white;font-size:1.4em"><a href = "cryptocurrency.php" style="color:white;font-size:1.4em">Top 20 Cryptocurrencies</a></h2>
				    <div id="headlines" >
				        <div style="font-size:1.36em;text-align:left" >
				            <?php include 'includes/cryptolistfrnt.php'; ?>
					    </div>
				    </div>
			    </div>
		    </div>	
		    <div class="col-lg-3 col-md-6">
		        <div class="jumbotron">
			        <h2 class="text-center" style="color:white;font-size:1.4em"><a href = "ico.php" style="color:white;font-size:1.4em">Live Icos</a></h2>
				    <div style="color:gold;font-size:1.2em;text-align:left">
				        <?php include 'includes/liveicofrnt.php'; ?>
				    </div>
			    </div>
	        </div>
			
        </div>
    </div>
<?php
if (get_browser_name($_SERVER['HTTP_USER_AGENT']) == 'Android' || get_browser_name($_SERVER['HTTP_USER_AGENT']) == 'Mobile'){ 
} else { ?>
    <div id="theCarousel" class="carousel slide"  data-ride="carousel" data-interval="6000">
	    <div class="carousel-inner" align="left">
		    <div class="item active">
			    <div class="slide4"></div>
			    <div class="carousel-caption " style="width:30%" align="center" >
				    <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" style="color:white" data-currencyid="1027" data-base="USD" data-secondary="BTC" data-ticker="true" data-rank="false" data-marketcap="false" data-volume="false" data-stats="USD" data-statsticker="true"></div>	
			    </div>
		    </div>
		    <div class="item">
			    <div class="slide5"></div>
			    <div class="carousel-caption" style="width:30%" align="left">
				    <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" style="color:white" data-currencyid="1" data-base="USD" data-secondary="BTC" data-ticker="true" data-rank="false" data-marketcap="false" data-volume="false" data-stats="USD" data-statsticker="true"></div>
			    </div>
		    </div>
		    <div class="item">
			    <div class="slide6"></div>
			    <div class="carousel-caption" style="width:30%" align="left" >
				    <script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" style="color:white" data-currencyid="1376" data-base="USD" data-secondary="BTC" data-ticker="true" data-rank="false" data-marketcap="false" data-volume="false" data-stats="USD" data-statsticker="true"></div>
			    </div>
		    </div>
	    </div>		
    </div><?php }; ?>

<a href = "process/getnews.php" style="color:white;font-size:1.5em;margin: 0px 30px 0px 0px"><b>update news</b></a><a href = "process/cryptodata.php" style="color:white;font-size:1.5em"><b>update crypto</b></a>
<a href = "process/liveicodata.php" style="color:white;font-size:1.5em"><b>update live</b></a><a href = "process/futicodata.php" style="color:white;font-size:1.5em;margin: 0px 30px 0px 0px"><b>update future</b></a><a href = "process/finicodata.php" style="color:white;font-size:1.5em;margin: 0px 30px 0px 0px"><b>update finished</b></a>

    <!-- Bootstrap jacascript and jQuery should be loaded
    placed at the end of the document for faster load times -->
    <script src="bootstrap/js/jquery.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
	
</body>

<footer class="page-footer font-small blue pt-4 mt-4" style="background-color:black;margin-top:10%;padding: 2% 0% 2% 0%">
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
            © 2018 Copyright: <a href="" style="color:gold"> Decryptio.org </a>
        </div>
    </div>
</footer>

</html>
