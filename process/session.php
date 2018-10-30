<?php
require 'config/config.php';
if( isset($_SESSION['user_id']) ){
	
	$records = connect_to_auth()->prepare('SELECT id, email, username FROM users WHERE id = :id');
	$records->bindParam(':id', $_SESSION['user_id']);
	$records->execute();
	$results = $records->fetch(PDO::FETCH_ASSOC);
	
	$user = NULL;
	
	if (count($results) > 0){
		$user = $results['username'];
	}
	
    } else {$user = 'Guest';}
?>
