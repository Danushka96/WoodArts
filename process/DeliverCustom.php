<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: login/index.php");
}
$user=$_POST['CID'];
if (isset($user)){
  include_once('../inc/connection.php');
  $query="SELECT Orders.OrderID, customer.CFName, items.ItemName, Orders.Quantity, Orders.Dateissue, Orders.DeliverDate, Orders.Statues FROM Orders,customer,items WHERE Orders.CID=$user AND Orders.CID = customer.CID AND Orders.ItemID=items.ItemID ";
  if ($_SESSION['login_level']==3){
    header("location: ../error.html");
	}
  $result=mysqli_query($connection,$query);
  if(mysqli_num_rows($result)>0){
  	$str='';
  	while($row=mysqli_fetch_assoc($result)){
  		$str.="<tr><td>$row[OrderID]</td><td>$row[CFName]</td><td>$row[ItemName]</td><td>$row[Quantity]</td><td>$row[Dateissue]</td><td>$row[DeliverDate]</td><td>$row[Statues]</td></tr>";
  	}
  }else{
	$query=mysqli_error($connection);
}
}else{
	$query="";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="../css/navmenu.css">
<style>
.qbox {
				background-color:#659df7;
				border: 5px solid orange;
				color:black;
				margin-top: 10px;
				font-weight:bold;
				height:250px;
				width: 420px;
				float: left;
	}
</style>
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="../login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="img/logo.png"></p>
<h1 align="center"> Wood Arts Comapany Managment System</h1>
<?php
require_once('../process/menu.php');
echo $menu;
 ?>
 <div class="qbox">
 	<h2 align="center"><u>Query Box</U></h2>
 		<p><?php echo $query; ?></p>
 </div>
<h1 align="center">Deliver Details</h1>
<table border='2' align='center'>

  <tr>
    <th> Order ID</th>
    <th> First Name </th>
    <th> Item Name </th>
    <th> Quantity </th>
    <th> Date Issue </th>
    <th> Deliver Date </th>
    <th> Statues </th>
  </tr>
  <?php if(isset($str)) {echo $str;} ?>

</html>
