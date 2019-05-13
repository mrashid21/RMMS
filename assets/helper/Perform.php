<?php

class Perform{

	public static function createUser($user){

		$Db = Perform::connect();

		$firstName = $user->getFirstName();

		$lastName = $user->getLastName();

		$userName = $user->getUserName();

		$email = $user->getEmail();

		$password = $user->getPassword();

		$query = $Db->prepare("INSERT INTO users (firstName, lastName, userName,email,password) VALUES (:firstName,:lastName,:userName,:email,:password)");

		$query->bindParam(':firstName', $firstName);

		$query->bindParam(':lastName', $lastName);

		$query->bindParam(':userName', $userName);

		$query->bindParam(':email', $email);

		$query->bindParam(':password', $password);

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
		$password = $user->getPassword();

		$query = $Db->prepare("SELECT email,password FROM users WHERE email = :email AND password = :password");

		$query->bindParam(':email', $email);

		$query->bindParam(':password', $password);

		$query->execute();

		$exist = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		$user->clearUserFields();

		if($exist == true){
			header("Location: /overview.html");
		}
		else{
			header("Location: /index.php?error=red");
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
	}

	public static function connect(){
		require "../database/Connection.php";

		$config = require "../database/Config.php";

		return Connection::make($config['database']);
	}

}

?>