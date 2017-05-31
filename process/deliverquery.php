<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
if ($_SESSION['login_level']==3){
  echo "Access Denied";
	header("location: ../error.html");
}
?>
<html>
<body>
	<div id="profile">
		<b id="welcome">User : <i><?php echo $_SESSION['login_user']; ?></i></b>
		<b id="logout"><a href="../login/logout.php">Log Out</a></b>
	</div>
<p align="center"><img src="img/logo.png" width='110' height='100'></p>
<?php
$cid=$_POST['CID'];
echo $cid;
//methana Query ekak dala customer id eken search wenna eeta passe if command ekakin check karahan deliverda undeliverda kiyala
 ?>
<p align="Center">Query Product Deliver States </p>

</body>
</html>
