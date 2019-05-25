<?php

include_once $_SERVER['DOCUMENT_ROOT'] .  "/assets/helper/helper.view.php";

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
