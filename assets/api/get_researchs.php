<?php

include_once "../helper/classes/helper.view.php";

header('Content-Type: application/json');
echo ResearchAction::getResearch();