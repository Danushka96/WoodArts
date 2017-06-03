<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
include_once('../inc/connection.php');
if (isset($_POST['submitin'])){
$itemID=$_POST['ItemID'];
$query="SELECT * FROM items WHERE ItemID=$itemID";
$result=mysqli_query($connection,$query);
$array2=mysqli_fetch_array($result);
$name=$array2['ItemName'];
$qty=$array2['Quantity'];
}

if (isset($_POST['submit'])){
  $itemID=$_POST['itemID'];
  $name2=$_POST['itemname'];
  $qty2=$_POST['itemqty'];
  $add=$_POST['new']+$qty2;
  $sql="UPDATE items SET ItemName='$name2', Quantity='$add' WHERE ItemID='$itemID'";
  $result2=mysqli_query($connection,$sql);
  if ($result2) {
       echo "<script type='text/javascript'>alert('Updated successfully!')</script>";
    } else {
      echo "<script type='text/javascript'>alert('failed!')</script>";
			$sql=mysqli_error($connection);
    }
}else{
	$sql="";
}



?>
<html>
<head>
	<style>
	.qbox {
	        background-color:#659df7;
	        border: 5px solid orange;
	        color:black;
	        font-weight:bold;
	        margin:20px auto;
	        height:150px;
	        width: 620px;

	  }

	</style>
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="../login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="img/logo.png" width='110' height='100'></p>
<p align="Center">New Stock IN </p>


<form method="post" action="stockin.php">
  <p align = "Center">
  <lable for="itemID">Item ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable>
  <input type="text" name="itemID" value="<?php echo $itemID; ?>"><br><br>
  <lable for="itemname">Item Name:</lable>
  <input type="text" name="itemname" value="<?php echo $name; ?>"><br><br>
  <lable for="Quantity">In Store:</lable>
  <input type="number" name="itemqty" value="<?php echo $qty; ?>"><br><br>
  <lable for="new">New store In:</lable>
  <input type="number" name="new"><br><br>
  <input type="submit" name="submit" value="Update">
</p>
<div class="qbox">
	<h2 align="center"><u>Query Box</U></h2>
		<p><?php echo $sql; ?></p>
</div>
</body>
</html>
