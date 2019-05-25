<?php

include_once $_SERVER['DOCUMENT_ROOT'] .  "/assets/helper/helper.view.php";

if(!isset($_SESSION)) 
{ 
    session_start(); 
}

if(isset($_POST['update-profile'])){

    $data = UserAction::retrieveData();
    
    // var_dump($data);

    $firstName = $_POST['firstName']; 
    $lastName = $_POST['lastName'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $checkPassword = password_verify($password ,$data['password']);
    $bio = $_POST['bio'];
    
    // echo "";

    if(empty($firstName) || $firstName === $data['firstName']){
        $firstName = $data['firstName'];
    }
    if(empty($lastName) || $lastName === $data['lastName']){
        $lastName = $data['lastName'];
    }
    if(empty($password) || $checkPassword){
        $hashedPassword = $data['password'];
    }
    if(empty($bio) || $bio === $data['bio']){
        $bio = $data['bio'];
    }

    echo $firstName;
    echo $lastName;
    echo $password;
    echo $hashedPassword;
    echo $checkPassword;
    echo $bio;
    
    UserAction::updateProfile($firstName, $lastName, $hashedPassword, $bio, $_SESSION['logged_id']);

}