
<?php 
	$conn = mysqli_connect('localhost', 'root', '', 'medical');
	if (!$conn)
	{
		die("Could not connect: " . mysqli_connect_error());
	}
 ?>