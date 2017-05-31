<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
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
<h1 align="center">Enter Item </h1>
<form method ="post" target="_blank">
      <label for="ItemID">Item ID:</label>
      <input name="ItemID" type="text" />
      <p align="center">
      <input name="submitin" formaction="../process/stockin.php" type="Submit" value="IN"/>
      <input name="submitout" formaction="../process/stockout.php" type="submit" value="OUT">
  </form>
 </div>
</body>
</html>
