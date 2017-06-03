<?php

$loginlevel=$_SESSION['login_level'];
if ($loginlevel==1){
  $menu="
  <div class='container'>
  	<a class='active' href='/woodarts/index.php'>Home</a>
  	<div class='dropdown'>
      <button class='dropbtn'>Add Record</button>
      <div class='dropdown-content'>
        <a href='/woodarts/add/addcustomer.php'>Add a Customer</a>
        <a href='/woodarts/add/additem.php'>Add an Item</a>
        <a href='/woodarts/add/addorder.php'>Add a Order</a>
        <a href='/woodarts/add/newbranch.php'>Add New Showroom</a>
      </div>
    </div>
    <div class='dropdown'>
      <button class='dropbtn'>Update Record</button>
      <div class='dropdown-content'>
        <a href='/woodarts/update/items.php'>Update an Item</a>
        <a href='/woodarts/update/customer.php'>Update Customer</a>
      </div>
    </div>
    <div class='dropdown'>
      <button class='dropbtn'>Delete Record</button>
      <div class='dropdown-content'>
        <a href='/woodarts/delete/item.php'>delete an Item</a>
        <a href='/woodarts/delete/customer.php'>delete Customer</a>
        <a href='/woodarts/delete/order.php'>delete Order</a>
        <a href='/woodarts/delete/showroom.php'>delete Showroom</a>
      </div>
    </div>
    <div class='dropdown'>
      <button class='dropbtn'>Manage Stock</button>
      <div class='dropdown-content'>
        <a href='/woodarts/items.php'>View Stock</a>
        <a href='/woodarts/update/updateqty.php'>Update Quantity</a>
      </div>
    </div>
    <a href='/woodarts/view/factory.php'>Factory Status</a>
  	<a href='/woodarts/deliver.php'>Deliver Status</a>
  	<a href='/woodarts/process/allcustomer.php' target=blank>All Customers</a>
  	<a href='/woodarts/branch.php'>Show room Info</a>
  	<a href='/woodarts/backup/index.php'>Backup/Restore</a>
  </div>";

}else if ($loginlevel==2){
  $menu="
  <div class='container'>
  	<a class='active' href='/woodarts/index.php'>Home</a>
  	<div class='dropdown'>
      <button class='dropbtn'>Add Record</button>
      <div class='dropdown-content'>
        <a href='/woodarts/add/addcustomer.php'>Add a Customer</a>
        <a href='/woodarts/add/addorder.php'>Add a Order</a>
      </div>
    </div>
    <div class='dropdown'>
      <button class='dropbtn'>Update Record</button>
      <div class='dropdown-content'>
        <a href='/woodarts/update/item.php'>Update an Item</a>
        <a href='/woodarts/update/customer.php'>Update Customer</a>
      </div>
    </div>
  	<a href='/woodarts/deliver.php'>Deliver Status</a>
  	<a href='/woodarts/branch.php'>Showroom Info</a>
  </div>";
}else{
  $menu="
  <div class='container'>
  	<a class='active' href='/woodarts/index.php'>Home</a>
  	<div class='dropdown'>
      <button class='dropbtn'>Add Record</button>
      <div class='dropdown-content'>
        <a href='/woodarts/add/additem.php'>Add an Item</a>
      </div>
    </div>
    <div class='dropdown'>
      <button class='dropbtn'>Update Record</button>
      <div class='dropdown-content'>
        <a href='/woodarts/update/items.php'>Update an Item</a>
        <a href='/woodarts/update/order.php'>Update Order</a>
      </div>
    </div>
    <div class='dropdown'>
      <button class='dropbtn'>Manage Stock</button>
      <div class='dropdown-content'>
        <a href='/woodarts/items.php'>View Stock</a>
        <a href='/woodarts/update/updateqty.php'>Update Quantity</a>
      </div>
    </div>
    <a href='/woodarts/view/factory.php'>Factory Status</a>
  	<a href='/woodarts/deliver.php'>Deliver Status</a>
  </div>";
}

 ?>
