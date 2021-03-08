<?php
require 'connect.php';
$editsize_id = $_POST["editsize_id"];
$editsize_name = $_POST['editsize_name'];
$editprice=$_POST['editprice'];


$sql_size = "UPDATE tb_produnt_detail set det_size='$editsize_name', price ='$editprice' where id_pd_det ='$editsize_id'";

if(mysqli_query($conn,$sql_size)){
    echo "OK";
}else{
   echo mysqli_error($conn);
}
