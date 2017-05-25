<?php
session_start();
echo $_SESSION['login_user'];
if (!isset($_SESSION['login_user'])){
	header("location: login/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="css/navmenu.css">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:200px;
        width: 1000px;
    }
</style>

</head>
<body>
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
<h1 align="center">Update Quantity</h1>
<form method ="post" action="addMember.php" >
      <label for="ItemID">Item ID:</label>
      <input name="ItemID" type="text" />
      <label for="Available Quantity">Available Quantity :</label>
      <input name="AQuantity" type="text" />
      <label for="newqty">New Quantity:</label>
      <input name="newqty" type="text" />
      <p>
      <input name="submit" type="Submit" value="Add"/>
      <input name="reset" type="reset" value="Clear Form">
  </form>
 </div>
</body>
</html>
