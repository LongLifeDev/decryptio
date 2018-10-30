<?php
session_start();
include 'process/session.php';		
include 'functions/userfunctions.php';
if (count($results) <= 0){
		header('location: userctrl.php');
	};// function created in dbconnect, remember?
// get the database handler
$dbh = connect_to_auth(); // function created in dbconnect, remember?
$dbd = connect_to_db(); // function created in dbconnect, remember?
$userdat = fetchUser($dbh, $user);
$news = fetchKeyword($dbd,($userdat['keyword1']),$userdat['keyword2'],$userdat['keyword3'],$userdat['keyword4'] );
$json = file_get_contents('process/cryptodata.json');
$data = json_decode($json, TRUE); //decodes in associative array	
$ar = $data['posts'];	

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
	<meta name="author" content="T.Lindsey"/>
	<title style="font-family: Avant Garde, Tahoma;"><?= $user ?>'s user page</title>
	<!-- Bootstrap CSS -->
	<link href="/../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="/../bootstrap/css/basic-template.css" rel="stylesheet"/>
	<!-- HTML shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- [if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	

    <link rel="shortcut icon" href="favicon.ico" />
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
	</style>
</head>
<body style="background: black;background: linear-gradient(black 10%, #450f57, #23072c, black)">
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">
				<span style="color:gold;;font-family: Avant Garde, Tahoma;font-size:1.5em">Decryptio</span>
			</a>	
		</div>
		<div class="collapse navbar-collapse" id="navbar-container">
			<ul class="nav navbar-nav">
			    <li class="active"><a href="" style="font-family: Avant Garde, Tahoma;"><span class="glyphicon glyphicon-user"></span><b> <?= $user ?>'s user page</b></a></li>	
			</ul>	
		</div>
	</div>        
</nav>
<div class="container-fluid" style="margin-top:0px">
	<div class="row">
		
		
		<div class="col-lg-5 col-md-6 col-lg-push-0 col-md-push-0" style="margin-top:0px">
			<div class="jumbotron jumbotron-fluid" style="margin:0px 0px 0px 0px;">
				<h2 class="text-center" style="color:white;font-size:1.7em;text-align:left"><b><?= $user ?>'s watchlist</b></h2>
				<div class="panel panel-default" >
				    <div class="panel-body" style="color:gold;font-size:1.3em;text-align:left;background: black">
				        <?php 
						    if (!empty($userdat) ) {
								for ($c=0;$c<15;$c++){
									$cc=$c+1;
									$ari=0;
									if(!empty($userdat['crypto'.$cc])){
										while(!empty($ar[$ari])){
											if ($ar[$ari]['name'] == $userdat['crypto'.$cc]){
												$godat = "cryptodata/coindat.php?nmx=".$ar[$ari]['name']."&keyword=".$ar[$ari]['coin']."&keywrd=".$ar[$ari]['symbol'];
												$godel = "user/watchproc.php?wapo=".$cc;
												$mrcp = number_format($ar[$ari]['market_cap_usd']);
												echo '         
												<table class="table  .table-sm .table-responsive" >
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" style="width:11%;border: none"><img style="width: 80%;margin-left: 0%" src = "https://www.cryptocompare.com'.$ar[$ari]["ImageUrl"].'"></img></th>
                                                            <td style="width:60%;border: none;text-align:left"><a href="'.$godat.'" style="color:gold;padding: 0% 0% 0% 0%;font-size:1.25em;;font-family: Avant Garde, Tahoma;font-weight:bold" target="_blank">'.$ar[$ari]['name'].'</a></td>
                                                            <td style="width:29%;border: none;text-align:right"><span style="font-size:1.17em;;font-family: Avant Garde, Tahoma;color:'.$ar[$ari]['prusd'].';padding:0px 0px 0px 0px"> $'.$ar[$ari]['price_usd'].'</span></td>                            
                                                        </tr>
														<tr  >
                                                            <th scope="row" style="width:11%;border-bottom:1pt solid white;border-top:none"><span style="color:white;;font-family: Avant Garde, Tahoma;padding: 0% 0% 0% 0%">'.$ar[$ari]['symbol'].'</span></th>
                                                            <td style="width:60%;border-top:none;border-bottom:1pt solid white;text-align:left"><span style="color:lightblue;;font-family: Avant Garde, Tahoma;padding: 0% 0% 0% 0%"> 24hr.chg. </span>'.$ar[$ari]['percent_change_24h'].'%</td>
                                                            <td style="width:29%;border-top:none;border-bottom:1pt solid white;text-align:left"><a href="'.$godel.'"style="font-family: Avant Garde, Tahoma;color:blue" ><small>del</small></a></td>
                                                            </tr>
                                                    </tbody>
                                                </table>';
											}
											$ari=$ari+1;
										}
									} else {
										echo '  <table class="table  .table-sm .table-responsive" >
                                                    <tbody>  
														<tr  >
                                                            <th scope="row" style="width:11%;border-bottom:1pt solid white;border-top:none"></th>
                                                            <td style="width:60%;border-top:none;border-bottom:1pt solid white;text-align:right"><a href="user/watchselect.php?wapo='.$cc.'" style="color:blue;text-align:center">click here to add cryptocurrency</a></td>
                                                            <td style="width:29%;border-top:none;border-bottom:1pt solid white;text-align:left"></td>
                                                        </tr>
                                                    </tbody>
                                                </table>';
										
									}
								}
				            } else {
								echo 'error';
							}
                        ?>
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-7 col-md-6 col-lg-push-0" >
		    <div class="jumbotron" id="" >
				<h2 class="text-center" style="color:white;font-size:1.4em"></h2>
                <div class="btn-group">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                        <?php echo $userdat['keyword1']; ?> <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="user/keyins.php?kpo=1&wd1=Bitcoin&wd2=btc">Bitcoin</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Ethereum&wd2=eth">Ethereum</a></li>
                            <li><a href="user/keyins.php?kpo=1&wd1=Litecoin&wd2=ltc">Litecoin</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Ripple&wd2=xrp">Ripple</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Neo&wd2=neo">Neo</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Monero&wd2=xmr">Monero</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Cardano&wd2=ada">Cardano</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=OmiseGo&wd2=OMG">OmiseGo</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Cryptocurrency&wd2=Crypto">Cryptocurrency</a></li>
                            <li><a href="user/keyins.php?kpo=1&wd1=Blockchain&wd2=blockchain coding">Blockchain</a></li>
                            <li><a href="user/keyins.php?kpo=1&wd1=ICO&wd2=ico">Ico</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Mining&wd2=mining">Mining</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Exchanges&wd2=Brokerage">Exchanges</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Security&wd2=hack">Security</a></li>
                            <li><a href="user/keyins.php?kpo=1&wd1=Regulation&wd2=legislation">Regulation</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=Crime&wd2=arrest">Crime</a></li>
							<li><a href="user/keyins.php?kpo=1&wd1=None&wd2=xz">none</a></li>
                        </ul>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">
                        <?php echo $userdat['keyword3']; ?><span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="user/keyins.php?kpo=3&wd1=Bitcoin&wd2=btc">Bitcoin</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Ethereum&wd2=eth">Ethereum</a></li>
                            <li><a href="user/keyins.php?kpo=3&wd1=Litecoin&wd2=ltc">Litecoin</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Ripple&wd2=xrp">Ripple</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Neo&wd2=neo">Neo</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Monero&wd2=xmr">Monero</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Cardano&wd2=ada">Cardano</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=OmiseGo&wd2=OMG">OmiseGo</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Cryptocurrency&wd2=Crypto">Cryptocurrency</a></li>
                            <li><a href="user/keyins.php?kpo=3&wd1=Blockchain&wd2=blockchain coding">Blockchain</a></li>
                            <li><a href="user/keyins.php?kpo=3&wd1=ICO&wd2=ico">Ico</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Mining&wd2=mining">Mining</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Exchanges&wd2=Brokerage">Exchanges</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Security&wd2=hack">Security</a></li>
                            <li><a href="user/keyins.php?kpo=3&wd1=Regulation&wd2=legislation">Regulation</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=Crime&wd2=arrest">Crime</a></li>
							<li><a href="user/keyins.php?kpo=3&wd1=None&wd2=xz">none</a></li>
                        </ul>
                    </div>
                    <span style="color:grey;font-size:1.2em;font-family: Avant Garde, Tahoma;text-align:center"> -Select catagory to customize news feed</span>
                </div>
				<div class="panel panel-default" style="background: black">
				    <div class="row">
					<div class="col-lg-4 col-md-12 col-sm-12 col-lg-push-0" >
					<div class="panel-body" style="font-size:1.2em;background: black">
					    <?php  
                        // Fetch news              
                            if ( $news && !empty($news) && !empty($news[0]->web_link) ) :?>
                                			
                                    <img style='width: 100%;font-size: 2.3em;text-align:center;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[0]->image_url; ?>' alt="No Image"></img><br /><a class="headline" style="color:white;;font-family: Avant Garde, Tahoma;font-size:1em;margin: 0px 0px 0px 0px" href="<?= $news[0]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[0]->news_title); ?></a><br />
                                

                            <?php endif?>  
					</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-lg-push-0">
					<div class="panel-body" style="font-size:1.2em;background: black">
					    <?php 
                        // Fetch news              
                            if ( $news && !empty($news) && !empty($news[1]->web_link) ) :?>
                                			
                                    <img style='width: 100%;font-size: 2.3em;margin: 0% 0% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[1]->image_url; ?>' alt="No Image"></img><br /><a class="headline" style="color:white;;font-family: Avant Garde, Tahoma;font-size:1em;margin: 0px 0px 0px 0px" href="<?= $news[1]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[1]->news_title); ?></a><br />
                                

                            <?php endif?>  
					</div>
					</div>
					<div class="col-lg-4 col-md-6 col-sm-6 col-lg-push-0" >
					<div class="panel-body" style="font-size:1.2em;background: black">
					    <?php 
                        // Fetch news              
                            if ( $news && !empty($news) && !empty($news[2]->web_link) ) :?>
                                			
                                    <img style='width: 100%;font-size: 2.3em;margin: 0% 2% 0% 0%;padding: 0% 0% 0% 0%' float='center' src = '<?= $news[2]->image_url; ?>' alt="No Image"></img><br /><a class="headline" style="color:white;;font-family: Avant Garde, Tahoma;font-size:1em;margin: 0px 0px 0px 0px" href="<?= $news[2]->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($news[2]->news_title); ?></a><br />
                                

                            <?php endif?>  
					</div>
					</div>
					</div>
					<div class="row">
					<div class="col-lg-12 col-md-12 col-lg-push-0" >
                    <div class="panel-body" style="font-size:1.2em;background: black">
					    <?php 
                        // Fetch news              
                            if ( $news && !empty($news) ) :
                                foreach ($news as $key => $article) :	
                                    if ($article->news_title != $news[0]->news_title && $article->news_title != $news[1]->news_title && $article->news_title != $news[2]->news_title){?>								
                                    <a class="headline" style="color:white;;font-family: Avant Garde, Tahoma;font-size:1.1em;margin: 0px 0px 0px 0px" href="<?= $article->web_link; ?>" target="_blank"><span class="glyphicon glyphicon-hand-right" style="color:gold;font-size:.8em"></span> <?= stripslashes($article->news_title); ?></a><br />
							    <?php };
                                 endforeach?>

                            <?php endif?>   
					</div>
					</div>
					</div>
                </div>
			</div>
			
			<div class="jumbotron" >
			    <!--<script type="text/javascript" src="https://files.coinmarketcap.com/static/widget/currency.js"></script><div class="coinmarketcap-currency-widget" style="color:white" data-currencyid="1" data-base="USD" data-secondary="BTC" data-ticker="true" data-rank="true" data-marketcap="true" data-volume="true" data-stats="USD" data-statsticker="true"></div><br />-->
			    <h2 class="text-center" style="color:white;font-size:1.7em"><b>Decryptio chat</b></h2>
				<div style="color:lightblue;font-size:1em;text-align:left">
				        <?php include 'includes/chat.php'; ?>
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
<footer class="page-footer font-small blue pt-4 mt-4" style="background-color:black;margin-top:30%;padding: 2% 0% 2% 0%">
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