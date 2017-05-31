<?php
$branch=$_SESSION['user_branch'];
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
	$query="SELECT OrderID,CID,Dateissue,DeliverDate,Statues FROM `Orders` WHERE Statues='delivered';";
}else{
	$query="SELECT OrderID,CID,Dateissue,DeliverDate,Statues FROM `Orders` WHERE Statues='delivered' AND BranchID='$branch';";
}
$result=mysqli_query($connection,$query);

if(mysqli_num_rows($result)>0){
	$str='';
	while($row=mysqli_fetch_assoc($result)){
		$str.="<tr><td>$row[OrderID]</td><td>$row[CID]</td><td>$row[Dateissue]</td><td>$row[DeliverDate]</td><td>$row[Statues]</td></tr>";
	}
}

?>
<html>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="../login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="img/logo.png" width='110' height='100'></p>
<p align="Center">Delivered Orders Of Your Branch </p>

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

</body>
</html>
