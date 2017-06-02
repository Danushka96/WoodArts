<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
include_once('../inc/connection.php');
$OrderID=$_POST['OrderID'];
if (isset($_POST['submit'])){
	$query="DELETE FROM Orders WHERE OrderID='$OrderID'";
	$result=mysqli_query($connection,$query);
	if ($result){
		echo "<script type='text/javascript'>alert('Deleted successfully!')</script>";
 	} else {
	 	echo "<script type='text/javascript'>alert('failed!')</script>";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="../css/navmenu.css">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:150px;
        width: 300px;
    }
</style>
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">

<script type="text/javascript">
function deletecheck() {
	var ans=confirm("Are You Sure you want to Delete this Record?")
		if (ans){
			return true;
		}else{
			return false;
		}
}
</script>

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
<div class="box">
<h1 align="center">Delete Order </h1>
<form method ="post" onclick="deletecheck()" action="order.php">
      <label for="Order">Order ID:</label>
      <input name="OrderID" type="text" />
      <p align="center">
      <input name="submit" type="Submit" value="Delete"/>
  </form>
 </div>
</body>
</html>
