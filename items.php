<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: login/index.php");
}
include_once('inc/connection.php');
$query="SELECT * FROM items";
$result=mysqli_query($connection,$query);
if(mysqli_num_rows($result)>0){
	$str='';
	while($row=mysqli_fetch_assoc($result)){
		$str.="<tr><td>$row[ItemID]</td><td>$row[ItemName]</td><td>$row[price]</td><td>$row[type]</td><td>$row[Quantity]</td></tr>";
	}
}else{
	$query=mysqli_error($connection);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="css/navmenu.css">
<link rel="stylesheet" href="css/formbox.css">
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="img/logo.png"></p>
<h1 align="center"> Wood Arts Comapany Managment System</h1>
<?php
require_once('process/menu.php');
echo $menu;
 ?>
 <div class="qbox">
 	<h2 align="center"><u>Query Box</U></h2>
 		<p><?php echo $query; ?></p>
 </div>
<h1 align="center">Available Items and Quantity</h1>


<table caption='All available Items' border='2' align='center' style="width:800px">
	<tr>
		<th>Item ID</th>
		<th>Item Name</th>
		<th> Price </th>
		<th> Type </th>
		<th> Quantity </th>
	</tr>
	<?php if(isset($str)) {echo $str;} ?>
</table>

 </div>
</body>
</html>
