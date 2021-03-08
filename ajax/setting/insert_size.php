<?php
//Run id
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$size_id=$_POST['size_id'];
$size_name=$_POST['size_name'];
$empid = $_SESSION['emp_id'];
?>
<?php


@session_start();
$sql_type = "INSERT INTO tb_size(si_id,si_name,status)
   VALUES('$size_id','$size_name','1')";
   $sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
   VALUES('$empid','ได้ทำการเพิ่มข้อมูลไซส์','$d ')";
   
   mysqli_query($conn, $sql_log);

if (mysqli_query($conn, $sql_type)) {

} else {
    echo mysqli_error($conn);

} 
?>