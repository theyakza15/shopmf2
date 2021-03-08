<?php
require('connect.php');
$name = $_POST['number_emp'];
 $sql= "SELECT * FROM tb_employees WHERE emp_number='$name' AND status ='1'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0){
    echo 1;
 }else{
     echo 0;
 }
?>