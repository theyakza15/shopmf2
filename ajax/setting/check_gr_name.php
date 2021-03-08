<?php
require('connect.php');
$name = $_POST['gr_name'];
$type = $_POST['type'];
 $sql= "SELECT * FROM tb_group WHERE gr_name='$name' AND ty_id='$type' AND status='1'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    echo 1;
 }else{
     echo 0;
 }
?>