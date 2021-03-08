<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$ty_id = $_POST["ty_id"];
$ty_name = $_POST['ty_name'];
$empid = $_SESSION['emp_id'];

$sql_type = "UPDATE tb_type set ty_name='$ty_name' where ty_id ='$ty_id'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการแก้ไขประเภท','$d ')";
mysqli_query($conn, $sql_log);
if(mysqli_query($conn,$sql_type)){
    echo "OK";
}else{
   echo mysqli_error($conn);
}
