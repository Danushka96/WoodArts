<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
require_once('../inc/connection.php');
if (isset($_POST['submit2'])){
		$itemID=$_POST['itemID'];
		$sql="SELECT * FROM items WHERE ItemID='$itemID'";
		$result=mysqli_query($connection,$sql);
    $array=mysqli_fetch_array($result);
    $Itemname=$array['ItemName'];
    $price=$array['price'];
}else{
	$itemID="";
	$Itemname="";
	$price="";
	$sql="";
}
if (isset($_POST['submit'])){
  $ItemID=$_POST['itemID'];
  $ItemName=$_POST['itemname'];
  $Price=$_POST['price'];

  $query="UPDATE items SET ItemName='$ItemName', price='$Price' WHERE ItemID='$ItemID'";
  $result2=mysqli_query($connection,$query);
  if ($result2){
    echo "<script type='text/javascript'>alert('Updated successfully!')</script>";
  }else{
    echo "<script type='text/javascript'>alert('Error While Processing!')</script>";
		$sql=mysqli_error($connection);
  }

}

?>
<?php mysqli_close($connection); ?>

<!DOCTYPE html>
<html>
<head>
	<title>WoodArts Company</title>
<link rel="stylesheet" href="../css/navmenu.css">
<link rel="stylesheet" href="../css/formbox.css">
<link rel="shortcut icon" href="../img/favicon.ico" type="image/x-icon">
<style>
.box {
        background-color:#e0e0d1;
        color:black;
        font-weight:bold;
        margin:20px auto;
        height:270px;
        width: 600px;
    }
</style>
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
<h1 align="center">Update Item Record</h1>
<form method ="post" action="items.php" >
      <label for="itemID">Item ID:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input name="itemID" type="text" value="<?php echo $itemID ?>"/>
      <input type="submit" name="submit2" value="search"><br><br>
      <label for="itemname">Item Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input name="itemname" type="text" value="<?php echo $Itemname ?>"/><br><br>
      <label for="Price">Unit Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
      <input name="price" type="number" min="0" value="<?php echo $price ?>"/><br><br>

      <p>
      <input name="submit" type="Submit" value="Update"/>
      <input name="reset" type="reset" value="Clear Form">
  </form>
 </div>
</body>
</html>
