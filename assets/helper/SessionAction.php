<?php

class SessionAction{
    
	public static function startSession($user){
		session_start();
		include_once "../api/UserAction.php";
		$_SESSION['logged_id'] = $user['id'];
		$_SESSION['logged_firstName'] = $user['firstName'];
		$_SESSION['logged_lastName'] = $user['lastName'];

		$_SESSION['logged_img'] = UserAction::getImageDir();

	} 

}