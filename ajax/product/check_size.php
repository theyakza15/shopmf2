<?php
require('connect.php');
$name = $_POST['size_name'];
$idpd = $_POST['idpd'];
 $sql= "SELECT * FROM tb_produnt_detail WHERE det_size='$name' AND pd_id='$idpd' AND status='1'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    echo 1;
 }else{
     echo 0;
 }
?>