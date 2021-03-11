<?php
require('connect.php');
$name = $_POST['id_card'];
 $sql= "SELECT * FROM tb_employees WHERE emp_czid='$name' AND status_emp ='1'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    echo 1;
 }else{
     echo 0;
 }
?>