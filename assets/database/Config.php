<?php

return [

	'database' => [

		'name' => 'rmms',

		'userName' => 'root',

		'password' => '',

		'connection' => 'mysql:host=127.0.0.1',
		
		'handleErrors' => array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
	]


];


?>