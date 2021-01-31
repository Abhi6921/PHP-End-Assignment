<ul class="list-unstyled sidebar">

<?php


if ($_SESSION['role'] == 2){

	echo '

	<li><a href="users">View Users</a></li>
	<li><a href="register">Add Users</a></li>
	 <li><a href="role">Add Roles</a></li>
	<li><a href="roles">View Roles</a></li>
	<li><a href="gallery">Add Gallery</a></li>
	<li><a href="welcome">Home</a></li>';
}
if ($_SESSION['role'] == 1){

	echo '

	<li><a href="users">View Users</a></li>
	<li><a href="register">Add Register</a></li>
	<li><a href="gallery">Add Gallery</a></li>
	<li><a href="welcome">Home</a></li>';

}

if ($_SESSION['role'] == 3){

	echo '<li><a href="gallery">Add Gallery</a></li>
	<li><a href="welcome">Home</a></li>';

}
?>
</ul>
