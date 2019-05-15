<?php

include_once "../helper/helper.view.php";
include_once "../helper/Perform.php";


if(isset($_POST['submit-signup'])){
    
    $user = new User();
	
	if($user->getUserInfoSignup($user)){

		if(Perform::createUser($user)){
			header("Location: /Registration/register.php?action=success");
		}
		else {
			header("Location: /Registration/register.php?action=somethingWrong");
			die();
		}

	}
}
