<?php
session_start();
$username=$_SESSION['sqluser'];
$password=$_SESSION['sqlpassword'];

	$connection = mysqli_connect('localhost', $username, $password, 'woodsart');

	//Checking Errors

	?>
