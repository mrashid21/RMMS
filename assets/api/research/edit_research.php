<?php

include_once "../../helper/helper.view.php";

if(isset($_POST['research-name'])){
	$research = new Research();
	if($research->setResearchInfo()){
		header('Content-Type: application/json');
		ResearchAction::editResearch($research, $_GET['id']);
	}
}