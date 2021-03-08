<?php
//Run id
include 'connect_new.php'; 
require 'connect.php';
$object = new Crud();
date_default_timezone_set("Asia/Bangkok");
?>
<?php 
//insert.php
//$connect = mysqli_connect("localhost", "root", "", "db_mafearshop");
$idpro = mysqli_real_escape_string($object->connect, $_POST["edit_pro_id"]);
$gr_edit = mysqli_real_escape_string($object->connect, $_POST["edit_product_group"]);
$namepro_edit = mysqli_real_escape_string($object->connect, $_POST["edit_pro_name"]);

require("connect.php");

$sql_update_pro_no_pic = "UPDATE tb_product SET
pd_group='$gr_edit',
pd_name='$namepro_edit'
WHERE pd_id='$idpro'";

if (!empty($_FILES['edit_upload_product']['name'])) {
    //$_FILES คำสั่งอ่านค่าจากการอัพโหลด
    $old_filename = $_FILES['edit_upload_product']['name'];
    //$new_filename = $_FILES['fileUpload']['name'];
    ///----
    list($txt, $ext) = explode(".", $old_filename);
    $new_file_name = $sum . "." . $ext;
    //ตั้งชื่อใหม่
    copy($_FILES['edit_upload_product']['tmp_name'], "images/" . $new_file_name);
   
    $sql_update_pro_pic = "UPDATE tb_product SET
    pd_group='$gr_edit',
    pd_name='$namepro_edit'
    WHERE pd_id='$idpro'";

        mysqli_query($conn,$sql_update_pro_pic);
            echo $sql_update_pro_pic;

}else if (mysqli_query($conn,$sql_update_pro_no_pic)) {
echo $sql_update_pro_no_pic;
} 
else {
    echo $sql_update_pro_no_pic;
}



?>