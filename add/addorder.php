<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
?>
<?php
require_once('../inc/connection.php');
if (isset($_POST['submit'])){
		$itemid=$_POST['itemID'];
    $client=$_POST['clientID'];
		$branch=$_SESSION['user_branch'];
		$qty=$_POST['qty'];
		$date=$_POST['date'];
		$ddate=$_POST['ddate'];

		$sql="INSERT INTO Orders (CID, ItemID, BranchID, Quantity, Dateissue, DeliverDate) VALUES ('$client', '$itemid', '$branch', '$qty', '$date', '$ddate')";
		$result=mysqli_query($connection,$sql);
		if ($result) {
				 echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
			} else {
				echo "<script type='text/javascript'>alert('failed!')</script>";
				$sql=mysqli_error($connection);
			}
}
if (isset($_POST['submit2'])){
	$item=$_POST['itemID'];
	$clients=$_POST['clientID'];
	$qnty=$_POST['qty'];

	$search="SELECT Quantity from items where itemID=$item";
	$result2=mysqli_query($connection,$search);
	$array2=mysqli_fetch_array($result2);
	$quantity2=$array2['Quantity'];
	if($qnty>$quantity2){
		$date=Date('20y-m-d', strtotime("+30 days"));
	}else{
		$date=Date('20y-m-d', strtotime("+3 days"));
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
        height:360px;
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
<h1 align="center">Add New Order Record</h1>
<form method ="post" action="addorder.php" >
      <label for="itemID">Item ID:</label>
      <input name="itemID" type="text" value="<?php echo $item; ?>"/>
      <label for="clientID">Client ID:</label>
      <input name="clientID" type="text" value="<?php echo $clients; ?>"/><br><br>
      <label for="qty">Quantity:</label>
      <input name="qty" type="number" size="6" value="<?php echo $qnty; ?>"/><br><br>
      <label for="date">Order placed Date:</label>
      <input name="date" type="date" value="<?php echo date('20y-m-d');?>"/><br><br>
			<label for="ddate">Can Deliver on:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
      <input name="ddate" type="date" value="<?php echo $date;?>" readonly/>
			 <button type="submit" name= "submit2" formmethod="post" formaction="addorder.php">Calculate</button>
			<br><br>
      <p>
      <input name="submit" type="Submit" value="Add"/>
      <input name="reset" type="reset" value="Clear Form">
  </form>
	<input name="Search" type="submit" value="Search Customer ID" onclick=" window.open('../process/allcustomer.php','',' scrollbars=yes,menubar=no,width=500, resizable=yes,toolbar=no,location=no,status=no')" />
 </div>
</body>
</html>
