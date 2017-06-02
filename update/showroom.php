<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}

$showroom=$_POST['branch'];
require_once('../inc/connection.php');
$sql="SELECT * FROM showrooms WHERE BranchID=$showroom";
$search=mysqli_query($connection,$sql);
$result=mysqli_fetch_array($search);

$District=$result['District'];
$Address1=$result['Address1'];
$Address2=$result['Address2'];
$Address3=$result['Address3'];
$TP=$result['PhoneNo'];

?>
<html>
<head>
<title>Wood Arts Company</title>
<link rel="stylesheet" href="../css/navmenu.css">
<link rel="stylesheet" href="../css/button.css">
  <style>
  .box {
          background-color:#e0e0d1;
          color:black;
          font-weight:bold;
          margin:20px auto;
          height:350px;
          width: 500px;
      }
    </style>
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="../login/logout.php">Log Out</a></b>
	</div>
  <p align="center"><img src="../img/logo.png" width='110' height='100'></p>

<div class='box'>
<p align="Center"><u>Update Showroom Details</u></p>
<form method="post" action='updatephpshowroom.php'>
  <lable for='showroomid'>Showroom ID</lable>
  <input name='showroomid' type="text" value="<?php echo $showroom; ?>" readonly></br></br>
  <lable for="District">District:</label>
  <input name="District" type="Text" value="<?php echo $District; ?>"></br></br>
  <lable for="AddressL1">Address Line 01:</label>
  <input name="AddressL1" type="Text" value="<?php echo $Address1; ?>"></br></br>
  <lable for="AddressL2">Address Line 02:</label>
  <input name="AddressL2" type="Text" value="<?php echo $Address2; ?>"></br></br>
  <lable for="AddressL3">Address Line 03:</label>
  <input name="AddressL3" type="Text" value="<?php echo $Address3; ?>"></br></br>
  <lable for="TP">Contact Number:</label>
  <input name="TPNo" type="Text" value="<?php echo $TP ?>"></br></br>
  <p>
    <input name="submit" type="Submit" value="Update"/>
  </form>
</div>
</body>
</html>
