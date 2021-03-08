
<?php
//Run id
@session_start();
include 'connect_new.php';
 require 'connect.php';
$object = new Crud();
date_default_timezone_set("Asia/Bangkok");
$dddd = date("Y-m-d H:i");
$empid = $_SESSION['emp_id'];
?>
<?php 
//insert.php
//$connect = mysqli_connect("localhost", "root", "", "db_mafearshop");
$pro_name = mysqli_real_escape_string($object->connect, $_POST["pro_name"]);
$pro_gr = mysqli_real_escape_string($object->connect, $_POST["hd_group_name"]);
$pro_id = mysqli_real_escape_string($object->connect, $_POST["pro_id"]);

// echo $_POST["pro_name"];
// die();
if (!empty($_FILES['upload_product']['name'])) {
    //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
    $old_filename = $_FILES['upload_product']['name'];
    //$new_filename = $_FILES['fileUpload']['name'];
    ///----
    list($txt, $ext) = explode(".", $old_filename);
    $new_file_name = $pro_id . "." . $ext;
    //ตั้งชื่อใหม่
    copy($_FILES['upload_product']['tmp_name'], "images/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
    $sql_add_product = "INSERT INTO tb_product
            (pd_id,pd_group,pd_name,pd_pic,status)
            VALUES('$pro_id','$pro_gr','$pro_name','$new_file_name','1')";
    if ($object->execute_query($sql_add_product)) {
        echo $sql_add_product;
    } else {
        echo $sql_add_product;

    }
} else {
    echo 'Hello';
}
$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการเพิ่มข้อมูลสินค้า','$dddd ')";
mysqli_query($conn, $sql_log);
?>