<?php

session_start();

if( isset($_SESSION['user_id']) ){
	header("Location: ../index.php");
}



require '../config/config.php';

$message = '';
if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_POST['username'])){
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if($_POST['password'] != $_POST['confirm_password']){
	    $message = '<span class="alert alert-warning" style="font-size:1.25em;color:black;" role="alert">passwords did not match!</span>';
		header("Location: ../register.php?message=".$message);
	} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$message = '<span class="alert alert-warning" style="font-size:1.25em;color:black;" role="alert">this is not a valid email!</span>';
		header("Location: ../register.php?message=".$message);
	} else{
        $stmt = connect_to_auth()->prepare("SELECT * FROM users WHERE email = :email ");
		$stmt->bindParam(':email', $email);
		$stmt->execute();
		$result = $stmt->fetchAll();
	    if (count($result)) {
		    $message = '<span class="alert alert-danger" style="font-size:1.1em;color:black;" role="alert">This email already has an Account!</span>';
			header("Location: ../register.php?message=".$message);
	    } else{
			   $usertest = ($_POST['username']);
			   $stmt = connect_to_auth()->prepare("SELECT * FROM users WHERE username = :usertest");
			   $stmt->bindParam(':usertest', $usertest);
			   $stmt->execute();
		       $result = $stmt->fetchAll();
			   if (count($result)) {
				   $message = '<span class="alert alert-danger" style="font-size:1.4em;color:black;" role="alert">Username is already in Use!</span>';
				   header("Location: ../register.php?message=".$message);
			   } else {
				     // Enter the new user in the database
					 try{
						$pwrd = password_hash($_POST['password'], PASSWORD_BCRYPT);
						$sql = "INSERT INTO users (email, password, username) VALUES (:email, :password, :username)";
						$stmt = connect_to_auth()->prepare($sql);
						$stmt->bindParam(':email', $email);
						$stmt->bindParam(':username', $_POST['username']);
						$stmt->bindParam(':password', $pwrd);
	
						if( $stmt->execute() ){
							$message = '<span class="alert alert-success" style="font-size:1.3em;color:black;" role="alert">Account Successfully Created!</span>';
							header("Location: ../register.php?message=".$message);
						}
					} catch(PDOException $e){
						$message = '<span class="alert alert-danger" style="font-size:1.4em;color:black;" role="alert">There was an issue creating your account.</span>';
						header("Location: ../register.php?message=".$message);
					}
				}
	     }	
}
}else{
    $message = '<span class="alert alert-warning" style="font-size:1.5em;color:black;" role="alert">Please fill in all fields.</span>';
	header("Location: ../register.php?message=".$message);	
}

?>