<?php

include_once "../helper/classes/helper.view.php";
include_once "../helper/TaskAction.php";

header('Content-Type: application/json');
echo TaskAction::getTasks();