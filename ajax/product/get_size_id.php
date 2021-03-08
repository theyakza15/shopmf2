<?php
require 'connect.php';
$size_id = $_POST['size_id'];
$sql = "SELECT MAX(id_pd_det) as max FROM tb_produnt_detail WHERE pd_id='$size_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!empty($row['max'])) {
    $returnValue = substr($row['max'], 9, 3);
    $tmp =substr($row['max'], 0, 9);
    $tmp1 = $returnValue+1;
    $a = sprintf("%03d", $tmp1);
    echo $tmp.$a;
} else {
    date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$sub_date = substr($d, 2, 3);
$temp = "PD";
$temp2=substr($size_id, 4, 4);
echo $temp.$sub_date.$temp2.'-'.'001'; 


}

