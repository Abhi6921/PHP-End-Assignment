<section class="mainContent py-5">
	
	
	<div class="container">
		<div class="titleBlock d-flex justify-content-between pb-5">
			<h1>Set Password</h1>
			<a href="index.php" class="btn btn-success">Login</a>
		</div>
		<?php
		if( isset( $_SESSION['error'] ) ) {
			echo '<h4 class="text-danger">'. $_SESSION['error'].' </h4>';
		 }
	
		 unset($_SESSION['response']);
		 
		if( isset( $_GET['token'] ) ){

			$token = $_GET['token'];		
		?>	
		<form method="Post" action ="postpass">
			<div class="form-group">
				<input type="text" name="newpass" class="form-control" placeholder="NewPassword" />
			</div>
	
		<div class="form-group">
				<input type="hidden" name="token" class="form-control" value="<?php echo $token ?>"/>
			</div>

			<div class="form-group">
				<input type="submit" name="submit"  class="btn btn-success" value="Submit" />
			</div>
		</form>
	<?php }else{
		header("Location: index.php");
	} 
	?>
</section>