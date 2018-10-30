 <!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="utf-8"/>
	<!-- make sure latest IE is used -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<meta name="description" content="Cryptocurrency, Cryptocurrency news, Cryptocurrency research, Cryptocurrency blog, Crypto, news, research, games"/>
	<meta name="author" content="T.L."/>
	<title>Register</title>
	<!-- Bootstrap CSS -->
	<link href="/../bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
	<link href="/../bootstrap/css/basic-template.css" rel="stylesheet"/>
	<!-- HTML shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- [if lt IE 9]>
	    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
    <link rel="shortcut icon" href="favicon.ico" />
	<style type="text/css">		
	</style>
</head>
<body style="background: linear-gradient(black 13%,#23072c,black);font-family: Avant Garde, Tahoma;">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">
				<span style="color:gold;font-size:1.5em">Decryptio</span>
			</a>	
		</div>
		<div class="collapse navbar-collapse" id="navbar-container">
			<ul class="nav navbar-nav">
			    <li class=""><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
			    <li class=""><a href="login.php"><span class="glyphicon glyphicon-user"></span>Login</a></li>
                <li class="active"><a href=""><span class="glyphicon glyphicon-ok"></span>Register</a></li>						
			</ul>	
		</div>
	</div>        
</nav><br />
<div class="container-fluid" style="margin-top:1px">
	<div class="row">
		<div class="col-lg-6 col-md-12 col-lg-push-3">
		    <div class="jumbotron" style="background: black">
			    <div class="container">    
		            <div class="row">
			            <div class="col-md-12 padding-top-10" style="text-align:center;padding-bottom:28px;">
				        <?php if(isset($_GET['message'])){
				            echo $_GET["message"];}?>
			            </div>
		            </div>    
	            </div>
				<div class="panel panel-default" style="">
		    <div class="panel-heading" style="">Registration</div>
			<div class="panel-body">
			    <form action="process/regprocess.php" method="POST">    
				    <div class="row">
						<div class="col-md-6 padding-top-10">
						    <label for="email" class="control-label">Email Address:</label>
					        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" />
						</div>
					    <div class="col-md-6 padding-top-10">
							<label for="firstName" class="control-label">Username:</label>
					        <input type="text" class="form-control" id="userName" name="username" placeholder="Username" />
						</div>
					</div>
					<div class="row">
					    <div class="col-md-6 padding-top-10">
						    <label for="password" class="control-label">Password:</label>
					        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" />
						</div>
						<div class="col-md-6 padding-top-10">
						    <label for="confirmpassword" class="control-label">Confirm Password:</label>
					        <input type="password" class="form-control" id="confirmpassword" name="confirm_password" placeholder="Confirm your password" />
						</div>
					</div>
					<div class="row">
					    <div class="col-md-6 padding-top-10">
						    <br />   
						</div>
					</div>
					<div class="row">
					    <div class="col-xs-12">
						    <button type="submit" class="btn btn-success col-xs-4" style="margin-left:34%;margin-right:33%;">Register</button>  
						</div>
					</div>
					
				</form>
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
<?php function get_browser_name($user_agent)
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
