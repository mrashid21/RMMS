<?php

class UserAction
{

	public static function connect()
	{
		require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/database/Connection.php";
		
		require_once "Activity.php";

		$config = require $_SERVER['DOCUMENT_ROOT'] . "/assets/database/config.php";

		return Connection::make($config['database']);
	}

	public static function createUser($user)
	{

		$Db = self::connect();

		$firstName = $user->getFirstName();

		$lastName = $user->getLastName();

		$email = $user->getEmail();

		$password = $user->getPassword();

		$userType = $user->getUserType();

		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date = date('Y-m-d H:i:s', time());

		$img = "https://api.adorable.io/avatars/160/ayoob.png";

		if (!empty(self::userExists($email))) {
			header("Location: /Registration/register.php?action=emailUsed");
			die();
		}

		$query = $Db->prepare("INSERT INTO users (firstName, lastName, email, password, userType, timeCreated, profileImage) VALUES (:firstName, :lastName, :email, :password, :userType, :date, :img)");

		$query->bindParam(':firstName', $firstName);

		$query->bindParam(':lastName', $lastName);

		$query->bindParam(':email', $email);

		$query->bindParam(':password', $password);

		$query->bindParam(':userType', $userType);

		$query->bindParam(':date', $date);

		$query->bindParam(':img', $img);


		$stat = $query->execute();

		// Clear the $query field. 
		$query = null;

		//Close the connection to the database.
		$Db = null;

		//Make all user fields null
		$user->clearUserFields();

		Activity::addActivity("User created");

		return $stat;
	}

	public static function Login($user)
	{

		include_once "SessionAction.php";

		$email = $user->getEmail();
		$hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

		$checkPassword = password_verify($user->getPassword(), $hashedPassword);

		$exist = self::userExists($email);

		$user->clearUserFields();

		if ($exist && $checkPassword) {

			SessionAction::startSession($exist);

			$exist = null;
			$checkPassword = null;
			$hashedPassword = null;

			header("Location: /overview.php");
			Activity::addActivity("Loged in Successfully");
		} else {
			header("Location: /?action=invalid");
			Activity::addActivity("Failed to login");
			die();
		}
	}

	public static function userExists($email)
	{
		$Db = self::connect();
		$query = $Db->prepare("SELECT id, email, firstName,lastName FROM users WHERE email = :email");
		$query->bindParam(':email', $email);
		$stat = $query->execute();
		$exist = $query->fetch(PDO::FETCH_ASSOC);
		$query = null;
		$Db = null;
		return $exist;
	}

	public static function uploadImage()
	{
		$Db = self::connect();

		$query = $Db->prepare("INSERT INTO users profileImage VALUES :profileImage");

		$img = $_SESSION['logged_img'];

		$query->bindParam(':profileImage', $img);

		$query->execute();

		$query = null;

		$Db = null;

		Activity::addActivity("Uploaded profile image");
	}

	public static function getImageDir()
	{

		$Db = self::connect();

		$query = $Db->prepare("SELECT profileImage FROM users WHERE id = :id");

		$id = $_SESSION['logged_id'];

		$query->bindParam(':id', $id);

		$query->execute();

		$data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;
		
		return $_SERVER["DOCUMENT_ROOT"] . $data['profileImage'];
	}

	public static function upadateProfileImg()
	{
		$Db = self::connect();

		$query = $Db->prepare("UPDATE users SET profileImage = :profileImage WHERE id = :id");

		$query->bindParam(':profileImage', $_SESSION['logged_img']);

		$query->bindParam(':id', $_SESSION['logged_id']);

		$query->execute();

		$query = $Db->prepare("SELECT profileImage FROM users WHERE id = :id");

		$query->bindParam(':id', $_SESSION['logged_id']);

		$query->execute();

		$data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		Activity::addActivity("Uploaded profile image");

		return $data;
	}

	public static function retrieveData()
	{

		$Db = self::connect();

		$query = $Db->prepare("SELECT firstName, lastName, email, bio, timeCreated FROM users WHERE id = :id ");

		$query->bindParam(':id', $_SESSION['logged_id']);

		$query->execute();

		$data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return $data;
	}

	public static function updateProfile()
	{

		$Db = self::connect();

		$query = $Db->prepare("UPDATE users SET (firstName, lastName, password, bio)");

		$query->bindParam(':id', $_SESSION['logged_id']);

		$query->execute();

		$data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		Activity::addActivity("Updated the profile");

		return $data;
	}
}
