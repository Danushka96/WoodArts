<?php
session_start();
if (!isset($_SESSION['login_user'])){
	header("location: ../login/index.php");
}
if ($_SESSION['login_level']!=1){
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
<p align="Center"><u>Enter Customer Details</u></p>
<form method="post" action="allcustomer.php">
	<p align = "Center">
	<lable for="fname">First Name: </lable>
	<input name="fname" type="text" /></br></br>
	<lable for="lname">Last Name: </lable>
	<input name="lname" type="text" />
<br></br>
	<input name="submit" type="Submit" Value="Search">
</p>
</body>
</html>
<?php
if (isset($_POST['fname']) || isset($_POST['lname'])){
echo "<table style='border: solid 2px black;'>";
echo "<tr><th>Customer ID</th><th>First Name</th><th>Lastname</th><th>TP No</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return  "<td style='width:150px;border:2px solid black;'>" . parent::current().  "</td>";
    }

    function beginChildren() {
        echo  "<tr>";
    }

    function endChildren() {
        echo  "</tr>" .  "\n";
    }
}

$servername = "localhost";
$username = "user";
$password = "Danu9696";
$dbname = "woodsart";

//create variables

$fname=$_POST['fname'];
$lname=$_POST['lname'];
 try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT CID,CFName,CLName,CTPno FROM customer where CFName LIKE '%$fname%' and CLName like '%$lname%'");
    $stmt->execute();

    "color:green">// set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
}
?>
