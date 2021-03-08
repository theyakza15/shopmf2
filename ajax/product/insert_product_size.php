<?php
//Run id
require 'connect.php';
$size_id=$_POST['size_id'];
$size_name=$_POST['size_name'];
$price=$_POST['price'];
$runid=$_POST['runpdidsize'];

?>
<?php


@session_start();
$sql_type = "INSERT INTO tb_produnt_detail(id_pd_det,pd_id,det_size,price,status)
   VALUES('$size_id','$runid','$size_name','$price','1')";
   

if (mysqli_query($conn, $sql_type)) {

} else {
    echo mysqli_error($conn);

} 
?>


