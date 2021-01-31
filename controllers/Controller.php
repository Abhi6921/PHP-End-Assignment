<?php


class Controller {

	// Set the views

	public static function CreateView( string $viewname, $data = "null" ) {
		
		require_once( "views/shared-layout.php" );

		require_once( "views/$viewname.php" );

	}

	// Validate the data 
	public static function validate( array $data ) {
		

		foreach( $data as $key => $value ) {

			// check for the image
			
			if( $key == 'error' && $value == '0' ) continue;

			if( empty( $value ) ) {

				$_SESSION['error'] = "please fill all the fields";

				return false;
			}
			else{
					unset( $_SESSION['error'] );
			}
		}
	}
}
