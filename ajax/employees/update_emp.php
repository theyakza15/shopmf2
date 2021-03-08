<?php
@session_start();
include 'connect_new.php';
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$dddd = date("Y-m-d H:i");
$object = new Crud();
$empid = $_SESSION['emp_id'];
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
?>
<?php
//insert.php
//$connect = mysqli_connect("localhost", "root", "", "db_mafearshop");
$emp_id = mysqli_real_escape_string($object->connect, $_POST["empid"]);
$emp_name = mysqli_real_escape_string($object->connect, $_POST["empname"]);
$emp_surname = mysqli_real_escape_string($object->connect, $_POST["surname"]);
$emp_czid = mysqli_real_escape_string($object->connect, $_POST["empczid"]);
$emp_hbd = mysqli_real_escape_string($object->connect, $_POST["hbd"]);
$emp_number = mysqli_real_escape_string($object->connect, $_POST["empnumber"]);
$emp_email = mysqli_real_escape_string($object->connect, $_POST["empemail"]);
$emp_sex = mysqli_real_escape_string($object->connect, $_POST["gender"]);
$emp_numhome = mysqli_real_escape_string($object->connect, $_POST["empnumhome"]);
$emp_muu = mysqli_real_escape_string($object->connect, $_POST["empmuu"]);
$emp_alley = mysqli_real_escape_string($object->connect, $_POST["empalley"]);
$emp_road = mysqli_real_escape_string($object->connect, $_POST["emproad"]);
$emp_county = mysqli_real_escape_string($object->connect, $_POST["empcounty"]);
$emp_district = mysqli_real_escape_string($object->connect, $_POST["empdis"]);
$emp_province = mysqli_real_escape_string($object->connect, $_POST["empprovi"]);
$emp_postal_number = mysqli_real_escape_string($object->connect, $_POST["empzicode"]);

require("connect.php");

$sql_update_emp_no_pic = "UPDATE tb_employees SET
emp_name='$emp_name',
emp_surname='$emp_surname',
emp_czid='$emp_czid',
emp_bd='$emp_hbd',
emp_number='$emp_number',
emp_email='$emp_email',
emp_sex='$emp_sex',
emp_numhome='$emp_numhome',
emp_muu='$emp_muu',
emp_alley='$emp_alley',
emp_road='$emp_road',
emp_county='$emp_county',
emp_district='$emp_district',
emp_province='$emp_province',
emp_posnum='$emp_postal_number'
WHERE emp_id='$emp_id'";

if (!empty($_FILES['edit_pload_emp']['name'])) {
    //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
    $old_filename = $_FILES['edit_pload_emp']['name'];
    //$new_filename = $_FILES['fileUpload']['name'];
    ///----
    list($txt, $ext) = explode(".", $old_filename);
    $new_file_name = $sum . "." . $ext;
    //ตั้งชื่อใหม่
    copy($_FILES['edit_pload_emp']['tmp_name'], "images/" . $new_file_name);

    $sql_update_emp_pic = "UPDATE tb_employees SET
    emp_name='$emp_name',
    emp_surname='$emp_surname',
    emp_czid='$emp_czid',
    emp_bd='$emp_hbd',
    emp_number='$emp_number',
    emp_email='$emp_email',
    emp_sex='$emp_sex',
    emp_numhome='$emp_numhome',
    emp_muu='$emp_muu',
    emp_alley='$emp_alley',
    emp_road='$emp_road',
    emp_county='$emp_county',
    emp_district='$emp_district',
    emp_province='$emp_province',
    emp_posnum='$emp_postal_number'
    WHERE emp_id='$emp_id'";

    mysqli_query($conn, $sql_update_emp_pic);
    echo $sql_update_emp_pic;
} else if (mysqli_query($conn, $sql_update_emp_no_pic)) {
    echo $sql_update_emp_no_pic;
} else {
    echo 'Hello';
}

$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการแก้ไขข้อมูลพนักงาน','$dddd ')";
mysqli_query($conn, $sql_log);
?>