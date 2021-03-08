<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$emp_id = $_POST["emp_id"];
$per_type = $_POST['per_type'];
$empid = $_SESSION['emp_id'];


$sql_type = "UPDATE tb_permissions set type_per='$per_type' where emp_id ='$emp_id'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการแก้ไขสิทธิ์','$d ')";

mysqli_query($conn, $sql_log);
if(mysqli_query($conn,$sql_type)){
    echo "OK";
}else{
   echo mysqli_error($conn);
}
?>