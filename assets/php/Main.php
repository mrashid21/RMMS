<?php

require "../helper/helper.view.php";
require "../helper/Perform.php";


$user = new User();
$LOGGED_USER;

if(isset($_POST['submit-signup'])){
	echo"SUBMIT???";
	if($user->getUserInfoSignup($user)){
		$var = Perform::createUser($user); 
		if($var){
			header("Location: /Registration/register.php?reg=success" . $var);

		}
		else{
			header("Location: /Registration/register.php?error=something&wrong" . $var);
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
		//header("Location: http://localhost/index.php");
	}
}

//var_dump($user)



?>