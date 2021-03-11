<?php
@session_start();
include 'connect_new.php';
require 'connect.php';
$object = new Crud();
$empid = $_SESSION['emp_id'];
date_default_timezone_set("Asia/Bangkok");
$dddd = date("Y-m-d H:i");
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$sqlm = "SELECT max(emp_id) as Maxid  FROM tb_employees";
$result = $object->execute_query($sqlm);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];

$tmp1 = "EMP"; //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($mem_old, 5, 6);
$t = $tmp2 + 1;
$sub_date = substr($d, 2, 3);
$a = sprintf("%03d", $t);
$sum = $tmp1 . $sub_date . $a;

?>

<?php 
//insert.php
//$connect = mysqli_connect("localhost", "root", "", "db_mafearshop");
$emp_name = mysqli_real_escape_string($object->connect, $_POST["name_emp"]);
$emp_surname = mysqli_real_escape_string($object->connect, $_POST["surname_emp"]);
$emp_czid = mysqli_real_escape_string($object->connect, $_POST["cz_id"]);
$emp_hbd = mysqli_real_escape_string($object->connect, $_POST["hbd_emp"]);
$emp_number = mysqli_real_escape_string($object->connect, $_POST["number_emp"]);
$emp_email = mysqli_real_escape_string($object->connect, $_POST["email_emp"]);
$emp_sex = mysqli_real_escape_string($object->connect, $_POST["optradio"]);
$emp_numhome = mysqli_real_escape_string($object->connect, $_POST["num_home"]);
$emp_muu = mysqli_real_escape_string($object->connect, $_POST["muu"]);
$emp_alley = mysqli_real_escape_string($object->connect, $_POST["alley"]);
$emp_road = mysqli_real_escape_string($object->connect, $_POST["road"]);
$emp_county = mysqli_real_escape_string($object->connect, $_POST["county"]);
$emp_district = mysqli_real_escape_string($object->connect, $_POST["district"]);
$emp_province = mysqli_real_escape_string($object->connect, $_POST["province"]);
$emp_postal_number = mysqli_real_escape_string($object->connect, $_POST["postal_number"]);

//$d = date("Y-m-d");

require("connect.php");

if (!empty($_FILES['upload_emp']['name'])) {
    //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
    $old_filename = $_FILES['upload_emp']['name'];
    //$new_filename = $_FILES['fileUpload']['name'];
    ///----
    list($txt, $ext) = explode(".", $old_filename);
    $new_file_name = $sum . "." . $ext;
    //ตั้งชื่อใหม่
    copy($_FILES['upload_emp']['tmp_name'], "images/" . $new_file_name);
    $sql_add_emp = "INSERT INTO tb_employees
    (emp_id,emp_name,emp_surname,emp_czid,emp_bd,emp_number,emp_email,emp_sex,emp_numhome,emp_muu
    ,emp_alley,emp_road,emp_county,emp_district,emp_province,emp_posnum,emp_pic,status_emp,status_per)
    VALUES('$sum','$emp_name','$emp_surname','$emp_czid','$emp_hbd','$emp_number','$emp_email','$emp_sex','$emp_numhome'
    ,'$emp_muu','$emp_alley','$emp_road','$emp_county','$emp_district','$emp_province','$emp_postal_number','$new_file_name','1','0')";


if (mysqli_query($conn,$sql_add_emp)) {
echo $sql_add_emp;
} else {
echo $sql_add_emp;
}
} else {
echo 'Hello';
}

$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการเพิ่มพนักงาน','$dddd ')";
mysqli_query($conn, $sql_log);
?>