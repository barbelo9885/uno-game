<?php
	session_start();
	if(!isset($_SESSION['userID'])) {
		// user hasn't logged in
		header("Location: login.php");
		exit();
	}
 
	require_once 'DB.class.php';
	$db = new DB();

	// load chat messages
	$messages = $db->getRecentLobbyChatMessages();
	$chatString = "";
	foreach($messages as $message) {
		$messageText = htmlentities($message['message']);
		$messageText = filter_var($messageText, FILTER_SANITIZE_STRING);
		$string = "<div class='chat-message'><span class='timestamp'>{$message['sent']}</span> {$message['username']}: {$messageText}</div>";
		$chatString .= $string;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/styles.css">
	<title>Uno Lobby</title>
</head>
<body>
	<h1>Welcome to the Uno Lobby</h1>
	<h2>Press the button to start a game</h2>
	<button onclick="window.location.href='game.php'">Start Game</button>

	<aside class="chat">
		<h2>Lobby Chat</h2>
		<div class="chat-messages">
			<!-- Chat messages will appear here -->
			<?php echo $chatString; ?>
		</div>
		<form method="POST" action="chatProcess.php">
			<input type="text" name="chat-input" placeholder="Type your message here...">
			<input type="submit" value="Send">
		</form>
	</aside>
</body>
</html>