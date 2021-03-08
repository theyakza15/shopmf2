<?php
require('connect.php');
$name = $_POST['si_name'];
 $sql= "SELECT * FROM tb_size WHERE si_name='$name' AND status ='1'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    echo 1;
 }else{
     echo 0;
 }
?>