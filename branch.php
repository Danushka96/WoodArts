<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: login/index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="css/navmenu.css">
<link rel="stylesheet" href="css/button.css">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:150px;
        width: 350px;
    }
</style>
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href=" login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="img/logo.png"></p>
<h1 align="center"> Wood Arts Comapany Managment System</h1>
<?php
require_once('process/menu.php');
echo $menu;
 ?>
<p align="center">
<br><br><br>
<button class="buttonred button3" onclick=" window.open('add/newbranch.php')">Add New Showroom</button>
<button class="buttongreen button3" onclick=" window.open('update/updatebranch.php','',' scrollbars=yes,menubar=no,width=500,height=800 resizable=yes,toolbar=no,location=no,status=no')">Update Showroom Info</button>
</p>
 </div>
</body>
</html>
