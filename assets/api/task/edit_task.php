<?php

include_once "../../helper/helper.view.php";
include_once "../../helper/TaskAction.php";

if(isset($_POST['task-name'])){
	$task = new Task();
	if($task->setTaskInfo()){
				var_dump($task);
		header('Content-Type: application/json');
		echo TaskAction::updateTask($_GET['id'], $task);
	}
}