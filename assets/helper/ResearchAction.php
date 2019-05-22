<?php

class ResearchAction
{

	public static function connect()
	{
		require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/database/Connection.php";

		require_once "Activity.php";
		
		$config = require $_SERVER['DOCUMENT_ROOT'] . "/assets/database/config.php";

		return Connection::make($config['database']);
	}

	// This function will add a research information to the database...
	public static function addResearch($research)
	{

		$Db = self::connect();

		

		$name = $research->getName();
		$status = $research->getStatus();
		$percentage = $research->getCompletion();
		$contributers = $research->getContributers();
		$stage = $research->getStage();

		$query = $Db->prepare("INSERT INTO progress (memberId, name, status, completion, contributers) VALUES
			(:memberId, :name, :status, :percentage, :contributers)");

		session_start();

		$query->bindParam(':memberId', $_SESSION['logged_id']);

		$query->bindParam(':name', $name);

		$query->bindParam(':status', $status);

		$query->bindParam(':percentage', $percentage);

		$query->bindParam(':contributers', $contributers);

		$stat = $query->execute();

		$query = null;

		$Db = null;

		$Db = self::connect();

		$query = $Db->prepare("SELECT * FROM progress ORDER BY id DESC LIMIT 1;");

		// $query->bindParam(':email', $email);

		$stat = $query->execute();

		$data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		Activity::addActivity("Created a new research");

		return json_encode($data);
	}

	public static function getResearch()
	{

		$Db = self::connect();

		$query = $Db->prepare("SELECT * FROM progress WHERE memberId = :memberId");

		session_start();

		$query->bindParam(':memberId', $_SESSION['logged_id']);

		$stat = $query->execute();

		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return json_encode($data);
	}
}
