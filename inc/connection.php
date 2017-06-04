<?php
$username=$_SESSION['sqluser'];
$password=$_SESSION['sqlpassword'];

	$connection = mysqli_connect('localhost', $username, $password, 'woodsart');

?>
