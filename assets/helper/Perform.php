<?php

class Perform{

	public static function createUser($user){

		require "../database/Connection.php";

		$config = require "../database/Config.php";

		$Db = Connection::make($config['database']);

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


			// $query = $Db->prepare('SELECT * FROM userss'); 
			// $query->execute();

			// $users = $query->fetchAll(PDO::FETCH_OBJ);

			// var_dump($users);

			// Clear the $query field. 
		$query = null;

			//Close the connection to the database.
		$Db = null;

			//Make all user fields null
		$user->clearUserFields();

		if($stat){
			return true;
		}
		return false;

	}

	public static function Login($user){
		require "../database/Connection.php";

		$config = require "../database/Config.php";

		$Db = Connection::make($config['database']);

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
			header("Location: http://localhost/overview.html");
		}
		else{
			header("Location: http://localhost/index.php?error=red");
		}
	}

}


