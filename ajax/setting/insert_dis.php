<?php
//Run id
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d H:i");
$dis_id=$_POST['dis_id'];
$dis_name=$_POST['dis_name'];
$dis_proname=$_POST['dis_proname'];
$dis_am=$_POST['dis_am'];
$empid = $_SESSION['emp_id'];
?>
<?php



$sql_dis = "INSERT INTO discount(dis_id,discount,pd_id,amount_pro,status_dis)
   VALUES('$dis_id','$dis_name','$dis_proname','$dis_am','1')";
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
  VALUES('$empid','ได้ทำการเพิ่มข้อมูลส่วนลด','$d ')";
  
  mysqli_query($conn, $sql_log); 

if (mysqli_query($conn, $sql_dis)) {

} else {
    echo mysqli_error($conn);

} 
?>