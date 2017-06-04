<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
include_once('../inc/connection.php');
if (isset($_POST['submit'])){
	$CID=$_POST['CID'];
	$query="DELETE FROM customer WHERE CID='$CID'";
	$result=mysqli_query($connection,$query);
	if ($result){
		echo "<script type='text/javascript'>alert('Deleted successfully!')</script>";
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
<link rel="stylesheet" href="../css/formbox.css">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:150px;
        width: 340px;
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
 <div class="qbox">
 	<h2 align="center"><u>Query Box</U></h2>
 		<p><?php echo $sql; ?></p>
 </div>
<div class="box">
<h1 align="center">Delete Customer </h1>
<form method ="post" action="customer.php">
      <label for="CID">Customer ID:</label>
      <input name="CID" type="text" />
      <p align="center">
      <input name="submit" type="Submit" onclick="deletecheck()" value="Delete"/>
  </form>
 </div>
</body>
</html>
