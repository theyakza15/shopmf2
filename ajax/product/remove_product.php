<?php
require 'connect.php';
$pd_id = $_POST["pd_id"];
$status = $_POST['status'];

date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d");

if($status==1){
$sql_pro = "UPDATE tb_product set status ='0' where pd_id ='$pd_id'";
$sql_productdetail = "UPDATE tb_produnt_detail set status = '0' where pd_id ='$pd_id'";
/* $sql_colordetail = "UPDATE tb_color_detail set status = '0' where pd_id ='$pd_id'";   */

}else{
$sql_pro = "UPDATE tb_product set status='1' where pd_id ='$pd_id'";
$sql_productdetail = "UPDATE tb_produnt_detail set status = '1' where pd_id ='$pd_id'";
/* $sql_colordetail = "UPDATE tb_color_detail set status = '1' where pd_id ='$pd_id'";  */
}
mysqli_query($conn, $sql_pro);
echo $sql_pro;

 mysqli_query($conn,$sql_productdetail);
echo $sql_productdetail;

/* mysqli_query($conn,$sql_colordetail);
echo $sql_colordetail; */

echo mysqli_error($conn);


//mysqli_query($conn,$sql_stock);