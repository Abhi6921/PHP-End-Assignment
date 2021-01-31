<?php


// Login Screen

Route::set('index.php', function(){
	LoginController::CreateView('home');
},['login'=>false] );


// view all users

Route::set('users', function(){
	$test = new LoginController;
	$data = $test->read();
	LoginController::CreateView('users',$data);

},['role'=> [2,1] , 'login'=>true]);

// After Login Welcome Page

Route::set('welcome', function(){
	LoginController::CreateView('welcome');
},['login'=>true]);




// Login Check

Route::set('postlogin', function(){
	$login = new LoginController;
	$login->checkuser();
	if(isset($_SESSION['error'])){
		header("Location: index.php");
	}
}, ['login'=>false] );

// Logout

Route::set('logout', function(){
	LoginController::CreateView('logout');
},['login'=>true]);


// Search

Route::set('search', function(){
	$search = new LoginController;
	$data = $search->searchUser();
	LoginController::CreateView('search',$data);

},['role'=> [2,1] , 'login'=>true]);


//User Update
Route::set('usersedit', function(){
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$user = new LoginController;
		$data = $user->singleUser($id);
		LoginController::CreateView('usersedit',$data);
	} 
	
}, ['role'=> [2] , 'login'=>true]);


Route::set('postUserupdate', function(){
		$user = new LoginController;
		$result = $user->userUpdate();

		if($result){
			header("Location: users");
		}
},['role'=> [2] , 'login'=>true]);


// Register Screen
Route::set('register', function(){

	$roles = new RolesController;
	$data = $roles->read();
	LoginController::CreateView('register',$data);

});

// Register Check
Route::set('postregister', function(){

	$register = new LoginController;
	 $register->create();
	
	if(isset($_SESSION['error'])){
		header("Location: register");
	}
	elseif(isset($_SESSION['uname'])){
		header("Location: welcome");
	}

},);

// Roles Screen 

Route::set('role', function(){
	RolesController::CreateView('role');
},['role'=> [2] , 'login'=>true]);


// Register Roles  

Route::set('postroles', function(){

	$register = new RolesController;
	$success = $register->create();

	if($success){
		header("Location: roles");
	}

},['role'=> [2] , 'login'=>true]);

// Roles view Route

Route::set('roles', function(){

	$roles = new RolesController;
	$data = $roles->read();
	
	RolesController::CreateView('roles',$data);

},['role'=> [2,1] , 'login'=>true]);


// Register Screen
Route::set('gallery', function(){

	$roles = new RolesController;
	$data = $roles->read();
	LoginController::CreateView('gallery',$data);

},['login'=>true] );


// Gallery 

Route::set('postgallery', function(){

	$gallery = new galleryController;
	$success = $gallery->create();
	if(isset($_SESSION['error'])){
		header("Location: gallery");
	}
	
});


// View Images

Route::set('images', function(){

	$gallery = new galleryController;
	$success = $gallery->create();
	if(isset($_SESSION['error'])){
		header("Location: gallery");
	}
	
});

// Forgot Pass

Route::set('forgot', function(){

	LoginController::CreateView('forgot');
	
});

// Form submit

Route::set('postforgot', function(){

	$forgot = new LoginController;

	$forgot->checkEmail();

	if(isset($_SESSION['error'])){
		header("Location: forgot");
	}
	
});

// set Pass route

Route::set('setpass', function(){

	LoginController::CreateView('setPass');

});

// set form Pass route

Route::set('postpass', function(){

	$Setpass = new LoginController;

	$Setpass->setpass();

	if(isset($_SESSION['error'])){
		header("Location: forgot");
	}
	
});


// Delete users

Route::set('usersdel', function(){

	$delUsers = new LoginController;

	if(isset($_GET['id'])){

		$id = $_GET['id'];

	$delUsers->deluser($id);
}
	
});
?>