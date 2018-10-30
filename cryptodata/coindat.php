<?php
session_start();
require '../config/config.php';
require '../functions/newsfunctions.php';
$dbh = connect_to_db();
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
$iy = filter_var($_GET['nmx'], FILTER_SANITIZE_STRING);	
$kwrd = filter_var($_GET['keyword'], FILTER_SANITIZE_STRING);
$kwr = filter_var($_GET['keywrd'], FILTER_SANITIZE_STRING);
if (empty($iy)){
	header('location: ../cryptocurrency.php');
};
$json = file_get_contents('../process/cryptodata.json');
$data = json_decode($json, TRUE); //decodes in associative array	
$ar = $data['posts'];


	
	for ($ia = 0; $ia < 180; $ia++){
	if ($iy == $ar[$ia]['name']){
	$name = $ar[$ia]['name'];
	$symbol = $ar[$ia]['symbol'];
	$rank = $ar[$ia]['rank'];
    $pricebtc = $ar[$ia]['price_btc'];
    $priceusd = $ar[$ia]['price_usd'];
    $twfrvlusd = $ar[$ia]['24h_volume_usd'];
    $marktcapusd = number_format($ar[$ia]['market_cap_usd']);
    $availsup = number_format($ar[$ia]['available_supply']);
    $totsup = number_format($ar[$ia]['total_supply']);
    $perchngh = $ar[$ia]['percent_change_1h'];
    $perchngth = $ar[$ia]['percent_change_24h'];
    $perchngd = $ar[$ia]['percent_change_7d'];
    $blockup = number_format($ar[$ia]['last_updated']);
	$clr = $ar[$ia]['prusd'];
	$ImageUrl = $ar[$ia]['ImageUrl'];
    $Algorithm = $ar[$ia]['Algorithm'];
	$ProofType = $ar[$ia]['ProofType'];
	}
	}	
?>
<?php 
						    $json = file_get_contents('cryptosites.json');
                            $data = json_decode($json, TRUE); //decodes in associative array
                            $ar = $data['sites'];
							for ($i=0;$i<150;$i++){
        $name2 = $ar[$i]['coin'];
		if ($kwrd === "Bitcoin Cash"){
			$kwrd = "bitcoin-cash";
		} else if ($kwrd === "Ethereum Classic") {
			$kwrd = "ethereum-classic";
		} else if ($kwrd === "Bitcoin Gold") {
			$kwrd = "bitcoin-gold";
		} else if ($kwrd === "Binance Coin") {
			$kwrd = "binance-coin";
		} else if ($kwrd === "KuCoin Shares") {
			$kwrd = "kucoin-shares";
		} else if ($kwrd === "Basic Attention Token") {
			$kwrd = "basic-attention-token";
		} else if ($kwrd === "Byteball Bytes") {
			$kwrd = "byteball-bytes";
		} else if ($kwrd === "Kyber Network") {
			$kwrd = "kyber-network";
		} else if ($kwrd === "Power Ledger") {
			$kwrd = "power-ledger";
		} else if ($kwrd === "Request Network") {
			$kwrd = "request-network";
		} else if ($kwrd === "Raiden Network Token") {
			$kwrd = "raiden-network-token";
		} else if ($kwrd === "Santiment Network Token") {
			$kwrd = "santiment-network-token";
		} else if ($kwrd === "Enjin Coin") {
			$kwrd = "enjin-coin";
		} else if ($kwrd === "Po.et") {
			$kwrd = "poet";
		} else if ($kwrd === "iExec RLC") {
			$kwrd = "rlc";
		} else if ($kwrd === "High Performance Blockchain") {
			$kwrd = "high-performance-blockchain";
		} else if ($kwrd === "Time New Bank") {
			$kwrd = "time-new-bank";
		} else if ($kwrd === "Nav Coin") {
			$kwrd = "nav-coin";
		} else if ($kwrd === "Experience Points") {
			$kwrd = "experience-points";
		} else if ($kwrd === "Red Pulse") {
			$kwrd = "red-pulse";
		} else if ($kwrd === "Genesis Vision") {
			$kwrd = "genesis-vision";
		} else if ($kwrd === "Dynamic Trading Rights") {
			$kwrd = "dynamic-trading-rights";
		} else if ($kwrd === "Bytecoin") {
			$kwrd = "bytecoin-bcn";
		}
		if ($name2 == $kwrd){
			$website = $ar[$i]['website'];
			
		}                                    								  
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
	<title><?= $name; ?> Information</title>
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
			    <li class="active"><a href=""><span class="glyphicon glyphicon-flag"></span>      CryptoCurreny Data</a></li>	
			</ul>	
		</div>
	</div>        
</nav>
<div class="container-fluid" style="margin-top:0px">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-lg-push-0" >
			
		    <div class="jumbotron " style="background: black">
			
				<h2 class="text-center" style="color:white;font-size:1.6em"><b><?= $name; ?> Data</b></h2><br />
				<div id="headlines" >
				<div class="row">
				<div class="col-lg-4 col-md-4 col-lg-push-0" >
				<div style="color:gold;font-size:1.4em;text-align:center">
				        <?php 
                            echo "<img style='width: 140px'  src = 'https://www.cryptocompare.com".$ImageUrl."'></img><br /><br />";?>
				</div>
				</div>
				<div class="col-lg-8 col-md-8 col-lg-push-0" >
				<div style="color:gold;font-size:1.4em;text-align:left" align="center">
				        <?php
						    echo "Name : <span style='color:white'>".$name."</span> </br>";
							echo $symbol." Price usd :<span style='color:".$clr."'> $".$priceusd."</span></br>";
							echo "Ticker : <span style='color:white'>".$symbol."</span> </br>";
							echo "Rank #: <span style='color:white'>".$rank." </span></br>";
							if (!empty($website)){
                            echo "Website : <a href='".$website."' target='_blank' style='color:white'><span class='glyphicon glyphicon-hand-right' style='color:gold;font-size:.8em'></span> ".$website."</span></a></br><br />";							
							};
                            ?>
				</div>
				</div>
				</div>
				<div class="row">
				<div class="col-lg-4 col-md-4 col-lg-push-0" >
				<div style="color:gold;font-size:1.4em;text-align:left" align="center">
				
				</div>
				</div>
				<div class="col-lg-8 col-md-8 col-lg-push-0" >
				<div style="color:gold;font-size:1.4em;text-align:left" align="center">
				<?php
				echo $symbol." to BTC Price : <span style='color:white'> ".$pricebtc."</span></br>";
	                        echo "1 hour change : <span style='color:white'> ".$perchngh."% </span></br>";
	                        echo "24 hour change : <span style='color:white'> ".$perchngth."% </span></br>";
	                        echo "7  day change : <span style='color:white'> ".$perchngd."% </span></br>";
	                        echo " Market cap. usd : <span style='color:white'> $".$marktcapusd."</span></br><br />";
	                        echo "Available supply : <span style='color:white'>".$availsup." </span></br>";
	                        echo "Total supply : <span style='color:white'> ".$totsup."</span></br>";
							echo "Algorithm : <span style='color:white'>".$Algorithm." </span></br>";
	                        echo "Proof Type : <span style='color:white'> ".$ProofType."</span></br>";
	                        
	                        echo "Last updated block : <span style='color:white'> ".$blockup."</span></br>";
				?>
				</div>
				</div>
				</div>
				</div>
	                        
						
					</div>
				    
				</div>
			
		
		<div class="col-lg-6 col-md-12">
			<div class="jumbotron" style="background: black">
				<h2 class="text-center" style="color:white;font-size:1.6em"><b><?= $name; ?> News</b></h2><br />
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
				</div>
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
                        Email: longlifemicro@gmail.com
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
        <a href="" style="color:gold"> Decryptio.io </a>
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