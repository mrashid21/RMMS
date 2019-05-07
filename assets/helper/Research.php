<?php

// This array will represent the information about the research..
$resaerch = array(
	'name' => "",
	'status' => "",
	'completionPercentage' => 0,
	'contributers' => 0
);

// This array will be a collection of researches (array of arrays). Key will be the name of the researcher OR an auto increment integer..
$researches = array();


// Loop through the array of arrays and store new research information --> This will be useful to retrive the information from the database and display to the page...
foreach ($researches as $key => $value) {
	//echo $key;
	$researches[$key]['name'] = "Ayoob";
	$researches[$key]['status'] = "pending";
	$researches[$key]['completionPercentage'] = 80;
	$researches[$key]['contributers'] = 4;
}

var_dump($researches);



?>