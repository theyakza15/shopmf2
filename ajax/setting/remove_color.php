<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$co_id = $_POST["co_id"];
$status = $_POST['status'];
$empid = $_SESSION['emp_id'];
if($status==1){
$sql_type = "UPDATE tb_color set  status ='0' where co_id ='$co_id'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการยกเลิกข้อมูลสี','$d ')";

}else{
    $sql_type = "UPDATE tb_color set status='1' where co_id ='$co_id'";
    $sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
    VALUES('$empid','ได้ทำการยกเลิกการระงับข้อมูลสี','$d ')";
    

}


mysqli_query($conn, $sql_log);


if(mysqli_query($conn,$sql_type)){
    echo $sql_type;
}else{
    echo mysqli_error($conn);
}
