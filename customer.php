<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: login/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="css/navmenu.css">
<link rel="stylesheet" href="css/formbox.css">
<link rel="stylesheet" href="css/button.css">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:180px;
        width: 500px;
    }

</style>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="login/logout.php">Log Out</a></b>
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
<h1 align="center">View Customer Details</h1>
<form method ="post" action="process/searchCustomer.php" >
      <label for="userid">Customer ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input name="userid" type="text" />
			<input name="submit" type="Submit" value="Search"/><br><br>
  </form>
	<p align="center"> <input name="Search" type="submit" value="View All Records" onclick=" window.open('process/allcustomer.php','',' scrollbars=yes,menubar=no,width=500, resizable=yes,toolbar=no,location=no,status=no')" />
 </div>

 </div>
</body>
</html>
