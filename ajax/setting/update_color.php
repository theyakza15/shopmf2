<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$co_id = $_POST["co_id"];
$co_name = $_POST['co_name'];
$empid = $_SESSION['emp_id'];

$sql_type = "UPDATE tb_color set co_name='$co_name' where co_id ='$co_id'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการแก้ไขข้อมูลสี','$d ')";


mysqli_query($conn, $sql_log);

if(mysqli_query($conn,$sql_type)){
    echo "OK";
}else{
   echo mysqli_error($conn);
}
