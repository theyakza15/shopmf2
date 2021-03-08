<?php
require('connect.php');
$name = $_POST['pro_name'];
$group =$_POST['group'];
 $sql= "SELECT * FROM tb_product WHERE pd_name='$name' AND pd_group='$group' AND status='1'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    echo 1;
 }else{
     echo 0;
 }
?>