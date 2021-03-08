<?php
//Run id
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$color_id=$_POST['color_id'];
$color_name=$_POST['color_name'];
$empid = $_SESSION['emp_id'];
?>
<?php



$sql_type = "INSERT INTO tb_color(co_id,co_name,status)
   VALUES('$color_id','$color_name','1')";

$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการเพิ่มข้อมูลสี','$d ')";
mysqli_query($conn, $sql_log);

mysqli_query($conn, $sql_type);


?>