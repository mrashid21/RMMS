<?php

include_once "../../helper/helper.view.php";

	// insert a quote if submit button is clicked
if (isset($_POST['submit'])) {
	echo 'Entered task';
	if (empty($_POST['task'])) {
		$errors = "You must fill in the task";
		header('Location: /Checklist.php?errors=null');
	}else{
		$task = $_POST['task'];
		ChecklistAction::addTaskChecklist($task);
		header('Location: /Checklist.php');
		
	}
}	