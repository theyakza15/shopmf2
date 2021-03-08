<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$si_id = $_POST["si_id"];
$si_name = $_POST['si_name'];


$sql_type = "UPDATE tb_size set si_name='$si_name' where si_id ='$si_id'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการแก้ไขข้อมูลไซส์','$d ')";

mysqli_query($conn, $sql_log);
if(mysqli_query($conn,$sql_type)){
    echo "OK";
}else{
   echo mysqli_error($conn);
}
