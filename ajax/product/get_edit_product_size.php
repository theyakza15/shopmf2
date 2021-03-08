<?php
require 'connect.php';
$pd_id = $_POST['pd_id'];
$size=$_POST['size'];

$sql = "SELECT pd_id,id_pd_det,det_size,price FROM tb_produnt_detail WHERE id_pd_det ='$pd_id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$array = array();
$array['pd_id']=$row['pd_id'];
$array['id_pd_det'] =$row['id_pd_det'];
$array['det_size']=$row['det_size'];
$array['price']=$row['price'];


echo json_encode($array);

