<?php
require 'connect.php';
$id = $_POST["id"];
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d");

$sql = "SELECT st_id,sal_id,amount FROM tbl_detail WHERE sal_id='$id'";
$result=mysqli_query($conn,$sql);
echo $sql;
while ($row=$result->fetch_assoc()) {
    $amount = $row['amount'];
    $st_id = $row['st_id'];
    $select = "SELECT * FROM tbl_stock WHERE st_id='$st_id'";
    $res=mysqli_query($conn,$select);
    $rows=$res->fetch_assoc();
    $st_amount = $rows['st_amount'];
    $am = $amount+$st_amount;
     $update_stock = "UPDATE tbl_stock set st_amount='$am' where st_id ='$st_id'";
    mysqli_query($conn,$update_stock); 
    $re_detail = "UPDATE tbl_detail set dt_status='0' WHERE sal_id='$id'";
    mysqli_query($conn,$re_detail);

}
    $sql_pro = "UPDATE tbl_sale set sal_status='0' where sal_id ='$id'";
//$sql_stock = "UPDATE tbl_stock set st_date='$date',st_status='0' where st_id ='$st_id'";



mysqli_query($conn, $sql_pro);

