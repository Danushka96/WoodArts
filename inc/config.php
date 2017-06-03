<?php

	//Connecting To the DataBase Server

	$connection = mysqli_connect('localhost', 'root', '', 'woodsart');

	//Checking Errors

	if (mysql_errno()) {
		die('SORRY BRO! Connection to the Database has failed' . mysqli_connect_error());
	}

?>
