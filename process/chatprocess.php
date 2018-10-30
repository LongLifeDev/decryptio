<?php
include '../config/config.php';
session_start();

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
}
//Check if form submitted
if(isset($_POST['message'])){
	$message = $_POST['message'];
	$cuser = $user;
	//Set timezone
	date_default_timezone_set('America/Los_Angeles');
	$time = date('g:i',time('g:i'));
	
	//Validate input
	if(!isset($cuser) || $cuser == '' || !isset($message) || $message == ''){
		$error = "Please fill in your name and a message";
		echo $error;
		exit();
	} else {
		$query = "INSERT INTO chat1 (user, message, time)
				VALUES (:user, :message, :time)";
		$stmt = connect_to_db()->prepare($query);
	    $stmt->bindParam(':user', $cuser);
	    $stmt->bindParam(':message', $message);
	    $stmt->bindParam(':time', $time);
		
		if($stmt->execute()){
			//header("Location: index.php");
			//echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'/>";
			//exit();
		} else {
			//header("Location: index.php");
			//$error = "error";
			//exit();
		}
	}
}

?>
<?php 
	
$query = "SELECT * FROM ( SELECT * FROM chat1 ORDER BY id DESC LIMIT 12
) sub ORDER BY id ASC";
$run = connect_to_db()->prepare($query);
$runn = $run->execute() ? $run->fetchAll() : false;

foreach($runn as $key => $chat) :
?>
	<div class="well well-sm" style="background: black; margin:0px;" id="chat_data">
		
	    <span style="float:left;"><span class="glyphicon glyphicon-user"> </span> <?php echo date('g:i',strtotime($chat->time)); ?>&nbsp </span>
		<span style="color:gold;"><?php echo $chat->user; ?></span>:
		<span style="color:white;"><?php echo htmlspecialchars($chat->message); ?></span>		
	</div>
<?php endforeach;?>