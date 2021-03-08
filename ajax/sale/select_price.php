<?php
require('connect.php');
$id = $_POST['id'];
$sql= "SELECT pm_price FROM tbl_promotion WHERE pm_id='$id'";
$result=mysqli_query($conn,$sql);
$row=$result->fetch_assoc();
echo $row['pm_price'];