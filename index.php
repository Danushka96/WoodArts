<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: login/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Wood Arts Company</title>
<link rel="stylesheet" href="css/navmenu.css">
<link rel="shortcut icon" href="/woodarts/img/favicon.ico" type="image/x-icon">

</head>
<body>
			<div id='profile'><b id='welcome'>User : <i>
			<?php echo $_SESSION['login_user']; ?>
			</i></b><b id='logout'><a href='/woodarts/login/logout.php'>Log Out</a></b></div>

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
<h2>You have logged in as,
	<?php echo $_SESSION['login_user'];?>
</h2>
<?php
echo "<h3 font color='red'> You have These Permissions in this System </h3>";
$level=$_SESSION['login_level'];

?>
</body>
</html>
