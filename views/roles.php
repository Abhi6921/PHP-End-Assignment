<section class="mainContent py-5">
	
	<div class="container">
		<div class="titleBlock d-flex justify-content-between py-4">
			<h1>Roles</h1>
			<a href="role" class="btn btn-success" style="line-height: 40px">Add Roles</a>
		</div>
		<table class="table table-striped">
		 <thead>
		  <tr>
		    <th>Name</th>
		  
		  </tr>
		</thead>
		<tbody>

<?php
	foreach ($data as $key => $value) {

		echo ' <tr>
		        <td>'.$value['name'].'</td>
		       
		      </tr>';
	}

  ?>
      </tbody>
  	</table>
  </div>
</section>