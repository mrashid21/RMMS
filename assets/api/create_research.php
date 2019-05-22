<?php

include_once "../helper/classes/helper.view.php";
include_once "../helper/ResearchAction";

if(isset($_POST['research-name'])){
	$research = new Research();
	if($research->setResearchInfo()){
		header('Content-Type: application/json');
		echo ResearchAction::addResearch($research);
	}
}