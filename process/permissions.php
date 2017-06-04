<?php
$loginlevel=$_SESSION['login_level'];
if ($loginlevel==1){
  $permissionstat="<ol>
  <li><u><b>Add</u></b>
    <ul>
      <li><a href='add/newbranch.php'> Add new Showroom </a></li>
      <li><a href='add/additem.php'> Add New Item </a></li>
      <li><a href='add/addcustomer.php'> Add New Customer </a></li>
      <li><a href='add/addorder.php'> Add New Order </a></li>
    </ul><br>
  </li>
  <li><u><b>Update</u></b>
    <ul>
      <li><a href='update/updatebranch.php'> Update Showroom info </a></li>
      <li><a href='update/items.php'> Update Item Details </a></li>
      <li><a href='update/customer.php'> Update Customer Deatils </a></li>
      <li><a href='deliver.php'> Update Deliver Status </a></li>
    </ul>
  </li><br>
  <li><u><b>Delete</u></b>
    <ul>
      <li><a href='delete/customer.php'> Delete a Customer </a></li>
      <li><a href='delete/order.php'> Delete an Order </a></li>
      <li><a href='delete/item.php'> Delete an Item </a></li>
      <li><a href='delete/showroom.php'> Delete a Showroom </a></li>
    </ul>
  </li><br>
  <li><u><b>View</u></b>
    <ul>
      <li><a href='items.php'> View Current Item Stock </a></li>
      <li><a href='deliver.php'> View Deliver Status </a></li>
      <li><a href='process/allcustomer.php'> View All cutomers </a></li>
      <li><a href='/woodarts/view/factory.php'>Factory Status</a></li>
      <li><a href='/woodarts/view/opercus.php'>View Customers AS Operator</a></li>
    </ul>
  </li><br>
</ol>";

}else if ($loginlevel==2){
  $permissionstat="<ol>
  <li><u><b>Add</u></b>
    <ul>
      <li><a href='add/addcustomer.php'> Add New Customer </a></li>
      <li><a href='add/addorder.php'> Add New Order </a></li>
      <li><a href='add/newbranch.php' style='color:red'> Add new Showroom </a></li>
      <li><a href='add/additem.php' style='color:red'> Add New Item </a></li>
    </ul><br>
  </li>
  <li><u><b>Update</u></b>
    <ul>
      <li><a href='update/updatebranch.php' style='color:red'> Update Showroom info </a></li>
      <li><a href='update/items.php'> Update Item Details </a></li>
      <li><a href='update/customer.php'> Update Customer Deatils </a></li>
      <li><a href='deliver.php' style='color:red'> Update Deliver Status </a></li>
    </ul>
  </li><br>
  <li><u><b>Delete</u></b>
    <ul>
      <li><a href='delete/customer.php' style='color:red'> Delete a Customer </a></li>
      <li><a href='delete/order.php' style='color:red'> Delete an Order </a></li>
      <li><a href='delete/item.php' style='color:red'> Delete an Item </a></li>
      <li><a href='delete/showroom.php' style='color:red'> Delete a Showroom </a></li>
    </ul>
  </li><br>
  <li><u><b>View</u></b>
    <ul>
      <li><a href='items.php' style='color:red'> View Current Item Stock </a></li>
      <li><a href='deliver.php' style='color:red'> View Deliver Status </a></li>
      <li><a href='process/allcustomer.php' style='color:red'> View All cutomers </a></li>
      <li><a href='/woodarts/view/factory.php' style='color:red'>Factory Status</a></li>
    </ul>
  </li><br>
</ol>";

}else{
  $permissionstat="<ol>
  <li><u><b>Add</u></b>
    <ul>
      <li><a href='add/addcustomer.php' style='color:red'> Add New Customer </a></li>
      <li><a href='add/addorder.php' style='color:red'> Add New Order </a></li>
      <li><a href='add/newbranch.php' style='color:red'> Add new Showroom </a></li>
      <li><a href='add/additem.php'> Add New Item </a></li>
    </ul><br>
  </li>
  <li><u><b>Update</u></b>
    <ul>
      <li><a href='update/updatebranch.php' style='color:red'> Update Showroom info </a></li>
      <li><a href='update/items.php' style='color:red'> Update Item Details </a></li>
      <li><a href='deliver.php'> Update Deliver Status </a></li>
      <li><a href='update/updateqty.php'> Update Stock Quantity </a></li>
    </ul>
  </li><br>
  <li><u><b>Delete</u></b>
    <ul>
      <li><a href='delete/item.php'> Delete an Item </a></li>
      <li><a href='delete/customer.php' style='color:red'> Delete a Customer </a></li>
      <li><a href='delete/order.php' style='color:red'> Delete an Order </a></li>
      <li><a href='delete/showroom.php' style='color:red'> Delete a Showroom </a></li>
    </ul>
  </li><br>
  <li><u><b>View</u></b>
    <ul>
      <li><a href='items.php'> View Current Item Stock </a></li>
      <li><a href='deliver.php'> View Deliver Status </a></li>
      <li><a href='process/allcustomer.php' style='color:red'> View All cutomers </a></li>
      <li><a href='/woodarts/view/factory.php'>Factory Status</a></li>
    </ul>
  </li><br>
</ol>";
}

 ?>
