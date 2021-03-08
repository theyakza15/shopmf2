<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$dis_id = $_POST["dis_id"];
$status = $_POST['status'];
$empid = $_SESSION['emp_id'];
if($status==1){
$sql_type = "UPDATE discount set  status_dis ='0' where dis_id ='$dis_id'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการยกเลิกส่วนลด','$d ')";

}else{
    $sql_type = "UPDATE discount set status_dis ='1' where dis_id ='$dis_id'";
    $sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
    VALUES('$empid','ได้ทำการยกเลิกการระงับส่วนลด','$d ')";

}
mysqli_query($conn, $sql_log);

mysqli_query($conn, $sql_type);
echo $sql_type;



 
