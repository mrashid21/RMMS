<?php

class ChecklistAction
{

	public static function connect()
	{
		require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/database/Connection.php";

		require_once "Activity.php";
		
		$config = require $_SERVER['DOCUMENT_ROOT'] . "/assets/database/config.php";

		return Connection::make($config['database']);
	}

	// This function will add a research information to the database...
	public static function addTaskChecklist($task)
	{

		$Db = self::connect();


		$query = $Db->prepare("INSERT INTO checklist (memberId, task) VALUES
			(:memberId, :task)");

		$query->bindParam(':memberId', $_SESSION['logged_id']);

		$query->bindParam(':task', $task);

		$stat = $query->execute();

		// $data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		Activity::addActivity("Added a new task to checklist");

		header('Location: ../Checklist.php');
	}

	public static function getCheckkistTasks($id = null)
	{

		$Db = self::connect();

		$query = $Db->prepare("SELECT * FROM checklist");

		if(!is_null($id)){
			$query = $Db->prepare("SELECT * FROM checklist WHERE id = :id");
			$query->bindParam(':id', $id);
		}

		$stat = $query->execute();

		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return $data;
	}

	public static function deleteChecklistTask($id){

		$Db = self::connect();

		$query = $Db->prepare("DELETE FROM checklist WHERE id = :id");

		$query->bindParam(':id', $id);
		
		$stat = $query->execute();

		// $data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

	}

	public static function editChcecklist($id, $task){

		$Db = self::connect();

		$query = $Db->prepare("UPDATE checklist SET task = :task WHERE id = :id");

		$query->bindParam(':task', $task);

		$query->bindParam(':id', $id);
		
		$stat = $query->execute();

		$query = null;

		$Db = null;

	}

}
