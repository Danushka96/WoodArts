<?php
session_start();
$loginlevel=$_SESSION['login_level'];
if ($loginlevel==1){
  $permissionstat="<ol>
  <li><u><b>Add</u></b>
    <ul>
      <li><a href='/woodarts/add/addshowroom.php'> Add new Showroom </a></li>
      <li><a href='/woodarts/add/adduser.php'> Add New User </a></li>
      <li><a href='/woodarts/add/additem.php'> Add New Item </a></li>
      <li><a href='/woodarts/add/addcustomer.php'> Add New Customer </a></li>
      <li><a href='/woodarts/add/addorder.php'> Add New Order </a></li>
    </ul><br>
  </li>
  <li><u><b>Update</u></b>
    <ul>
      <li><a href='/woodarts/update/showroom.php'> Update Showroom info </a></li>
      <li><a href='/woodarts/update/item.php'> Update Item Details </a></li>
      <li><a href='/woodarts/update/customer.php'> Update Customer Deatils </a></li>
      <li><a href='/woodarts/update/order.php'> Update Order </a></li>
    </ul>
  </li><br>
  <li><u><b>Delete</u></b>
    <ul>
      <li><a href='/woodarts/delete/customer.php'> Delete a Customer </a></li>
      <li><a href='/woodarts/delete/order.php'> Delete an Order </a></li>
      <li><a href='/woodarts/delete/item.php'> Delete an Item </a></li>
      <li><a href='/woodarts/delete/showroom.php'> Delete a Showroom </a></li>
    </ul>
  </li><br>
  <li><u><b>View</u></b>
    <ul>
      <li><a href='/woodarts/items.php'> View Current Item Stock </a></li>
      <li><a href='/woodarts/deliver.php'> View Deliver Status </a></li>
      <li><a href='/woodarts/process/allcustomer.php'> View All cutomers </a></li>
    </ul>
  </li><br>
</ol>";

}else if ($loginlevel==2){
  $permissionstat="<ol>
  <li><u><b>Add</u></b>
    <ul>
      <li><a href='/woodarts/add/addcustomer.php'> Add New Customer </a></li>
      <li><a href='/woodarts/add/addorder.php'> Add New Order </a></li>
    </ul><br>
  </li>
  <li><u><b>Update</u></b>
    <ul>
      <li><a href='/woodarts/update/item.php'> Update Item Details </a></li>
      <li><a href='/woodarts/update/customer.php'> Update Customer Deatils </a></li>
      <li><a href='/woodarts/update/order.php'> Update Order </a></li>
    </ul>
  </li><br>
  <li><u><b>Delete</u></b>
    <ul>
      <li>No Permission To Delete
    </ul>
  </li><br>
  <li><u><b>View</u></b>
    <ul>
      <li>Limited Permision</li>
    </ul>
  </li><br>
</ol>";

}else{
  $permissionstat="<ol>
  <li><u><b>Add</u></b>
    <ul>
      <li><a href='/woodarts/add/additem.php'> Add New Item </a></li>
    </ul><br>
  </li>
  <li><u><b>Update</u></b>
    <ul>
      <li><a href='/woodarts/update/item.php'> Update Item Details </a></li>
      <li><a href='/woodarts/process/update/deliver.php'> Update Deliver Status </a></li>
      <li><a href='/woodarts/update/updateqty.php'> Update Stock Quantity </a></li>
    </ul>
  </li><br>
  <li><u><b>Delete</u></b>
    <ul>
      <li><a href='/woodarts/delete/item.php'> Delete an Item </a></li>
    </ul>
  </li><br>
  <li><u><b>View</u></b>
    <ul>
      <li><a href='/woodarts/items.php'> View Current Item Stock </a></li>
      <li><a href='/woodarts/deliver.php'> View Deliver Status </a></li>
    </ul>
  </li><br>
</ol>";
}




 ?>
