<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/assets/helper/Activity.php";

session_start();

Activity::addActivity("Logged out");

session_unset();

session_destroy();

header("Location: /?action=logged_out");

