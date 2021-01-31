<section class="mainContent py-5">
	
	<div class="container">
		<div class="titleBlock d-flex justify-content-between pb-5">
			<h1>Gallery</h1>
		</div>
		<?php
		if( isset( $_SESSION['error'] ) ) {
			echo '<h4 class="text-danger">'. $_SESSION['error'].' </h4>';
		 }
		 if( isset( $_SESSION['response'] ) ) {
			echo '<h4 class="text-success">'. $_SESSION['response'].' </h4>';
		 }

		  unset($_SESSION['error']);
		 unset($_SESSION['response']);
	?>
		<div class="row pt-2">
			<div class="col-lg-3 bg-dark p-3">
				<?php  require_once("sidebar.php");?>
			</div>
			<div class="col-lg-9">
		<form method="post" action ="postgallery" enctype="multipart/form-data">
			<div class="form-group">
				<input type="file" name="gallery" />
			</div>
			<div class="form-group">
				<input type="submit" name="submit"  class="btn btn-success" value="submit" />
			</div>
		</form>
	</div>
</section>