<?php
require 'connect.php';
$pd_id = $_POST['pd_id'];

$sql = "SELECT pd_id,pd_name,pd_group,pd_pic FROM tb_product WHERE pd_id='$pd_id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$array = array();
$array['pd_id']=$row['pd_id'];
$array['pd_name'] =$row['pd_name'];
$array['pd_group']=$row['pd_group'];
$array['pd_pic']=$row['pd_pic'];


echo json_encode($array);

