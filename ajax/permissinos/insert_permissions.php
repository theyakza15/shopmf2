<?php
//Run id
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$emp_id=$_POST['emp_id'];
$per_status=$_POST['per_status'];
$empid = $_SESSION['emp_id'];
?>
<?php

$sql_czid = "SELECT emp_czid 
FROM tb_employees  
WHERE emp_id = '$emp_id'";
 $result2 = mysqli_query($conn, $sql_czid);
 $row2 = $result2->fetch_assoc();
 $czid = $row2['emp_czid'];


@session_start();
$sql_type = "INSERT INTO tb_permissions(emp_id,username,password,status,type_per)
   VALUES('$emp_id','$emp_id','$czid','1','$per_status')";

$sql_perup = "UPDATE tb_employees set status_per='1' where emp_id ='$emp_id'";

$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการเพิ่มสิทธิ์พนักงาน','$d ')";
mysqli_query($conn, $sql_log);

mysqli_query($conn, $sql_perup);

if (mysqli_query($conn, $sql_type)) {

} else {
    echo mysqli_error($conn);

} 