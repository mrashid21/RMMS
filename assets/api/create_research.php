<?php

include_once "../helper/helper.view.php";
include_once "../helper/Perform.php";

if(isset($_POST['research-name'])){
	$research = new Research();
	if($research->setResearchInfo()){
		header('Content-Type: application/json');
		echo Perform::addResearch($research);
	}
}