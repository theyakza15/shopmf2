<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$gr_id = $_POST["gr_id"];
$gr_name = $_POST['gr_name'];
$gr_type =$_POST['gr_type'];
$empid = $_SESSION['emp_id'];

$sql_type = "UPDATE tb_group set gr_name='$gr_name',ty_id='$gr_type' where gr_id ='$gr_id'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการแก้ไขกลุ่มสินค้า','$d ')";


mysqli_query($conn, $sql_log);

if(mysqli_query($conn,$sql_type)){
    echo "OK";
}else{
    mysqli_error($conn);
}
