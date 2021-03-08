<?php
require 'connect.php';
$pd_id = $_POST["co_id_det"];
$status = $_POST['status'];

date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d");

if($status==1){
$sql_pro = "UPDATE tb_color_detail set status ='0' where id_color_det ='$pd_id'";
 

}else{
$sql_pro = "UPDATE tb_color_detail set status='1' where id_color_det ='$pd_id'";
  

}
mysqli_query($conn, $sql_pro);
echo $sql_pro;

echo mysqli_error($conn);