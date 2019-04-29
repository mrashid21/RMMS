<?php


function userValidatedSingup($user){


	if(strlen($user->getFirstName()) > 2 && strlen($user->getFirstName()) < 10){
		// insert first name into database...
	}
	else{
		//length >6 and <20
		//header("Location: http://localhost/public/main/core/register.php?error=1");
		return false;
	}
	if(strlen($user->getLastName()) > 2 && strlen($user->getLastName()) < 10){
		// insert last name into database...
	}
	else{
		//length >6 and <20
		return false;
	}
	if(strlen($user->getUserName()) > 4 && strlen($user->getUserName()) < 8){
		// insert user name into database...
	}
	else{
		//length >6 and <20
		return false;
	}
	if (strlen($user->getPassword()) > 6 && strlen($user->getPassword()) < 12) {
		// insert password name into database...

	}
	else{
		//length >6 and <20
		return false;
	}
	if($user->getConfirmPassword() != $user->getPassword()){
		return false;
	}
	
	return true;

}
