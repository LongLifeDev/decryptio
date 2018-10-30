<?php
session_start();
require '../config/config.php';
require '../functions/newsfunctions.php';
function get_browser_name($user_agent)
{
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
$dbh = connect_to_db();

$kwrd = filter_var($_GET['keyword'], FILTER_SANITIZE_STRING);
$kwr = filter_var($_GET['keywrd'], FILTER_SANITIZE_STRING);
$ja = filter_var($_GET['jsn'], FILTER_SANITIZE_STRING);
if (empty($kwrd)){
	header('location: ../ico.php');
};
if ($kwrd == 'One 1'){
	$kwrd='One+1';
}	
$i=0;	
$json = file_get_contents('../process/'.$ja.'icodata.json');
$data = json_decode($json, TRUE); //decodes in associative array
$ar = $data['ico'];
while (!empty($ar[$ja][$i])){
if ($ar[$ja][$i]['name'] == $kwrd){
$name = $ar[$ja][$i]['name'];

$image = $ar[$ja][$i]['image'];
$description = $ar[$ja][$i]['description'];
$website_link = $ar[$ja][$i]['website_link'];
$icowatchlist_url = $ar[$ja][$i]['icowatchlist_url'];
$start_time = $ar[$ja][$i]['start_time'];
$end_time = $ar[$ja][$i]['end_time'];
$timezone = $ar[$ja][$i]['timezone'];	
}
$i=$i+1;
}						
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
	<title><?= $name ?> Information</title>
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
			<a class="navbar-brand" href="../index.php">
				<span style="color:gold;font-size:1.5em">Decryptio</span>
			</a>	
		</div>
		<div class="collapse navbar-collapse" id="navbar-container">
			<ul class="nav navbar-nav">
			    <li class="active"><a href="#"><span class="glyphicon glyphicon-flag"></span>     <?= $name ?> i.c.o.</a></li>	
			</ul>	
		</div>
	</div>        
</nav>
<div class="container-fluid" style="margin-top:1px">
	<div class="row">
	    <div class="col-lg-4 col-md-6 col-lg-push-4">
			<div class="jumbotron" style="background: black">
				<h2 class="text-center" style="color:white;font-size:1.6em"><b><?= $name ?> Links</b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.3em;text-align:left">
				        <?php
						    echo "Website link : </br><a href='".$website_link."' target='_blank' style='color:white'><span class='glyphicon glyphicon-hand-right' style='color:gold;font-size:.8em'> </span> ".$website_link."</span></a></br>";
	                        echo "Ico watchlist : </br><a href='".$icowatchlist_url."' target='_blank' style='color:white'><span class='glyphicon glyphicon-hand-right' style='color:gold;font-size:.8em'> </span> ".$icowatchlist_url."</span></a></br>";
						?>
					</div>
				</div><br />
			</div>
		</div>
		<div class="col-lg-4 col-md-6 col-lg-pull-4" >
			<div class="jumbotron" style="background: black">	
				<div id="headlines">
				    <div style="color:gold;font-size:1.4em;text-align:left">
				        <?php 
						    echo "<img style='background-color:white' src = '".$image."'></img><br />";
                            echo "Name : <span style='color:white'>".$name."</span> </br>";
	                        echo "description: <span style='color:white'>".$description." </span></br>";
	                        echo "start_time : <span style='color:white'> ".$start_time."</span></br>";
	                        echo "end_time : <span style='color:white'>".$end_time." </span></br>";
	                        echo "timezone : <span style='color:white'> ".$timezone."</span></br>";      
						?>
					</div>
				</div><br />
			</div>
		</div>
		<div class="col-lg-4 col-md-6 ">
		    <div class="jumbotron" style="background: black">
				<h2 class="text-center" style="color:white;font-size:1.6em"><b><?= $name ?> news</b></h2>
				<div id="headlines">
				    <div style="color:gold;font-size:1.5em">
				        <?php
						  $news = fetchKyword($dbh, $kwrd, $kwr, $kwr);
                         if ( $news && !empty($news) ) {
                         foreach ($news as $key => $article) {			
                         echo '<a class="headline" style="color:white;font-size:1em;margin: 0px 0px 0px 0px" href="'.$article->web_link.'" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> '.stripslashes($article->news_title).'</a><br />';
                        }
                        } 		                
                        ?>
					</div>
				</div><br />
			</div>
		</div>
	</div>
</div>
</body>
<?php
	if (get_browser_name($_SERVER['HTTP_USER_AGENT']) == 'Android' || get_browser_name($_SERVER['HTTP_USER_AGENT']) == 'Mobile'){
         ?><footer class="page-footer font-small blue pt-4 mt-4 navbar navbar-fixed-bottom" style="background-color:black;margin-top:10%;padding: .5% 0% .5% 0%">
    <!--Footer Links-->
    <div class="container-fluid text-center text-md-left " style="background-color:black">
        <div class="row">
            <!--First column-->
            <div class="col-md-6">
                <ul class="list-unstyled">
				    <li style="color:white">
                        Email: Decryptio@protonmail.com
                    </li>
                </ul>
            </div>
            <!--/.First column-->
			
            <!--Second column-->
            <div class="col-md-6">
                <ul class="list-unstyled">
                    <li style="color:white">
                        Donate Btc: 1Dpe4udqVy2AgyPHFbx56L6h9vmg64Vhjq
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
</footer></html><?php
        } else {?>
         <footer class="page-footer font-small blue pt-4 mt-4 navbar navbar-fixed-bottom" style="background-color:black;margin-top:5%;padding: .5% 0% .5% 0%">
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
</footer></html>
       <?php }; ?>

