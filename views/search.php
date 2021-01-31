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
		</div>
		
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
	// Search user data
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
		echo '<h3>No result found</h3>';
	}

  ?>
      </tbody>
  	</table>
  </div>
</section>