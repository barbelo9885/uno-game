<?php

class DB {
	private $conn;

    function __construct(){
        $this->conn = new mysqli($_SERVER['DB_SERVER'],$_SERVER['DB_USER'],
        $_SERVER['DB_PASSWORD'],$_SERVER['DB']);

        if($this->conn->connect_error) {
            echo "DB connection failed: ".mysqli_connect_error();
            die();
        }

    }

	function getUser($userID) {
		$user = null;
		if($stmt = $this->conn->prepare("SELECT userID, username, password, wins FROM uno_user WHERE username = ?")) {
			$stmt->bind_param("i", $userID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				$user = [
					"userID" => $row['userID'],
					"username" => $row['username'],
					"passwordHash" => $row['password'],
					"wins" => $row['wins'],
				];
			}
		}
		return $user;
	}

	function getUserByUsername($username) {
		$user = null;
		if($stmt = $this->conn->prepare("SELECT userID, username, password, wins FROM uno_user WHERE username = ?")) {
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				$user = [
					"userID" => $row['userID'],
					"username" => $row['username'],
					"passwordHash" => $row['password'],
					"wins" => $row['wins'],
				];
			}
		}
		return $user;
	}

	function getCard($cardID) {
		$card = null;
		if($stmt = $this->conn->prepare("SELECT cardID, color, value, image FROM uno_card WHERE cardID = ?")) {
			$stmt->bind_param("i", $cardID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				$card = [
					"cardID" => $row['cardID'],
					"color" => $row['color'],
					"value" => $row['value'],
					"image" => $row['image'],
				];
			}
		}
		return $card;
	}

	function getRecentLobbyChatMessages() {
		$messages = [];
		if($stmt = $this->conn->prepare("SELECT messageID, sent, message, username FROM uno_lobbyChat ORDER BY sent DESC LIMIT 25")) {
			$stmt->execute();
			$results = $stmt->get_result();
			if($results->num_rows > 0) {
				while($row = $results->fetch_assoc()) {
					$messages[] = [
						"messageID" => $row['messageID'],
						"sent" => $row['sent'],
						"message" => $row['message'],
						"username" => $row['username'],
					];
				}
			}
		}
		return $messages;
	}

	function getRecentGameChatMessages($gameID) {
		$messages = [];
		if($stmt = $this->conn->prepare("SELECT messageID, sent, message, username FROM uno_gameChat WHERE gameID = ? ORDER BY sent DESC LIMIT 10")) {
			$stmt->bind_param("i", $gameID);
			$stmt->execute();
			$results = $stmt->get_result();
			if($results->num_rows > 0) {
				while($row = $results->fetch_assoc()) {
					$messages[] = [
						"messageID" => $row['messageID'],
						"sent" => $row['sent'],
						"message" => $row['message'],
						"username" => $row['username'],
					];
				}
			}
		}
		return $messages;
	}

	function getAllCards() {
		$cards = [];
		if($stmt = $this->conn->prepare("SELECT cardID, color, value, image FROM uno_card ORDER BY RAND()")) {
			$stmt->execute();
			$results = $stmt->get_result();
			if($results->num_rows > 0) {
				while($row = $results->fetch_assoc()) {
					$cards[] = [
						"cardID" => $row['cardID'],
						"color" => $row['color'],
						"value" => $row['value'],
						"image" => $row['image'],
					];
				}
			}
		}
		return $cards;
	}

	function getPlayerCards($userID, $gameID) {
		// get a player's current hand of cards for a specific game
		$cards = [];
		if($stmt = $this->conn->prepare("SELECT uno_card.cardID, uno_card.color, uno_card.value, uno_card.image FROM uno_userCard JOIN uno_card ON uno_userCard.cardID = uno_card.cardID WHERE uno_userCard.userID = ? AND uno_userCard.gameID = ?")) {
			$stmt->bind_param("ii", $userID, $gameID);
			$stmt->execute();
			$results = $stmt->get_result();
			if($results->num_rows > 0) {
				while($row = $results->fetch_assoc()) {
					$cards[] = [
						"cardID" => $row['cardID'],
						"color" => $row['color'],
						"value" => $row['value'],
						"image" => $row['image'],
					];
				}
			}
		}

		return $cards;
	}

	function getCurrentTurn($gameID) {
		$player = null;
		if($stmt = $this->conn->prepare("SELECT turn, player1ID, player2ID FROM uno_game WHERE gameID = ?")) {
			$stmt->bind_param("i", $gameID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				$turn = $row['turn'];
				$player1ID = $row['player1ID'];
				$player2ID = $row['player2ID'];
				$player = ($turn % 2 == 1) ? $player1ID : $player2ID;
			}
		}
		return $player;
	}

	function changeTurn($gameID) {
		$currentTurn = 0;
		if($stmt = $this->conn->prepare("SELECT turn FROM uno_game WHERE gameID = ?")) {
			$stmt->bind_param("i", $gameID);
			$stmt->execute();
			$stmt->store_result();
			$stmt->bind_result($turn);
			if($stmt->num_rows == 1) {
				$stmt->fetch();
				$currentTurn = $turn;
			}
		}

		$newTurn = 0;
		switch($currentTurn) {
			case 0:
				return -1;
			case 1:
				$newTurn = 2;
				break;
			case 2:
				$newTurn = 1;
				break;
			default:
				return -1;
		}

		if($stmt = $this->conn->prepare("UPDATE uno_game SET turn = ? WHERE gameID = ?")) {
			$stmt->bind_param("ii", $newTurn, $gameID);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->affected_rows == 1) {
				return $newTurn;
			}
		}
		return -1;
	}

	function playCard($gameID, $userID, $cardID, $turnNumber) {
		// validate that it's the user's turn and that they have the card
		$currentPlayer = $this->getCurrentTurn($gameID);
		if($currentPlayer != $userID) {
			// it's not the player's turn
			return false;
		}
		// get the player's hand

		// then update the game state to reflect the played card
		if($cardID >= 90 && $cardID <= 105) {
			// skip and reverse cards... do not change turn
		} else {
			$this->changeTurn($gameID);
		}

		if($stmt = $this->conn->prepare("INSERT INTO uno_gameCard (gameID, turnNumber, cardID) VALUES (?, ?, ?)")) {
			$stmt->bind_param("iii", $gameID, $turnNumber, $cardID);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->affected_rows == 1) {
				return true;
			}
		}
		return false;
	}

	function getLastPlayedCard($gameID) {
		$card = null;
		if($stmt = $this->conn->prepare("SELECT cardID FROM uno_gameCard WHERE gameID = ? ORDER BY turnNumber DESC LIMIT 1")) {
			$stmt->bind_param("i", $gameID);
			$stmt->execute();
			$result = $stmt->get_result();
			if($result->num_rows == 1) {
				$row = $result->fetch_assoc();
				$card = $this->getCard($row['cardID']);
			}
		}		
		return $card;
	}

	function setWinner($gameID, $userID) {
		if($stmt = $this->conn->prepare("UPDATE uno_game SET winner = ? WHERE gameID = ?")) {
			$stmt->bind_param("ii", $userID, $gameID);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->affected_rows == 1) {
				return true;
			}
		}
		return false;
	}


	function postLobbyChatMessage($message, $username) {
		if($stmt = $this->conn->prepare("INSERT INTO uno_lobbyChat (message, username) VALUES (?, ?)")) {
			$stmt->bind_param("ss", $message, $username);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->affected_rows == 1) {
				return true;
			}
		}
		return false;
	}

	function postGameChatMessage($message, $username, $gameID) {
		if($stmt = $this->conn->prepare("INSERT INTO uno_gameChat (message, username, gameID) VALUES (?, ?, ?)")) {
			$stmt->bind_param("ssi", $message, $username, $gameID);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->affected_rows == 1) {
				return true;
			}
		}
		return false;
	}

	function createUser($username, $password) {
		$passwordHash = password_hash($password, PASSWORD_BCRYPT);
		if($stmt = $this->conn->prepare("INSERT INTO uno_user (username, password, wins) VALUES (?, ?, 0)")) {
			$stmt->bind_param("ss", $username, $passwordHash);
			$stmt->execute();
			$stmt->store_result();
			if($stmt->affected_rows == 1) {
				return $this->conn->insert_id;
			}
		}
		return -1;
	}
}
