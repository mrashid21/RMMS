<?php  

class Connection{

	public static function make($config){
		try {

			return new PDO(

				$config['connection'].';dbname='.$config['name'],

				$config['userName'],

				$config['password'],

				$config['handleErrors']

			);

		} catch (PDOException $e) {
			
			die($e->getMessage());

		}

	}

}


?>