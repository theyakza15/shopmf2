<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$emp_id = $_POST["emp_id"];
$status = $_POST['status'];
$empid = $_SESSION['emp_id'];
if($status==1){
$sql_type = "UPDATE tb_permissions set  status ='0' where emp_id ='$emp_id'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการยกเลิกสิทธิ์','$d ')";

}else{
    $sql_type = "UPDATE tb_permissions set status='1' where emp_id ='$emp_id'";
    $sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
    VALUES('$empid','ได้ทำการยกเลิกการระงับสิทธิ์','$d ')";

}
mysqli_query($conn, $sql_log);
if(mysqli_query($conn,$sql_type)){
    echo $sql_type;
}else{
    echo mysqli_error($conn);
}
