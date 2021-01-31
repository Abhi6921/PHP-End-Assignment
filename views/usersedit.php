<?php 
if(isset($data)){
	$username = $data['username'];
	$id = $data['id'];
	$password = $data['password'];
	$email = $data['email'];
	$role = $data['name'];
}

?>
<section class="mainContent py-5">
	
	<div class="container">
		<div class="titleBlock">
			<h1>Update</h1>
		</div>
		
		<form method="Post" action ="postUserupdate">
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $username ;?>" />
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $email ;?>" />
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo $password ;?>"/>
			</div>
			<div class="form-group">
				<input type="hidden" name="id" class="form-control"  value="<?php echo $id ;?>"/>
			</div>
			
			<div class="form-group">
				<input type="submit" name="submit"  class="btn btn-success" value="update" />
			</div>
		</form>
</section>