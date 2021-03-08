<?php
require 'connect.php';
$id = $_POST["id"];
$status=$_POST['status'];
$st_id  =$_POST['st_id'];
//echo "H".$amount;
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d");

if($status==1){
$sql_pro = "UPDATE tbl_stock set st_date='$d',st_status='0' where st_id ='$st_id'";
//$sql_stock = "UPDATE tbl_stock set st_date='$date',st_status='0' where st_id ='$st_id'";

}else{
    $sql_pro = "UPDATE tbl_stock set st_date='$d',st_status='1' where st_id ='$st_id'";


}
mysqli_query($conn,$sql_pro);
echo $sql_pro;
//mysqli_query($conn,$sql_stock);