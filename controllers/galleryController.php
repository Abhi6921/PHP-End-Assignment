<?php

require_once('models/gallery.php');

class galleryController extends Controller{

	protected $obj;
	protected $data;

	

	public function create(){

		if( isset( $_POST['submit'] ) ){

			$this->data = $_FILES['gallery'];

			// Data Validation
			self::validate($this->data);


		if( !isset( $_SESSION['error'] ) ){
			
			$this->obj = new Gallery();

			// Insert Data through Model 

			$this->obj->insert_data( "INSERT INTO images (image) VALUES (?)", $this->data );
			
	}
}
	}



}
?>