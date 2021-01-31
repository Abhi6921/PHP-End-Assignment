<section class="mainContent py-5">
	
	
	<div class="container">
		<div class="titleBlock d-flex justify-content-between pb-5">
			<h1>Login</h1>
			<a href="register" class="btn btn-success">Register</a>
		</div>
		<?php
		if( isset( $_SESSION['error'] ) ) {
			echo '<h4 class="text-danger">'. $_SESSION['error'].' </h4>';
		 }
		 if(isset($_SESSION['response'])){

			echo '<h4 class="text-success">'. $_SESSION['response'].' </h4>';
		 }

		 unset($_SESSION['error']);
		 unset($_SESSION['response']);

	?>
		<form method="Post" action ="postlogin">
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="username" />
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" />
			</div>
			<a href="forgot">Forgot Password</a>
		
			<div class="form-group">
				<input type="submit" name="submit"  class="btn btn-success" value="Login" />
			</div>
		</form>
</section>