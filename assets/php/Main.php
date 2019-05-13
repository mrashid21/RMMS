<?php

require "../helper/helper.view.php";
require "../helper/Perform.php";


$user = new User();

if(isset($_POST['submit-signup'])){
	echo"SUBMIT signup???";
	if($user->getUserInfoSignup($user)){
		$userExists = Perform::userExists($user->getEmail());
		if($userExists){
			header("Location: /Registration/register.php?action=emailUsed");
			die();
		}
		else{
			$userExists = null;
			$created = Perform::createUser($user);
			if($created){
				header("Location: /Registration/register.php?action=success");
			}
			else {
				header("Location: /Registration/register.php?action=somethingWrong");
				die();
			}
			
		}
	}
}

if(isset($_POST['submit-login'])){
	if($user->getUserInfoLogin($user)){
		Perform::Login($user);
	}
}

if(isset($_POST['research-name'])){
	$research = new Research();
	if($research->setResearchInfo()){
		Perform::addResearch($research);
	}
}

//var_dump($user)



?>