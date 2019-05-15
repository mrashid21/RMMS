<?php

class Perform{

	public static function connect(){
		require_once "../database/Connection.php";

		$config = require "../database/Config.php";

		return Connection::make($config['database']);
	}

	public static function createUser($user){

		$Db = Perform::connect();

		$firstName = $user->getFirstName();

		$lastName = $user->getLastName();

		$email = $user->getEmail();

		$password = $user->getPassword();

		$userType = $user->getUserType();

		if(!empty(Perform::userExists($email))){
			header("Location: /Registration/register.php?action=emailUsed");
			die();
		}

		$query = $Db->prepare("INSERT INTO users (firstName, lastName, email, password, userType) VALUES (:firstName, :lastName, :email, :password, :userType)");

		$query->bindParam(':firstName', $firstName);

		$query->bindParam(':lastName', $lastName);

		$query->bindParam(':email', $email);

		$query->bindParam(':password', $password);

		$query->bindParam(':userType', $userType);

		
		$stat = $query->execute();

		// Clear the $query field. 
		$query = null;

		//Close the connection to the database.
		$Db = null;

		//Make all user fields null
		$user->clearUserFields();

		return $stat;
	}

	public static function Login($user){

		$email = $user->getEmail();
		$hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

		$checkPassword = password_verify($user->getPassword(), $hashedPassword);

		$exist = Perform::userExists($email);

		$user->clearUserFields();

		if($exist && $checkPassword){

			Perform::startSession($exist);

			$exist = null;
			$checkPassword = null;
			$hashedPassword = null;

			header("Location: /overview.php");
		}
		else{
			header("Location: /?action=invalid");
			die();
		}
	}

	// This function will add a research information to the database...
	public static function addResearch($research){

		$Db = Perform::connect();

		$name = $research->getName();
		$status = $research->getStatus();
		$percentage = $research->getCompletionPercentage();
		$contributers = $research->getContributers();

		$query = $Db->prepare("INSERT INTO progress (researchName, status, completionPercentage,contributers) VALUES
			(:name,:status,:percentage,:contributers)");

		$query->bindParam(':name', $name);

		$query->bindParam(':status', $status);

		$query->bindParam(':percentage', $percentage);

		$query->bindParam(':contributers', $contributers);

		$stat = $query->execute();

		$query = null;

		$Db = null;
	}

	public static function userExists($email){
		$Db = Perform::connect();

		$query = $Db->prepare("SELECT id, email, firstName FROM users WHERE email = :email");

		$query->bindParam(':email', $email);

		$stat = $query->execute();

		$exist = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return $exist;

	}

	public static function startSession($user){
		session_start();

		$_SESSION['logged_id'] = $user['id'];
		$_SESSION['logged_name'] = $user['firstName'];

		// var_dump($_SESSION);
	} 

}

?>