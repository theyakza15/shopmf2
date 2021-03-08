<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$si_id = $_POST["si_id"];
$status = $_POST['status'];
$empid = $_SESSION['emp_id'];
if($status==1){
$sql_type = "UPDATE tb_size set  status ='0' where si_id ='$si_id'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการยกเลิกข้อมูลไซส์','$d ')";

}else{
    $sql_type = "UPDATE tb_size set status='1' where si_id ='$si_id'";
    $sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
    VALUES('$empid','ได้ทำการยกเลิกการระงับข้อมูลไซส์','$d ')";

}
mysqli_query($conn, $sql_log);
if(mysqli_query($conn,$sql_type)){
    echo $sql_type;
}else{
    echo mysqli_error($conn);
}
