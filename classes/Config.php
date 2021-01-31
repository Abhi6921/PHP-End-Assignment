<?php

class DB {

	protected static $instance;

	protected function __construct() {}

	public static function getInstance() {

		if(empty(self::$instance)) {

			// Database Information
			
			$db_info = array(
				"db_host" => "localhost",
				"db_user" => "root",
				"db_pass" => "",
				"db_name" => "phpassignment",
				);

			try {

				// Database connectivity

				self::$instance = new mysqli($db_info['db_host'],$db_info['db_user'],$db_info['db_pass'],$db_info['db_name']);

				if(empty(self::$instance)){

					throw new Exception("something went wrong");
				}

			} catch(Exception $error) {
				echo $error->getMessage();
			}

		}

		return self::$instance;
	}

}



?>