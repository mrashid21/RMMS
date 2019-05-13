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
		
		$Db = Perform::connect();

		$email = $user->getEmail();
		$hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);

		$checkPassword = password_verify($user->getPassword(), $hashedPassword);

		$query = $Db->prepare("SELECT email FROM users WHERE email = :email");

		$query->bindParam(':email', $email);

		$query->execute();

		$exist = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		$user->clearUserFields();
		if($exist && $checkPassword){
			$exist = null;
			$checkPassword = null;
			header("Location: /overview.html");
		}
		else{
			header("Location: /index.php?action=invalid");
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

		$query = $Db->prepare("SELECT email FROM users WHERE email = :email");

		$query->bindParam(':email', $email);

		$stat = $query->execute();

		$exist = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return $exist;

	}

}

?>