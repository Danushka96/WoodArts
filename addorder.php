<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: login/index.php");
}
?>
<?php
require_once('inc/connection.php');
if (isset($_POST['itemID']) || isset($_POST['branch'])){
		$orderid=$_POST['orderID'];
		$itemid=$_POST['itemID'];
    $client=$_POST['clientID'];
		$branch=$_SESSION['user_branch'];
		$qty=$_POST['qty'];
		$date=$_POST['date'];

		$sql="INSERT INTO Orders (OrderID, CID, ItemID, BranchID, Quantity, Dateissue) VALUES ('$orderid','$client','$itemid','$branch','$qty','$date')";
		$result=mysqli_query($connection,$sql);
		if ($result) {
				 echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
			} else {
				echo "<script type='text/javascript'>alert('failed!')</script>";
			}
}
?>
<?php mysqli_close($connection); ?>

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
	<a class="active" href="/woodarts/index.php">Home</a>
	<div class="dropdown">
    <button class="dropbtn">Add Record</button>
    <div class="dropdown-content">
      <a href="/woodarts/addcustomer.php">Add a Customer</a>
      <a href="/woodarts/additem.php">Add an Order</a>
      <a href="/woodarts/additem.php">Add a item</a>
			<a href="adduser.php">Add New User</a>
    </div>
  </div>
	<a href="/woodarts/items.php">Items</a>
	<a href="/woodarts/customer.php">Customers</a>
	<a href="/woodarts/deliver.php">Deliver Status</a>
  <a href="/woodarts/updateqty.php">Update Quantity</a>
  <a href="/woodarts/branch.php">Branch info</a>
</div>
<div class="box">
<h1 align="center">Add New Order Record</h1>
<form method ="post" action="addorder.php" >
      <label for="itemID">Item ID:</label>
      <input name="itemID" type="text" />
      <label for="clientID">Client ID:</label>
      <input name="clientID" type="text" /><br><br>
      <label for="qty">Quantity:</label>
      <input name="qty" type="number" size="6" /><br><br>
      <label for="date">Date of issue:</label>
      <input name="date" type="Date" min="2017-05-25"/><br><br>
      <p>
      <input name="submit" type="Submit" value="Add"/>
      <input name="reset" type="reset" value="Clear Form">
  </form>
	<input name="Search" type="submit" value="Search Customer ID" onclick=" window.open('/woodarts/process/allcustomer.php','',' scrollbars=yes,menubar=no,width=500, resizable=yes,toolbar=no,location=no,status=no')" />
 </div>
</body>
</html>
