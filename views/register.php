<section class="mainContent py-5">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<div class="container">
		<div class="titleBlock">
			<h1>Register</h1>
		</div>
		<?php
		if(isset($_SESSION['error'])){
			echo '<h4 class="text-danger">'. $_SESSION['error'].' </h4>';
			}
			 unset($_SESSION['error']);
	?>
		<form method="Post" action="postregister" id="registerForm" >
			<div class="form-group">
				<input type="text" name="username" class="form-control" placeholder="username" />
			</div>
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Email" />
			</div>
			<div class="form-group">
				<input type="password" name="password" class="form-control" placeholder="Password" />
			</div>

			<div class="g-recaptcha" data-sitekey="6LdRdCMaAAAAAOE4--4GyVFv_d97TFliJPQgN5Zd"></div>

			<?php  
			if(isset($_SESSION['role'])){
				if($_SESSION['role'] == 2 || $_SESSION['role'] == 1){
					echo 	'<div class="form-group">
						<select name="roles" class="form-control">';
						
						foreach ($data as $key => $value) {

							echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
						}
						
				echo '</select>
				</div>';
			}
		}else{
			echo'<div class="form-group">
				<input type="hidden" name="roles" class="form-control"  value = "3"/>
			</div>';
		}
		?>
			<div class="form-group">
				<button type="button" onclick="submitHandler();" class="btn btn-success">Register</button>
			</div>
		</form>
</section>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

	function submitHandler(){
		var response = grecaptcha.getResponse();
		if(response.length <  1) {
			alert('Please verify captcha'); return;
		}
		$("#registerForm").submit();
	}
</script>