<?php

require_once('models/models.php');

class RolesController extends Controller{
	
	protected $obj;
	protected $data;


	public function create(){

		if(isset($_POST['submit'])){
			$this->data = $_POST;
		}

		$this->obj = new Crud();

		// Insert Data through Model 

		$result = $this->obj->insert_data("INSERT INTO roles (name) VALUES (?)", $this->data);
			
		return $result;

	}

	public function read(){

		$this->obj = new Crud();
		$this->data = $this->obj->get_data("select * from roles");
		return $this->data;
	}

	public function readSingle(int $id){

		$this->obj = new Crud();
		$this->data = $this->obj->get_data("select * from roles where id= $id");
		return $this->data;
	}

	}
?>