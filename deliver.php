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
<link rel="stylesheet" href="css/button.css">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:80px;
        width: 310px;
    }
</style>
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

<h1 align="center">View Product Deliver Status</h1>
<p align="center">
	<button class="buttonblue button3" onclick=" window.open('process/updatedeliver.php','',' scrollbars=yes,menubar=no,width=500, resizable=yes,toolbar=no,location=no,status=no')">Update Deliver Status</button>
<button class="buttonred button3" onclick=" window.open('process/undeliver.php','',' scrollbars=yes,menubar=no,width=500, resizable=yes,toolbar=no,location=no,status=no')">View Undlivered Orders</button>
<button class="buttongreen button3" onclick=" window.open('process/deliver.php','',' scrollbars=yes,menubar=no,width=500, resizable=yes,toolbar=no,location=no,status=no')">View delivered Orders</button>
<button class="buttonpink button3" onclick=" window.open('process/allcustomer.php','',' scrollbars=yes,menubar=no,width=500, resizable=yes,toolbar=no,location=no,status=no')">View all Cutomer IDs</button>
<div class="box">
<br>
  <form method ="post" action="process/DeliverCustom.php" >
      <label for="CID">Customer ID:</label>
      <input name="CID" type="text" />
      <input name="Search" type="Submit" value="Search"/>
</div>

</DIV>
</p>
</body>
</html>
