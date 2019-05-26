<?php

include_once "../../helper/helper.view.php";

	// delete task
if (isset($_GET['del_task'])) {
	$id = $_GET['del_task'];
	ChecklistAction::deleteChecklistTask($id);
	header('Location: /Checklist.php');
}