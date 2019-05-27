<?php

include_once "../../helper/helper.view.php";
include_once "../../helper/TaskAction.php";

header('Content-Type: application/json');
echo TaskAction::deleteTask($_GET['id']);