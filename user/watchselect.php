<?php
session_start();
include 'usersession.php';		
$wapo = $_GET['wapo'];	
$json = file_get_contents('../process/cryptodata.json');
$data = json_decode($json, TRUE); //decodes in associative array	
$ar = $data['posts'];						
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
	<title><?= $user ?>'s watchlist</title>
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
			    <li class="active"><a href=""><span class="glyphicon glyphicon-flag"></span> Select cryptocurrency</a></li>	
			</ul>	
		</div>
	</div>        
</nav>
<div class="container-fluid" style="margin-top:1px">
	<div class="row">
		<div class="col-lg-6 col-md-6" >
			<div class="jumbotron" style="background: black">
				<a href="" style="text-decoration:none"><h2 class="text-center" style="color:white;font-size:1.6em"><b>Select a cryptocurrency to add</b></h2></a>
				<div id="headlines">
				    <div style="color:gold;font-size:1.4em;text-align:left">
				        <?php 					
                            for ($ia = 0; $ia < 180; $ia++){
	                            $name = $ar[$ia]['name'];
	                            $symbol = $ar[$ia]['symbol'];
	                            $rank = $ar[$ia]['rank'];
                                echo "<a href='watchproc.php?wapo=".$wapo."&coin=".$name."' style='color:white'><span class='glyphicon glyphicon-hand-right' style='color:gold;font-size:.8em'></span> ".$name."</a></br>";
	                        }  
						?>
					</div>
				</div><br />
			</div>
		</div>	
	</div>
</div>
<script src="bootstrap/js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script> 
</body>

</html>