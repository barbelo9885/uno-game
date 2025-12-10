<?php
session_start();
if(!isset($_SESSION['userID'])) {
	// user hasn't logged in
	header("Location: login.php");
	exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
	if(isset($_POST['chat-input'])) {
		$message = trim($_POST['chat-input']);
		if(!empty($message)) {
			require_once 'DB.class.php';
			$db = new DB();
			$username = $_SESSION['username'];
			$success = $db->postLobbyChatMessage($message, $username);
			if($success) {
				echo "Message posted successfully.";
			} else {
				echo "Failed to post message.";
			}
		} else {
			echo "Message is empty.";
		}
	} else {
		echo "No message received.";
	}
} else {
	echo "Invalid request method.";
}

header("Location: lobby.php");
exit();
?>