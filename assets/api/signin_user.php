<?php

include_once "../helper/classes/helper.view.php";
include_once "../helper/UserAction.php";
include_once "../helper/Activity.php";

if(isset($_POST['submit-login'])){
	$user = new User();
	if($user->getUserInfoLogin($user)){
		UserAction::Login($user);
		
	}
}