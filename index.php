<?php
session_start();
ob_start();

//load the  required classes

	spl_autoload_register( function ($className){
		

if(file_exists('./classes/'.$className.'.php')){

	require_once('./classes/'.$className.'.php');


}else if(file_exists('./controllers/'.$className.'.php')){

	require_once('./controllers/'.$className.'.php');


}
});

// Routes Loaded

require_once('Routes.php');




?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		setTimeout(function(){
			$(".text-success").fadeOut();
			$(".text-danger").fadeOut();
		 }, 1000);
		
	});
</script>

