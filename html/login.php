<?php
//catch and save the posted form data from our index.html
$username=$_POST['username'];
$password=$_POST['password'];

//Setup a connection to our Database, fill with our own data
$host='localhost';
$uname='root';
$pass='';
$db='Login';

//lets connect to the Database
$connection=mysqli_connect(""$host","$uname","$pass","$db");

if (mysql_errno()) {
  echo "SORRY! Connection to the Database has failed";
}


//retrieve saved username and password from the database with compairing given username and passwords
$query ="select * from users where password='$password' AND username='$username'";
echo $query;
$result=mysqli_query($connection,$query);

//count Number of raws with given username and password, if 0 there's no user such that
$rows = mysqli_num_rows($result);
echo $rows;

if ($rows == 1){
  echo "Username and passwords are correct! You have Logged in";
}
else{
  echo "User name or password is incorrect! Please Try Again";
}

//close the connection with the database
mysqli_close($connection);
?>
