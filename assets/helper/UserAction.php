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

		$matricNumber = $user->getMatricNumber();

		date_default_timezone_set('Asia/Kuala_Lumpur');
		$date = date('Y-m-d', time());

		$img = "https://api.adorable.io/avatars/160/ayoob.png";

		if (!empty(self::userExists($email))) {
			header("Location: /Registration/register.php?action=emailUsed");
			die();
		}

		$query = $Db->prepare("INSERT INTO users (firstName, lastName, email, password, userType, timeCreated, profileImage, matricNumber, bio) VALUES (:firstName, :lastName, :email, :password, :userType, :date, :img, :matricNumber, :bio)");

		$query->bindParam(':firstName', $firstName);

		$query->bindParam(':lastName', $lastName);

		$query->bindParam(':email', $email);

		$query->bindParam(':password', $password);

		$query->bindParam(':userType', $userType);

		$query->bindParam(':date', $date);

		$query->bindParam(':img', $img);

		$query->bindParam(':matricNumber', $matricNumber);
		$bio = "";
		$query->bindParam(':bio', $bio);


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

		$email = $user->getEmail();

		$Db = self::connect();

		$query = $Db->prepare("SELECT password FROM users WHERE email = :email");

		$query->bindParam(':email', $email);

		$stat = $query->execute();

		$password = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		include_once "SessionAction.php";

		$checkPassword = password_verify($user->getPassword(), $password['password']);

		$exist = self::userExists($email);

		$user->clearUserFields();

		if ($exist && $checkPassword) {

			SessionAction::startSession($exist);

			// $exist = null;
			// $checkPassword = null;
			// $hashedPassword = null;

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
		$query = $Db->prepare("SELECT id, email, firstName, lastName, userType FROM users WHERE email = :email");
		$query->bindParam(':email', $email);
		$stat = $query->execute();
		$exist = $query->fetch(PDO::FETCH_ASSOC);
		$query = null;
		$Db = null;
		return $exist;
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

		return $data['profileImage'];
	}

	public static function upadateProfileImg($img)
	{
		session_start();

		$Db = self::connect();

		$query = $Db->prepare("UPDATE users SET profileImage = :profileImage WHERE id = :id");

		$query->bindParam(':profileImage', $img);

		$query->bindParam(':id', $_SESSION['logged_id']);

		$query->execute();

		$query = null;

		$Db = null;

		Activity::addActivity("Uploaded profile image");
	}

	public static function retrieveData()
	{
		
		$Db = self::connect();

		$query = $Db->prepare("SELECT * FROM users WHERE id = :id ");

		$query->bindParam(':id', $_SESSION['logged_id']);

 		$query->execute();

		$data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;
		
		return $data;
	}

	public static function updateProfile($firstName, $lastName, $password, $bio, $id)
	{

		$Db = self::connect();

		$query = $Db->prepare("UPDATE users SET firstName = :firstName, lastName = :lastName, password = :password, bio = :bio WHERE id = :id");

		$query->bindParam(':firstName', $firstName);
		$query->bindParam(':lastName', $lastName);
		$query->bindParam(':password', $password);
		$query->bindParam(':bio', $bio);
		$query->bindParam(':id', $id);

		

		$query->execute();

		// $data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		Activity::addActivity("Updated the profile");

		header("Location: /profile.php");
		// return $data;
	}

	public static function retrieveList(){
		
		$Db = self::connect();

		$query = $Db->prepare("SELECT * FROM users WHERE userType = 'student'");

		$query->execute();

		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return $data;

	}

	public static function insertSupervisee($studentId){
		
		if ($_SESSION['logged_type'] === "supervisor"){
			$Db = self::connect();

			$supervisorId = $_SESSION['logged_id'];
			$query = $Db->prepare("INSERT INTO user_supervisor VALUES (:studentId, $supervisorId)");
			$query->bindParam(':studentId', $studentId);
			$query->execute();
		}		
	}

	public static function retrieveSupervisorStudents(){

		$Db = self::connect();

		$query = $Db->prepare("SELECT users.* FROM user_supervisor INNER JOIN users ON users.id = user_supervisor.studentId  WHERE supervisorId = :id");

		$id = $_SESSION['logged_id'];

		$query->bindParam(':id', $id);

		$query->execute();

		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return $data;

	}

	public static function checkStudent(){

		$Db = self::connect();

		$query = $Db->prepare("SELECT studentId FROM user_supervisor");

		$query->execute();

		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return $data;

	}
}
