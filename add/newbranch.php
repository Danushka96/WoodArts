<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
include_once('../inc/connection.php');
if (isset($_POST['submit'])){
  $district=$_POST['District'];
  $address1=$_POST['AddressL1'];
  $address2=$_POST['AddressL2'];
  $address3=$_POST['AddressL3'];
  $phone=$_POST['phone'];

  $sql="INSERT INTO showrooms (District, Address1, Address2, Address3, PhoneNo) VALUES ('$district', '$address1', '$address2', '$address3', '$phone')";
  $result=mysqli_query($connection,$sql);
  if ($result) {
       echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    } else {
      echo "<script type='text/javascript'>alert('failed!')</script>";
			$sql=mysqli_error($connection);
    }
}else{
	$sql="";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="../css/navmenu.css">
<link rel="stylesheet" href="../css/button.css">
<link rel="stylesheet" href="../css/formbox.css">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:350px;
        width: 450px;
    }
</style>
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="../login/logout.php">Log Out</a></b>
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
  <h2 align='center'>Add New Showroom</h2>
  <form method="post" action="newbranch.php">
  <lable for="District">District:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable>
  <input type="text" name="District"><br><br>
  <lable for="Addressl1">Address Line 1:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable>
  <input type="text" name="AddressL1"><br><br>
  <lable for="Addressl2">Address Line 2:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable>
  <input type="text" name="AddressL2"><br><br>
  <lable for="Addressl3">Address Line 3:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</lable>
  <input type="text" name="AddressL3"><br><br>
  <lable for="phone">Telephone Number:</lable>
  <input type="number" name="phone" size="10"><br><br>
  <input name="submit" type="submit" value="Add">
</form>

</div>


</body>
</html>
