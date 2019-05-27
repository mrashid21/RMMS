<?php

if(!isset($_SESSION)){
	session_start();
}


class TaskAction{

	public static function connect(){
		require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/database/Connection.php";

		require_once "Activity.php";

		$config = require $_SERVER['DOCUMENT_ROOT'] . "/assets/database/config.php";

		return Connection::make($config['database']);
	}

    // This function will add a task to database
	public static function addTask($task){
		
		$Db = self::connect();

		$name = $task->getName();
		$start_date = $task->getStartDate(); 
		$due_date = $task->getDueDate();
		$completion = $task->getCompletion();
		$done = $task->getDone();
		$researchId = $task->getResearchId();


		$query = $Db->prepare("INSERT INTO tasks (researchId, name, completion, start_date, due_date, done) VALUES
			(:researchId, :name, :completion, :start_date, :due_date,:done)");
		

		$query->bindParam(':researchId', $researchId);

		$query->bindParam(':name', $name);

		$query->bindParam(':start_date', $start_date);

		$query->bindParam(':due_date', $due_date);

		$query->bindParam(':completion', $completion);

		$query->bindParam(':done', $done);

		$stat = $query->execute();

		$query = null;

		$Db = null;

		$Db = self::connect();

		// ORDER BY id DESC LIMIT 1 
		
		$query = $Db->prepare("SELECT * FROM tasks WHERE name = :name");

		$query->bindParam(':name', $name);
		
		$stat = $query->execute();

		$data = $query->fetch(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		Activity::addActivity("Created a new task to research phase");

		return json_encode($data);
	}

	public static function updateTask($id, $task){
		$Db = self::connect();
		// ORDER BY id DESC LIMIT 1
		$name = $task->getName();
		$start_date = $task->getStartDate(); 
		$due_date = $task->getDueDate();
		$completion = $task->getCompletion();
		$done = $task->getDone();
		$researchId = $task->getResearchId();


		$query = $Db->prepare("UPDATE tasks SET name = :name,  completion = :completion, start_date=:start_date, due_date=:due_date, done=:done WHERE id = :id");

		$query->bindParam(':id', $_GET['id']);

		$query->bindParam(':name', $name);

		$query->bindParam(':start_date', $start_date);

		$query->bindParam(':due_date', $due_date);

		$query->bindParam(':completion', $completion);

		$query->bindParam(':done', $done);

		$stat = $query->execute();

		$query = null;

		$Db = null;

		Activity::addActivity("Updated a new task to research phase");
	}

	public static function deleteTask($id){
		$Db = self::connect();
		
		$query = $Db->prepare("DELETE FROM tasks WHERE id = :id");

		$query->bindParam(':id', $id);

		$query->execute();

		$query = null;

		$Db = null; 

		echo $id;
	}

	public static function getTasks(){

		$Db = self::connect();
		// ORDER BY id DESC LIMIT 1
		$query = $Db->prepare("SELECT * FROM tasks WHERE researchId = :researchId");

		$query->bindParam(':researchId', $_GET['id']);

		$stat = $query->execute();

		$data = $query->fetchAll(PDO::FETCH_ASSOC);

		$query = null;

		$Db = null;

		return json_encode($data);
	}
}