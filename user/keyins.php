<?php
include '../config/config.php';
session_start();
$kpo = $_GET['kpo'];
$word1 = $_GET['wd1'];
$word2 = $_GET['wd2'];
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
if(isset($_GET['kpo'])){
	$field = 'keyword'.$kpo;
	$field2 = 'keyword'.($kpo+1);
	$query = "UPDATE users SET ".$field." = :kwd1, ".$field2." = :kwd2  WHERE username = :user";
	$stmt = connect_to_auth()->prepare($query);
	//$stmt->bindParam(':field', $field);
	$stmt->bindParam(':user', $user);
	$stmt->bindParam(':kwd1', $word1);
	$stmt->bindParam(':kwd2', $word2);
		
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