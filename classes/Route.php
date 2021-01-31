<?php

class Route{
	
	public static $validRoutes = array();

	public static function set($route, $function,$middlewares = null){

		self::$validRoutes = $route;

		if($_GET['url'] == $route){


			// Set routes permission if user is logged in

			if($middlewares != null){

				if(isset($middlewares['login'])){

					$login = $middlewares['login'];

					if($login == true && !isset($_SESSION['uname'])){
						die("You're not allowed to access this page.");
					}

					if($login == false && isset($_SESSION['uname'])){
						die("You're not allowed to access this page.");
					}
				}


			// Set routes permissions as per the roles


				if(isset($middlewares['role'])){

					$role = $middlewares['role'] ;

					if(!isset($_SESSION['role']) || !in_array($_SESSION['role'],$role)){
						die("You're not allowed to access this page.");
					}

				}
			}

			// Calling Route method

			$function->__invoke();
		}

	}

}

?>