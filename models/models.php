<?php

require_once('./classes/Config.php');

class Crud{

		public function get_data($query){

		$result = DB::getInstance()->query($query);
		$data = array();
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()){
				array_push($data, $row);
			}
		}
		return $data;
	}

	public function insert_data($quer, array $data){

		// prepare and bind

		try{
				$statement = DB::getInstance()->prepare($quer);

				$statement->bind_param("s", $name);
				

				// set parameters and execute
				// print_r($data);

				$name = $data['title'];

				$success = $statement->execute();
				if($success){
					return true;
				}else{
					throw new Exception("something went wrong");
				}
			}catch(Exception $error) {
				echo $error->getMessage();
			}
		}

	}



?>