<?php
require 'connect.php';
$editcolor_name = $_POST["editcolor_name"];
$editcolor_id = $_POST['editcolor_id'];



$sql_color = "UPDATE tb_color_detail set id_color='$editcolor_name' where id_color_det ='$editcolor_id'";

if(mysqli_query($conn,$sql_color)){
    echo "OK";
}else{
   echo mysqli_error($conn);
}
