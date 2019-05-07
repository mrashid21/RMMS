<?php

require "../helper/helper.view.php";
require "../helper/Perform.php";


$user = new User();
$LOGGED_USER;

if(isset($_POST['submit-signup'])){
	echo"SUBMIT???";
	if($user->getUserInfoSignup($user)){
		if(Perform::createUser($user)){
			header("Location: http://localhost/Registration/register.html?reg=success");
			echo"Registration Sucessful";

		}
		else{
			header("Location: http://localhost/Registration/register.html?error=something&wrong");
			echo "Something went wrong";
		}
	}
}

if(isset($_POST['submit-login'])){
	if($user->getUserInfoLogin($user)){
		Perform::Login($user);
	}
}

if(isset($_POST['submit-add-research'])){
	$research = new Research();
	if($research->setResearchInfo()){
		Perform::addResearch($research);
		//header("Location: http://localhost/index.php");
	}
}

//var_dump($user)



?>