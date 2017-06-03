<?php
session_start();
$branch=$_SESSION['user_branch'];
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
if ($_SESSION['login_level']==3){
  echo "Access Denied";
	header("location: ../error.html");
}
include_once('../inc/connection.php');
if (isset($POST['OrderID']) || isset($_POST['status'])){
  $ID=$_POST['OrderID'];
  $stat=$_POST['status'];
	$recieved=$_POST['DateRecieve'];
  $query="update Orders Set Statues='$stat', RecivedDate='$recieved' where OrderID='$ID'";
  $result=mysqli_query($connection,$query);
  if ($result){
    echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
  }else{
    echo "<script type='text/javascript'>alert('failed!')</script>";
		$query=mysqli_error($connection);
  }
  mysqli_close($connection);
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
	        width: 420px;
	  }
	</style>
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="../login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="../img/logo.png" width='110' height='100'></p>
<p align="Center"><u>Update Delivery Statues</u></p>
<form method="post" action="updatedeliver.php">
	<p align = "Center">
	<lable for="OrderID">Order ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </lable>
	<input name="OrderID" type="text" /></br></br>
	<lable for="Statues">Change Statues:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </lable>
	<select name="status">
    <option value="Delivered">Delivered</option>
    <option value="Undelivered">Undelivered</option>
  </select><br><br>
	<lable for="DateRecive">Delivered Date: </lable>
	<input type="Date" name="DateRecieve"/>
<br></br>
	<input name="submit" type="Submit" Value="Update">
</p>
<div class="qbox">
	<h2 align="center"><u>Query Box</U></h2>
		<p><?php echo $query; ?></p>
</div>

</body>
</html>
