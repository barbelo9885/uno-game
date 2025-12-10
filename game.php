<?php
	session_start();
	if(!isset($_SESSION['userID'])) {
		// user hasn't logged in
		header("Location: login.php");
		exit();
	}

	require_once 'DB.class.php';
	$db = new DB();
	$cards = $db->getAllCards();
	$starterHand = array_slice($cards, 0, 7);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/styles.css">
	<title>Document</title>
</head>
<body>
	<svg xmlns="http://www.w3.org/2000/svg" width="800" height="800">
		<image href="assets/images/board.svg" id="board" width="800" height="800"/>

		<?php
			$x = 100;
			$y = 675;
			foreach($starterHand as $card) {
				$imagePath = $card['image'];
				echo "<image href='{$imagePath}' x='{$x}' y='{$y}' width='60' height='90'/>\n";
				$x += 90;
			}

			echo "<image href='assets/images/card_back.svg' x='300' y='355' width='60' height='90'/>\n";
			$starterCard = $cards[7];
			$starterImagePath = $starterCard['image'];
			echo "<image href='{$starterImagePath}' x='400' y='355' width='60' height='90'/>\n";

			$x = 100;
			$y = 50;
			for($i = 0; $i < 7; $i++) {
				echo "<image href='assets/images/card_back.svg' x='{$x}' y='{$y}' width='60' height='90'/>\n";
				$x += 90;
			}
		?>
	</svg>
	<br>
	<button onclick="window.location.href='lobby.php'">Back</button>
</body>
</html>