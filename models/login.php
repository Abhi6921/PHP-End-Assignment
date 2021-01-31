<?php

require_once('./classes/config.php');

class Crud1{

	public function get_data($query){

		try{

			$result = DB::getInstance()->query( $query );
			$data = array();
			
			if( !$result ){
				throw new Exception( "something went wrong" );
			}
			if ( $result->num_rows > 0 ) {
				while( $row = $result->fetch_assoc() ) {
					array_push( $data, $row );
				}
			}
		
		return $data;

	}catch( Exception $error ) {
			echo $error->getMessage();
		}
	}
	public function insert_data($quer, array $data){

		try{
				$query = DB::getInstance()->prepare( $quer );

				$query->bind_param( "sssi", $username, $password, $email, $roles );
				
				$username = $data['username'];
				$password = $data['password'];

				// secure pass
				$hashFormat = "$2y$10$"; 
				$salt = "iusesomecrazystrings22";
				$hashF_and_salt = $hashFormat . $salt;

				$password = crypt($password,$hashF_and_salt); 

				$email = $data['email'];
				$roles = $data['roles'];

				// executing the query

				$result = $query->execute();

				// set sessions 

				if( $result ){
					$_SESSION['uname']= $username;
					$_SESSION['role']= $roles;
					
				}else{
					throw new Exception( "something went wrong" );
				}
			}catch( Exception $error ) {
				echo $error->getMessage();
			}
		}


	public function validUser( $quer ){

		try{

			//  query 
			$statement = DB::getInstance()->query( $quer );

		
			// If user found

			if ( $statement->num_rows > 0 ) {
				
				$row = $statement->fetch_assoc();

				// set session 
				session_start();
				$_SESSION['uname'] = $row['username'];
				$_SESSION['role'] = $row['roles'];

				//redirect to welcome page 

				header("Location: welcome");

			}else{
				throw new Exception("Crenditials invalid");
			}
	}

		catch(Exception $e) {
	  		echo  $e->getMessage();
	}

}
public function user($query){
	try{

		$result = DB::getInstance()->query( $query );
		
		if(!$result){
				throw new Exception( "something went wrong" );
			}
			if ( $result->num_rows > 0 ) {

				$row = $result->fetch_assoc();

				return $row;
			}
	}
	catch( Exception $error ) {

			echo $error->getMessage();
		}

	}


public function update_data($quer, array $data){


		try{	
				// query 
				$query = DB::getInstance()->prepare( $quer );

				// binding parameters

				$query->bind_param( "sssi", $username, $password, $email,$id );

				$username = $data['username'];
				$password = $data['password'];

				// secure pass
				$hashFormat = "$2y$10$"; 
				$salt = "iusesomecrazystrings22";
				$hashF_and_salt = $hashFormat . $salt;

				$password = crypt($password,$hashF_and_salt);
				
				$email = $data['email'];
				$id = $data['id'];


				// excuting query 

				$result = $query->execute();


				if( $query ){
					return $result;
				}else{
					throw new Exception( "something went wrong" );
				}
			}catch( Exception $error ) {
				echo $error->getMessage();
			}
	}

public function search( $query ){
	try{

		// query 
		$result = DB::getInstance()->query( $query );

		// error 
		if(!$result){
				throw new Exception( "something went wrong" );
			}

		// fetch the data 

		if ( $result->num_rows > 0 ) { 

			$data = array();

			while( $row = $result->fetch_assoc() ) {
				array_push( $data, $row );
			}
				
			 return $data;

			}else{
			
			return [];
		}
	}
	catch( Exception $error ) {
			echo $error->getMessage();
		}

	}


public function emailCheck($quer){

	try{

			//  query 
			$statement = DB::getInstance()->query( $quer );

			
			// If user found

			if ( $statement->num_rows > 0 ) {
				
				$row = $statement->fetch_assoc();
				
				$email = $row['email'];

				$id = $row['id'];

				// token created

				$token = mt_rand(10,1000000).strtotime(date('Y/m/d H:i:s'));

				$url_with_token  = 'setpass/?token='.$token;

				// Always set content-type when sending HTML email

				$headers = "MIME-Version: 1.0" . "\r\n";
				$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

				// More headers
				$headers .= 'From: <webmaster@example.com>' . "\r\n";

				// Mail function

				$mail = mail($email,"Forgot Password", $url_with_token, $headers);


				if($mail){

				$_SESSION['response'] = " mail sent. Please check your email";

				$data = $this->token("update users SET token = $token  where id = $id");


				if( $data ){

					header("Location: forgot");
				}
			}
		}else{
			throw new Exception("Crenditials invalid");
		}
	}

		catch(Exception $e) {
	  		echo  $e->getMessage();
	}
}

public function token( $quer ){
	$data = DB::getInstance()->query( $quer );
	return $data;
}

public function update_pass($quer, array $data){

try{
	$query = DB::getInstance()->prepare( $quer );

				// binding parameters

				$query->bind_param( "sss", $password, $updateToken, $token );

				$token = $data['token'];
				$password = $data['newpass'];
				$updateToken = "0";
				// secure pass

				$hashFormat = "$2y$10$"; 
				$salt = "iusesomecrazystrings22";
				$hashF_and_salt = $hashFormat . $salt;

				$password = crypt($password,$hashF_and_salt); 

				// excuting query 

				$result = $query->execute();


				if( $result ){
					$_SESSION['response'] = "password changed successfully";
					header("Location: index.php");
				}else{
					throw new Exception( "something went wrong" );
				}
			}catch( Exception $error ) {
				echo $error->getMessage();
			}
}

public function delete( $quer ){
	try{

	$result = DB::getInstance()->query( $quer );

		// error 
		if(!$result){
				throw new Exception( "something went wrong" );
			}else{
				header("Location: users");
			}

}catch( Exception $error ) {
				echo $error->getMessage();
			}

}

public function escape_string( $data ){
		$data = DB::getInstance()->real_escape_string( $data );
		return $data;
	}

}



?>