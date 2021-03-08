<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$ty_id = $_POST["ty_id"];
$status = $_POST['status'];
$empid = $_SESSION['emp_id'];
if($status==1){
$sql_type = "UPDATE tb_type set  status ='0' where ty_id ='$ty_id'";
 $sql_typegr = "UPDATE tb_group set status = '0' where ty_id ='$ty_id'"; 
 $sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
 VALUES('$empid','ได้ทำการยกเลิกประเภท','$d ')";
}else{
    $sql_type = "UPDATE tb_type set status='1' where ty_id ='$ty_id'";
     $sql_typegr = "UPDATE tb_group set status = '1' where ty_id ='$ty_id'"; 

}$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการยกเลิกการระงับประเภท','$d ')";


mysqli_query($conn, $sql_log);
mysqli_query($conn, $sql_type);
echo $sql_type;

mysqli_query($conn,$sql_typegr);
echo $sql_typegr;

 
