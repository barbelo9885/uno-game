<?php

	function passwordMatch() {
		if($_POST['password1'] === $_POST['password2']) {
			return true;
		} else {
			return false;
		}
	}

	if(!empty($_POST['username']) && !empty($_POST['password1']) && !empty($_POST['password2'])) {
		if(passwordMatch()) {
			require_once 'DB.class.php';
			$db = new DB();
			$registerSuccess = $db->createUser($_POST['username'], $_POST['password1']);
			if($registerSuccess > 0) {
				echo "Registration successful! You can now <a href='login.php'>log in</a>.";
				exit();
			} else {
				echo "Registration failed: Username may already be taken.";
			}
		} else {
			echo "Passwords do not match.";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/styles.css">
	<title>Register Account</title>
</head>
<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="registration">
		<h1>Register Account</h1>
		<div>
			Username: <input type="text" name="username">
		</div>
		<div>
			Password: <input type="password" name="password1">
		</div>
		<div>
			Re-enter password: <input type="password" name="password2">
		</div>
		<div>
			<input type="submit" value="Register">
		</div>
		<br>
		<div>
			<p>Already have an account?</p>
			<input type="button" value="Log in" onclick="window.location='login.php'">
		</div>
	</form>
</body>
</html>