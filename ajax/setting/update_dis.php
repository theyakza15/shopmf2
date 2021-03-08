<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$dis_id = $_POST["dis_id"];
$dis_name = $_POST['dis_name'];
$dis_pro_dis = $_POST['dis_pro_dis'];
$dis_am_dis = $_POST['dis_am_dis'];
$empid = $_SESSION['emp_id'];

$sql_type = "UPDATE discount set discount='$dis_name',pd_id = '$dis_pro_dis',amount_pro='$dis_am_dis' where dis_id ='$dis_id' AND status_dis ='1'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการแก้ไขข้อมูลส่วนลด','$d ')";

mysqli_query($conn, $sql_log);

if(mysqli_query($conn,$sql_type)){
    echo "OK";
}else{
   echo mysqli_error($conn);
}
