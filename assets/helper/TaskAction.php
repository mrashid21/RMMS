<?php

class TaskAction{

    public static function connect(){
			require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/database/Connection.php";
			
			require_once "Activity.php";

			$config = require $_SERVER['DOCUMENT_ROOT'] . "/assets/database/config.php";
	
			return Connection::make($config['database']);
    }

    // This function will add a task to database
	public static function addTask($task){

		session_start();
		
		$Db = self::connect();

		$name = $task->getName();
		$due_date = $task->getDueDate();
		$completion = $task->getCompletion();
		$done = $task->getDone();
		$researchId = $task->getResearchId();


		$query = $Db->prepare("INSERT INTO tasks (researchId, name, completion, due_date, done) VALUES
			(:researchId, :name, :completion, :due_date,:done)");
		

		$query->bindParam(':researchId', $researchId);

		$query->bindParam(':name', $name);

		$query->bindParam(':due_date', $due_date);

		$query->bindParam(':completion', $completion);

		$query->bindParam(':done', $done);

		$stat = $query->execute();

		$query = null;

		$Db = null;

		$Db = self::connect();

		// ORDER BY id DESC LIMIT 1 
		
		$query = $Db->prepare("SELECT * FROM tasks WHERE researchId = :researchId");

		$query->bindParam(':researchId', $researchId);
		
		$stat = $query->execute();

		$data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		Activity::addActivity("Created a new task");

		return json_encode($data);
	}

	public static function getTasks(){

		$Db = self::connect();
		// ORDER BY id DESC LIMIT 1
		$query = $Db->prepare("SELECT * FROM tasks WHERE researchId = :researchId");
		
		session_start();

		$query->bindParam(':researchId', $_GET['id']);

		$stat = $query->execute();

		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return json_encode($data);
	}
}