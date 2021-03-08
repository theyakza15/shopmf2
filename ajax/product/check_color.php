<?php
require('connect.php');
$name = $_POST['color_name'];
$id_colorcheck = $_POST['id_colorcheck'];
 $sql= "SELECT * FROM tb_color_detail WHERE id_color='$name' AND pd_id='$id_colorcheck' AND status='1'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    echo 1;
 }else{
     echo 0;
 }
?>