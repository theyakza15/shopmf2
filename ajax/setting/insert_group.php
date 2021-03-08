
<?php
//Run id
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$id=$_POST['id'];
$name=$_POST['name'];
$type=$_POST['type'];
$empid = $_SESSION['emp_id'];
?>
<?php



$sql_type = "INSERT INTO tb_group(gr_id,gr_name,status,ty_id)
   VALUES('$id','$name','1','$type')";

$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการเพิ่มกลุ่มสินค้า','$d ')";
   
   mysqli_query($conn, $sql_log);

if (mysqli_query($conn, $sql_type)) {
echo $sql_type;
} else {
    echo mysqli_error($conn);

} 
?>
