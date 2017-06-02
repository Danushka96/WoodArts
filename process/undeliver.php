<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
if ($_SESSION['login_level']==3){
  echo "Access Denied";
	header("location: ../error.html");
}
include_once('../inc/connection.php');
if ($_SESSION['login_level']==1){
	$query="SELECT OrderID,CID,Dateissue,DeliverDate,Statues FROM `Orders` WHERE Statues='undelivered';";
}else{
	$query="SELECT OrderID,CID,Dateissue,DeliverDate,Statues FROM `Orders` WHERE Statues='undelivered' AND BranchID='$branch';";
}
$result=mysqli_query($connection,$query);

if(mysqli_num_rows($result)>0){
	$str='';
	while($row=mysqli_fetch_assoc($result)){
		$str.="<tr><td>$row[OrderID]</td><td>$row[CID]</td><td>$row[Dateissue]</td><td>$row[DeliverDate]</td><td>$row[Statues]</td></tr>";
	}
}else{
	$query=mysqli_error($connection);
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
<p align="center"><img src="img/logo.png" width='110' height='100'></p>
<p align="Center">Undelivered Orders Of Your Branch </p>

<p align='center'>
<table border='2'>
	<tr>
		<th>Order ID</th>
		<th>Customer ID</th>
		<th>Date issue</th>
		<th>Deliver Date</th>
		<th>Statues</th>
	</tr>
	<?php if(isset($str)) {echo $str;} ?>
</p>
<div class="qbox">
	<h2 align="center"><u>Query Box</U></h2>
		<p><?php echo $query; ?></p>
</div>

</body>
</html>
