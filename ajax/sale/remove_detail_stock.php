<?php
require 'connect.php';
$id = $_POST["id"];
$status= $_POST['status'];


date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d");
if($status==1){
    $sql_pd = "UPDATE tb_stock_detail set status='0' where id_st ='$id'";

    $sql_pd2 = "UPDATE tb_stock set status='0' where st_id ='$id'";
}else{
    $sql_pd = "UPDATE tb_stock_detail set status='1' where id_st ='$id'";

    $sql_pd2 = "UPDATE tb_stock set status='1' where st_id ='$id'";
}
if (mysqli_query($conn, $sql_pd) && mysqli_query($conn,$sql_pd2)) {
     echo $status;
} else {
   echo mysqli_error($conn);
}
