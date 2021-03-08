<?php
require 'connect.php';
$pd_id = $_POST['pd_id'];


$sql = "SELECT MAX(pd_id) as max FROM tb_product WHERE pd_group='$pd_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if (!empty($row['max'])) {
    $returnValue = substr($row['max'], 6, 2);
    $tmp =substr($row['max'], 0, 6);
    $tmp1 = $returnValue+1;
    $a = sprintf("%02d", $tmp1);
    echo $tmp.$a;
} else {
    date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$sub_date = substr($d, 2, 3);
$temp = "PD";
$temp2=substr($pd_id, 4, 2);
echo $temp.$sub_date.$temp2.'01';
}
