<?php

include_once $_SERVER['DOCUMENT_ROOT'] .  "/assets/helper/classes/helper.view.php";
include_once $_SERVER['DOCUMENT_ROOT'] .  "/assets/helper/UserAction.php";

if(isset($_POST['submit-signup'])){
    
    $user = new User();
	
	if($user->getUserInfoSignup($user)){

		if(UserAction::createUser($user)){
			header("Location: /Registration/register.php?action=success");
		}
		else {
			header("Location: /Registration/register.php?action=somethingWrong");
			die();
		}

	}
}
