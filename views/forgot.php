<section class="mainContent py-5">
	
	
	<div class="container">
		<div class="titleBlock d-flex justify-content-between pb-5">
			<h1>Forgot Password</h1>
			<a href="index.php" class="btn btn-success">Login</a>
		</div>
		<?php
		if( isset( $_SESSION['error']  ) ) {
			echo '<h4 class="text-danger">'. $_SESSION['error'].' </h4>';
		 }
		 if( isset( $_SESSION['response'] ) ){
			echo '<h4 class="text-success">'. $_SESSION['response'].' </h4>';

		 }
		  unset($_SESSION['error']);
		 unset($_SESSION['response']);
	?>
		<form method="Post" action ="postforgot">
			<div class="form-group">
				<input type="text" name="email" class="form-control" placeholder="Email" />
			</div>
		
		
			<div class="form-group">
				<input type="submit" name="submit"  class="btn btn-success" value="Submit" />
			</div>
		</form>
</section>