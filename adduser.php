<?php
require_once('inc/connection.php');
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: /woodarts/login/index.php");
}
if ($_SESSION['login_level']!=1){
	header("location: /woodarts/error.html");
}
if (isset($_POST['username']) || isset($_POST['password'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$level=$_POST['permission'];
	$sql="INSERT INTO users (username,password,ulevel) VALUES ('$username','$password','$level')";
	$result=mysqli_query($connection,$sql);
	if ($result){
		echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
	}
	else{
		echo "<script type='text/javascript'>alert('failed!')</script>";
	}
	mysqli_close($connection);
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="css/navmenu.css">
<link rel="stylesheet" href="css/formbox.css">
<link rel="shortcut icon" href="/woodarts/img/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="/woodarts/login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="img/logo.png"></p>
<h1 align="center"> Wood Arts Comapany Managment System</h1>
<div class="container">
	<a class="active" href="index.php">Home</a>
	<div class="dropdown">
    <button class="dropbtn">Add Record</button>
    <div class="dropdown-content">
      <a href="addcustomer.php">Add a Customer</a>
      <a href="additem.php">Add an Item</a>
      <a href="addorder.php">Add a Order</a>
			<a href="adduser.php">Add New User</a>
    </div>
  </div>
	<a href="items.php">Items</a>
	<a href="customer.php">Customers</a>
	<a href="deliver.php">Deliver Status</a>
  <a href="updateqty.php">Update Quantity</a>
  <a href="branch.php">Branch info</a>
</div>
<div class="box">
<h1 align="center">Add New User to System</h1>
<form method ="POST" action="adduser.php">
			<label for="username">User name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input name="username" type="text" /><br><br>
      <label for="password">Password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<input name="password" type="text" /><br><br
      <label for="permission">Permission Type:&nbsp;&nbsp;</label>
      <select name="permission">
        <option value=1>Super Admin</option>
        <option value=2>Show Room Operator</option>
        <option value=3>Stock Keeper</option>
      </select><br><br>
			<label for="type">Showroom:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
			<select name="branch">
				<option value="0">Administrator</option>
				<option value="1">Moratuwa</option>
				<option value="2">Colombo</option>
				<option value="3">Kurunegala</option>
				<option value="4">Mathara</option>
				<option value="5">Anuradhapura</option>
			</select><br><br>

        <p>
        <input name="submit" type="Submit" value="Add"/>
        <input name="reset" type="reset" value="Clear Form">
  </form>
 </div>
</body>
</html>
