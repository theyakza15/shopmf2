<?php
require 'connect.php';
$id_pd_det = $_POST['id_pd_det'];
$sql = "SELECT MAX(id_color_det) as max FROM tb_color_detail WHERE pd_id='$id_pd_det'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!empty($row['max'])) {
    $returnValue = substr($row['max'], 14, 3);
    $tmp =substr($row['max'], 0, 14);
    $tmp1 = $returnValue+1;
    $a = sprintf("%03d", $tmp1);
    echo $tmp.$a;
} else {
    date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$sub_date = substr($d, 2, 3);
$temp2=$id_pd_det;
$temp2= str_replace(" ","",$temp2);
echo $temp2.'-'.'C'.'001';  


}