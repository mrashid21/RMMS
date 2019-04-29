<?php

require "../helper/helper.view.php";
require "../helper/Perform.php";

$user = new User();

if(isset($_POST['submit-signup'])){
	echo"SUBMIT???";
	if($user->getUserInfoSignup($user)){
		if(Perform::createUser($user)){
			header("Location: http://localhost/Registration/register.html?success");
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

//var_dump($user)



?>