<?php
include '../config/config.php';
session_start();
$wapo = $_GET['wapo'];
$coin = $_GET['coin'];
if( isset($_SESSION['user_id']) ){
	
	$records = connect_to_auth()->prepare('SELECT id, email, username FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	
	$user = NULL;
	
	if (count($results) > 0){
		$user = $results['username'];
	}
	
} else {
	$user = 'guest';
	header("Location: ../userpage.php");
}
//Check if form submitted
if(isset($_GET['wapo'])){
	$field = 'crypto'.$wapo;
	$query = "UPDATE users SET ".$field." = :coin WHERE username = :user";
	$stmt = connect_to_auth()->prepare($query);
	//$stmt->bindParam(':field', $field);
	$stmt->bindParam(':user', $user);
	$stmt->bindParam(':coin', $coin);
		
		if($stmt->execute()){
			header("Location: ../userpage.php");
			//echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
			//exit();
		} else {
			//header("Location: index.php");
			//$error = "error";
			//exit();
		}
}


?>