<?php

require_once('./classes/config.php');

class Gallery{

	public function insert_data( $quer, array $data ){

		try{
				// Query  
				$query = DB::getInstance()->prepare( $quer );

				$image = $this->escape_string( $data['name'] );

				$query->bind_param( "s", $image );

				$target_dir = 'images/';

				$target_file = $target_dir.$image;

				// Moving the file into folder 

				move_uploaded_file($data["tmp_name"], $target_file);

				// executing the query 

				$result = $query->execute();

				// if success

				if( $result ){

					$_SESSION['response'] = "added successfully";

					header( "Location: gallery" );
					
				} else {
					throw new Exception("something went wrong");
				}

			} catch(Exception $error) {
				echo $error->getMessage();
			}
	}



public function escape_string( $data ){
		$data = DB::getInstance()->real_escape_string( $data );
		return $data;
	}

}






?>