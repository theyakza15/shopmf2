<?php
require('connect.php');
$name = $_POST['dis_ckname'];
$dis_ck_pd = $_POST['dis_ck_pd'];
$dis_ck_am = $_POST['dis_ck_am'];

 $sql= "SELECT * FROM discount WHERE discount='$name' AND pd_id = '$dis_ck_pd' AND amount_pro ='$dis_ck_am' AND status_dis  ='1'";
 $result = mysqli_query($conn,$sql);

 if(mysqli_num_rows($result)>0){
    echo 1;
 }else{
     echo 0;
 }
?>