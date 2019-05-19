<?php

include_once "../helper/helper.view.php";
include_once "../helper/Perform.php";

header('Content-Type: application/json');
echo Perform::getResearch();