
<?php
//Run id
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$type_id=$_POST['type_id'];
$type_name=$_POST['type_name'];
$empid = $_SESSION['emp_id'];
?>
<?php


@session_start();
$sql_type = "INSERT INTO tb_type(ty_id,ty_name,status)
   VALUES('$type_id','$type_name','1')";
   
   $sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
   VALUES('$empid','ได้ทำการเพิ่มประเภท','$d ')";
   mysqli_query($conn, $sql_log);

if (mysqli_query($conn, $sql_type)) {

} else {
    echo mysqli_error($conn);

} 
?>


