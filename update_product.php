<?php
//Run id
//require('connect.php');.
include 'connect_new.php';
$object = new Crud();
date_default_timezone_set("Asia/Bangkok");
?>
<?php
//insert.php
$pro_id = mysqli_real_escape_string($object->connect, $_POST["pro_id"]);
$pro_name = mysqli_real_escape_string($object->connect, $_POST["pro_name"]);
$type = mysqli_real_escape_string($object->connect, $_POST["type"]);
$gr = mysqli_real_escape_string($object->connect, $_POST["gr"]);
$del = mysqli_real_escape_string($object->connect, $_POST["del"]);
$price = mysqli_real_escape_string($object->connect, $_POST["price"]);
//$status = mysqli_real_escape_string($object->connect, $_POST["select_type"]);

$d = date("Y-m-d");


$sql_update_user_no_pic = "UPDATE tbl_product SET
pro_name='$pro_name',
pro_price='$price',
deal_id='$del'
WHERE pro_id='$pro_id'";

    if (!empty($_FILES['fileUpload']['name'])) {
        //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
        $old_filename = $_FILES['fileUpload']['name'];
        //$new_filename = $_FILES['fileUpload']['name'];
        ///----
        list($txt, $ext) = explode(".", $old_filename);
        $new_file_name = $pro_id . "." . $ext;
        //ตั้งชื่อใหม่
        copy($_FILES['fileUpload']['tmp_name'], "images/" . $new_file_name);

        $sql_update_user = "UPDATE tbl_product SET
pro_name='$pro_name',
pro_price='$price',
pro_pic='$new_file_name',
deal_id='$del'
WHERE pro_id='$pro_id'";
//----
        $object->execute_query($sql_update_user);
        //$object->execute_query($sql_update_addr);
//echo $sql_update_user;
        echo $sql_update_user;

    } else if ($object->execute_query($sql_update_user_no_pic)) {
        echo $sql_update_user_no_pic;
    } else {
        echo "Error";
    }

