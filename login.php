<?php
	if(isset($_POST['username']) && isset($_POST['password'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password)) {
			require_once 'DB.class.php';
			$db = new DB();
			$user = $db->getUserByUsername($username);
			if($user) {
				if(password_verify($password, $user['passwordHash'])) {
					session_start();
					$_SESSION['userID'] = $user['userID'];
					$_SESSION['username'] = $user['username'];
					header("Location: lobby.php");
					exit();
				} else {
					echo "Invalid username or password.";
				}
			} else {
				echo "Invalid username or password.";
			}
		} else {
			echo "Please enter both username and password.";
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/styles.css">
	<title>Login</title>
</head>
<body>
	<form action = "" method="POST" class="login">
		<h1>Login page</h1>
		<div>
			Username:
			<input type="text" name="username" size="30">
		</div>
		<div>
			Password:
			<input type="password" name="password" size="30">
		</div>
		<div>
			<input type="submit" value="Log in">
		</div>
		<br>
		<div>
			<p>Don't have an account?</p>
			<input type="button" value="Register" onclick="window.location='register.php'">
		</div>
	</form>
</body>
</html>