
<?php

require_once('models/login.php');

class LoginController extends Controller{

	protected $obj;
	protected $data;

	// Sending the query to read the data 

	public function read(){
		
		$this->obj = new Crud1();

		// INNER JOIN for taking the users data along with user role name 

		$this->data = $this->obj->get_data("select users.username, users.id,users.email , users.password, roles.name from users INNER JOIN roles ON users.roles = roles.id ");
		
		return $this->data;
	}

	// // Sending the query to Insert the data  

	public function create(){

		if(isset($_POST['username'])){

			$this->data = $_POST;
		
			//data validation 

			self::validate($this->data);


			if(!isset($_SESSION['error'])){

				$this->obj = new Crud1();

				// Insert Data through Model 

				 $this->obj->insert_data("INSERT INTO users (username,password, email, roles) VALUES (?,?,?,? )", $this->data );
		
			}
		}
}

 // Sending the query to checkuser the user  

	public function checkuser(){

		if(isset($_POST['submit'])){

			$this->data = $_POST;

			self::validate($this->data);

			if(!isset($_SESSION['error'])){

				$this->obj = new Crud1();

				$username = $this->obj->escape_string($_POST['username']);
				$password = $this->obj->escape_string($_POST['password']);

				$hashFormat = "$2y$10$"; 
				$salt = "iusesomecrazystrings22";
				$hashF_and_salt = $hashFormat . $salt;

				$password = crypt($password,$hashF_and_salt); 

			// check  Data through Model 

			$this->obj->validUser("select * from users where username = '$username' and password = '$password'");
	
			}	
		}
	}

 // Sending the query to fetch the single user  

	public function singleUser(int $id){

		$this->obj = new Crud1();

		// fetch single user
		
		$id = $this->obj->escape_string($id);

		$data = $this->obj->user("select users.username, users.id,users.email , users.password, roles.name from users INNER JOIN roles ON users.roles = roles.id where users.id = $id ");

		return $data;
	}


	//Delete user


public function deluser(int $id){

	$this->obj = new Crud1();

	$id = $this->obj->escape_string($id);

	$this->obj->delete("Delete from users where id = $id");

}

 // Sending the query to fetch the Update user  

	public function userUpdate(){

		if(isset($_POST['submit'])){

			$this->data = $_POST;
		
			self::validate($this->data);



			if(!isset($_SESSION['error'])){
		
			$this->obj = new Crud1();

		// update Data through Model 

			$result = $this->obj->update_data("UPDATE users SET username = ?, password = ?, 
				email= ? where id = ? ", $this->data) ;

			return $result;
		}
	}
}
 // Sending the query to fetch the search user  

	public function searchUser(){

		if(isset($_GET['submit'])){

		$search = $_GET['search'];

			if(empty($search)){

				header("Location: users") ;
			}
		$this->obj = new Crud1();

		$id = $this->obj->escape_string($search);

		// update Data through Model 

	$result = $this->obj->search("select users.username, users.id, users.email , users.password, roles.name from users INNER JOIN roles ON users.roles = roles.id where username OR email LIKE '%$search%'" ) ;

		return $result;
	}
}
// check email 

public function checkEmail(){

	if(isset($_POST['submit'])){

		$this->data = $_POST;

		self::validate($this->data);


		if(!isset($_SESSION['error'])){

			$this->obj = new Crud1();

			$email = $this->obj->escape_string($_POST['email']);

		// check  Data through Model 

		$this->obj->emailCheck( "select * from users where email = '$email'" );

		}	
	}
}



// set pass
public function setpass(){

	if(isset($_POST['submit'])){

		$this->data = $_POST;

		self::validate($this->data);

		$token = $this->data['token'];

		if(!isset($_SESSION['error'])){

		$this->obj = new Crud1();

		
		$result = $this->obj->user("select * from  users where token = $token");

		if( $result ){

		// Update Password

		$this->obj->update_pass("UPDATE users SET password = ? , token = ? where token = ? ", $this->data) ;

	}

	}


		}	
	}
}
 

?>