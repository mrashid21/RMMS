<?php

include_once "../../helper/helper.view.php";

if(isset($_POST['task-name'])){
	$task = new Task();
	if($task->setTaskInfo()){
		header('Content-Type: application/json');
		TaskAction::addTask($task);
	}
}