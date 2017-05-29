<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: /woodarts/login/index.php");
}
if ($_SESSION['login_level']==2){
  echo "Access Denied";
	header("location: /woodarts/error.html");
}
$itemID=$_POST['ItemID'];
include_once('../inc/connection.php');
$query="SELECT * FROM items WHERE ItemID=$itemID";
$result=mysqli_query($connection,$query);
$array2=mysqli_fetch_array($result);
$name=$array2['ItemName'];
$qty=$array2['Quantity'];

if (isset($_POST['submit'])){
  $itemID=$_POST['itemID'];
  $name2=$_POST['itemname'];
  $qty2=$_POST['itemqty'];
  $add=$qty2-$_POST['new'];
  $sql="UPDATE items SET ItemName='$name2', Quantity='$add' WHERE ItemID='$itemID'";
  $result2=mysqli_query($connection,$sql);
  if ($result2) {
       echo "<script type='text/javascript'>alert('Updated successfully!')</script>";
    } else {
      echo "<script type='text/javascript'>alert('failed!')</script>";
    }
}



?>
<html>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="/woodarts/login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="img/logo.png" width='110' height='100'></p>
<p align="Center">New Stock IN </p>
<form method="post" action="stockout.php">
  <p align = "Center">
  <lable for="itemID">Item ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable>
  <input type="text" name="itemID" value="<?php echo $itemID; ?>"><br><br>
  <lable for="itemname">Item Name:</lable>
  <input type="text" name="itemname" value="<?php echo $name; ?>"><br><br>
  <lable for="Quantity">In Store:</lable>
  <input type="number" name="itemqty" value="<?php echo $qty; ?>"><br><br>
  <lable for="new">New store out:</lable>
  <input type="number" name="new"><br><br>
  <input type="submit" name="submit" value="Update">
</p>
</body>
</html>
