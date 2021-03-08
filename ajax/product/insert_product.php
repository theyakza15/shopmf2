
<?php
//Run id
include 'connect_new.php';
require 'connect.php';
$object = new Crud();
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$sqlm = "SELECT max(pro_id) as Maxid  FROM tbl_product";
$result = $object->execute_query($sqlm);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
//M003
$tmp1 = substr($mem_old, 0, 3); //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($mem_old, 5, 6);
$t = $tmp2 + 1;
$sub_date = substr($d, 2, 3);
$a = sprintf("%04d", $t);
$sum = $tmp1 . $sub_date . $a;

?>
<?php
//insert.php
//$connect = mysqli_connect("localhost", "root", "root1234", "db_bbgun");
$pro_name = mysqli_real_escape_string($object->connect, $_POST["pro_name"]);
$price = mysqli_real_escape_string($object->connect, $_POST["price"]);
$sel_group = mysqli_real_escape_string($object->connect, $_POST["sel_group"]);
$sel_dealer = mysqli_real_escape_string($object->connect, $_POST["sel_dealer"]);


$d = date("Y-m-d");

if (!empty($_FILES['in_fileUpload']['name'])) {
    //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
    $old_filename = $_FILES['in_fileUpload']['name'];
    //$new_filename = $_FILES['fileUpload']['name'];
    ///----
    list($txt, $ext) = explode(".", $old_filename);
    $new_file_name = $sum . "." . $ext;
    //ตั้งชื่อใหม่
    copy($_FILES['in_fileUpload']['tmp_name'], "images/" . $new_file_name); //copy ภาพไปใส่ในโฟลเดอร์ upload
    $sql_add_user = "INSERT INTO tbl_product
            (pro_id,pro_name,pro_price,pro_pic,group_id,deal_id,pro_status,created_date)
            VALUES('$sum','$pro_name','$price','$new_file_name','$sel_group','$sel_dealer','1','$d')";
    if ($object->execute_query($sql_add_user)) {
        echo $sql_update_user;
    } else {
        echo "Error";
    }
} else {
    echo 'Hello';
}

?>
