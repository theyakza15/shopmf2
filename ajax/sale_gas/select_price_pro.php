<?php
require('connect.php');
$id = $_POST['id'];
$sql= "SELECT pro_price FROM tbl_product WHERE pro_id='$id'";
$result=mysqli_query($conn,$sql);
$row=$result->fetch_assoc();
echo $row['pro_price'];