<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
?>
<?php
require_once('../inc/connection.php');
if (isset($_POST['submit'])){
		$cid=$_POST['CID'];
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$address1=$_POST['Address1'];
		$address2=$_POST['Address2'];
		$address3=$_POST['Address3'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$branch=$_SESSION['user_branch'];

		$sql="UPDATE customer SET CFName='$fname', CLName='$lname', CEmail='$email', CAddress1='$address1', CAddress2='$address2', CAddress3='$address3', CTPno='$phone' WHERE CID='$cid'";
		$result=mysqli_query($connection,$sql);
		if ($result) {
				 echo "<script type='text/javascript'>alert('Updated successfully!')</script>";
			} else {
				echo "<script type='text/javascript'>alert('failed!')</script>";

			}
}else{
	$sql="";
}
if (isset($_POST['submit2'])){
  $CID=$_POST['CID'];
  $value="readonly";
  $sql="SELECT * FROM customer WHERE CID=$CID";
  $result2=mysqli_query($connection,$sql);
	$array2=mysqli_fetch_array($result2);
  $firstname=$array2['CFName'];
  $lastname=$array2['CLName'];
  $add1=$array2['CAddress1'];
  $add2=$array2['CAddress2'];
  $add3=$array2['CAddress3'];
  $mail=$array2['CEmail'];
  $TP=$array2['CTPno'];
}else{
	$value="";
	$CID="";
	$firstname="";
	$lastname="";
	$add1="";
	$add2="";
	$add3="";
	$mail="";
	$TP="";
	$sql="";
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="../css/navmenu.css">
<link rel="stylesheet" href="../css/formbox.css">
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:450px;
        width: 600px;
    }
</style>
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="../img/logo.png"></p>
<h1 align="center"> Wood Arts Comapany Managment System</h1>
<?php
require_once('../process/menu.php');
echo $menu;
 ?>
 <div class="qbox">
 	<h2 align="center"><u>Query Box</U></h2>
 		<p><?php echo $sql; ?></p>
 </div>
<div class="box">
<h1 align="center">Update Customer Record</h1>
<form method ="POST" action="customer.php">
  <label for="CID">Customer ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
  <input name="CID" type="text" value="<?php echo $CID; ?>" <?php echo $value; ?>/>
  <button type="submit" name= "submit2" formmethod="post" formaction="customer.php">Search</button><br><br>
	<label for="fname">First Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input name="fname" type="text" value="<?php echo $firstname; ?>"/><br><br>
	<label for="lname">Last Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
	<input name="lname" type="text" value="<?php echo $lastname; ?>"/>
  <button name= "submit3" formaction="" onclick=" window.open('../process/allcustomer.php','',' scrollbars=yes,menubar=no,width=500, resizable=yes,toolbar=no,location=no,status=no')">Search By Name</button><br><br>
	<label for="AddressL1">Address line 01:&nbsp;</label>
	<input name="Address1" type="text" value="<?php echo $add1; ?>"/><br><br>
	<label for="AddressL2">Address line 02:&nbsp;</label>
	<input name="Address2" type="text" value="<?php echo $add2; ?>"/><br><br>
	<label for="AddressL3">Address line 03:&nbsp;</label>
	<input name="Address3" type="text" value="<?php echo $add3; ?>"/><br><br>
	<label for="Email">Email:</label>
	<input name="email" type="Email" value="<?php echo $mail; ?>"/>
	<label for="Phone">Phone Number:&nbsp;</label>
	<input name="phone" type="text" size="10" pattern="[0-9]{10}" value="<?php echo $TP; ?>"/><br><br>
        <p>
        <input name="submit" type="Submit" value="Update"/>
  </form>
 </div>
</body>
</html>
