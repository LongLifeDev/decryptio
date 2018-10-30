<?php
session_start();
require '../config/config.php';
date_default_timezone_set('America/Los_Angeles');
$time = date('l jS \of F Y h:i:s A');
$cip = $_SERVER['HTTP_CLIENT_IP'];
$cff = $_SERVER['HTTP_X_FORWARDED_FOR'];
$cxf = $_SERVER['HTTP_X_FORWARDED'];
$cra = $_SERVER['REMOTE_ADDR'];
if(!empty($_POST['email']) && !empty($_POST['password']) || !empty($_POST['username']) && !empty($_POST['password'])){
    if (!empty($_POST['email'])){
	    $records = connect_to_auth()->prepare('SELECT id, email, password FROM users WHERE email = :email');
	    $records->bindParam(':email', $_POST['email']);
	} else {
		$records = connect_to_auth()->prepare('SELECT id, username, password FROM users WHERE username = :user');
	    $records->bindParam(':user', $_POST['username']);
	}
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	$message = '';
	
	
	$log = $_POST['username'].' '.$_POST['email'].' '.$time.' remote addr: '.$cra.' x forward for: '.$cff.' x forwarded: '.$cxf.' client ip: '.$cip."\n";
	if(count($results) > 0 && password_verify($_POST['password'], $results['password']) ){
	    $_SESSION['user_id'] = $results['id'];
		file_put_contents('../user/logsuccess.txt', $log, FILE_APPEND | LOCK_EX);
		mail("longlifemicro@gmail.com","Login",$log, "From: decrypto@host.com" );
		header("Location: ../index.php");
		
	} else {
		$message = '<span class="alert alert-danger" style="font-size:1.2em;color:black;" role="alert">Those credintials do not match.</span>';
		file_put_contents('../user/logfail.txt', $log, FILE_APPEND | LOCK_EX);
		mail("longlifemicro@gmail.com","LoginFail",$log, "From: decrypto@host.com" );
		header("Location: ../login.php?message=".$message);
	}	
	
} else {
	$message = '<span class="alert alert-warning" style="font-size:1.4em;color:black;" role="alert">Please fill in all fields.</span>';
	header("Location: ../login.php?message=".$message);
}
?>



</body>
</html>