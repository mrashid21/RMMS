<?php

include_once "../helper/classes/helper.view.php";

if(isset($_POST['task-name'])){
	$task = new Task();
	if($task->setTaskInfo()){
		header('Content-Type: application/json');
		echo TaskAction::addTask($task);
	}
}