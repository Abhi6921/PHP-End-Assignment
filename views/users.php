<section class="mainContent py-5">
	<div class="container">
		<div class="titleBlock d-flex justify-content-between py-4">
			<h1>Users</h1>
			<div class="search">
				<form action="search" method="GET">
					<div class="form-group">
						<input type="text" name="search" placeholder="search users">
						<input type="submit" name="submit" value="Search" class="btn btn-success"/>
					</div>
				</form>
			</div>
			<a href="register" class="btn btn-success" style="line-height: 40px">Add Users</a>
		</div>
		<div class="row pt-5">
			<div class="col-lg-3 bg-dark p-3">
				<?php  require_once("sidebar.php");?>
			</div>
			<div class="col-lg-9">
		<table class="table table-striped">
		 <thead>
		  <tr>
		    <th>Firstname</th>
		    <th>Lastname</th>
		    <th>Email</th>
		    <th>roles</th>
		    <th>Edit</th>
		    <th>Delete</th>
		  </tr>
		</thead>
		<tbody>

<?php
	// user data fetch
	if(count($data) > 0){
		foreach ($data as $key => $value) {

			echo ' <tr>
			        <td>'.$value['username'].'</td>
			        <td>'.$value['password'].'</td>
			        <td>'.$value['email'].'</td>
			        <td>'.$value['name'].'</td>
			        <td><a href="usersedit?id='.$value['id'].'">Edit</a></td>
			        <td><a href="usersdel?id='.$value['id'].'">Delete</a></td>
			      </tr>';
		}
	} else{
		echo 'No result found';
	}

  ?>
      </tbody>
  	</table>
  </div>
  </div>
</div>
</section>