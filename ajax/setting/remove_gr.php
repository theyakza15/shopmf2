<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$id = $_POST["gr_id"];
$status = $_POST['status'];
$empid = $_SESSION['emp_id'];
//$sql_stock = "UPDATE tbl_stock set st_date='$date',st_status='0' where st_id ='$st_id'";
if($status==1){
$sql_type = "UPDATE tb_group set status='0' where gr_id ='$id' AND status='1'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการยกเลิกกลุ่มสินค้า','$d ')";

}else{
$sql_type = "UPDATE tb_group set status='1' where gr_id ='$id' AND status='0'";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการยกเลิกการระงับกลุ่มสินค้า,'$d ')";

}
mysqli_query($conn, $sql_log);
if(mysqli_query($conn,$sql_type)){
    echo $sql_type;
}else{
    echo mysqli_error($conn);
}
