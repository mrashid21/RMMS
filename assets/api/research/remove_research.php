<?php

include_once "../../helper/helper.view.php";


header('Content-Type: application/json');
echo ResearchAction::removeResearch($_GET['id']);
