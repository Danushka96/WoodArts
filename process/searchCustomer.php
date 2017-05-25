<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: login/index.php");
}
$user=$_POST['userid'];
if (isset($user)){
  include_once('../inc/connection.php');
  if($_SESSION['login_level']==1){
    $query="SELECT * FROM customer where CID=$user";
  }
  else if($_SESSION['login_level']==2){
    $query="SELECT CID,CFName,CLName,CEmail,CTPno FROM customer where CID=$user";
  }
  else{
    header("location: ../error.html");
	}
  $result=mysqli_query($connection,$query);
  if(mysqli_num_rows($result)>0){
  	$str='';
  	while($row=mysqli_fetch_assoc($result)){
  		$str.="<tr><td>$row[CID]</td><td>$row[CFName]</td><td>$row[CLName]</td><td>$row[CEmail]</td><td>$row[CAddress1]</td><td>$row[CAddress2]</td><td>$row[CAddress3]</td><td>$row[CTPno]</td></tr>";
  	}
  }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="../css/navmenu.css">
<link rel="stylesheet" href="../css/formbox.css">
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="/woodarts/login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="img/logo.png"></p>
<h1 align="center"> Wood Arts Comapany Managment System</h1>
<div class="container">
	<a class="active" href="../index.php">Home</a>
	<div class="dropdown">
    <button class="dropbtn">Add Record</button>
    <div class="dropdown-content">
      <a href="../addcustomer.php">Add a Customer</a>
      <a href="../additem.php">Add an Item</a>
      <a href="../addorder.php">Add a Order</a>
			<a href="../adduser.php">Add New User</a>
    </div>
  </div>
	<a href="../items.php">Items</a>
	<a href="../customer.php">Customers</a>
	<a href="../deliver.php">Deliver Status</a>
  <a href="../updateqty.php">Update Quantity</a>
  <a href="../branch.php">Branch info</a>
</div>
<h1 align="center">Customer Details</h1>
<table border='2' align='center'>
	
  <tr>
    <th> Customer ID</th>
    <th> First Name </th>
    <th> Last Name </th>
    <th> Email </th>
    <th> Address Line 01 </th>
    <th> Address Line 02 </th>
    <th> Address Line 03 </th>
    <th> Telephone</th>
  </tr>
  <?php if(isset($str)) {echo $str;} ?>
</html>
