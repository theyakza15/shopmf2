<?php
require 'connect.php';
$pd_id = $_POST['pd_id'];
$color=$_POST['color'];

$sql = "SELECT id_color_det,pd_id,id_color FROM tb_color_detail WHERE id_color_det='$pd_id' AND id_color='$color'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$array = array();
$array['pd_id']=$row['pd_id'];
$array['id_color_det'] =$row['id_color_det'];
$array['id_color']=$row['id_color'];



echo json_encode($array);

