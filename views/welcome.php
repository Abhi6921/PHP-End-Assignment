
<section class="mainContent py-5">
	
	<div class="container">
		<div class="titleBlock d-flex justify-content-between">
			<h1>Welcome <?php echo $_SESSION['uname'];
			?></h1>
			<a href="logout" class="btn btn-success">Logout</a>
		</div>

		<div class="row pt-5">

			<div class="col-lg-3 bg-dark p-3">
				<?php  require_once("sidebar.php");?>

			</div>
			<div class="col-lg-9">


			</div>
		</div>
</section>