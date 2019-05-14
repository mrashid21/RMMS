<?php

include_once "../helper/helper.view.php";
include_once "../helper/Perform.php";

if(isset($_POST['submit-login'])){
	$user = new User();
	if($user->getUserInfoLogin($user)){
		Perform::Login($user);
	}
}