<?php

include_once "../../helper/helper.view.php";

header('Content-Type: application/json');
$student =  null;
if (isset($_GET['selected_student']) && $_GET['selected_student'] != "null")
    $student = $_GET['selected_student'];
echo ResearchAction::getResearch($student);