<?php
require('connect.php');
$name = $_POST['co_name'];
 $sql= "SELECT * FROM tb_color WHERE co_name='$name' AND status ='1'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    echo 1;
 }else{
     echo 0;
 }
?>