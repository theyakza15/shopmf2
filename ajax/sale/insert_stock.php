<?php
@session_start();
require "connect.php";
date_default_timezone_set("Asia/Bangkok");
$ddd = date("Y-m-d H:i");
$empid = $_SESSION['emp_id'];
//-----------------------------------------------------
//run id
/* @session_start();
$nameall = $_SESSION['firstName']." ".$_SESSION['lastName'];
 */
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$m = date('m', $datenow);

$sqlm = "SELECT max(st_id) as Maxid  FROM tb_stock";
$result = mysqli_query($conn, $sqlm);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
$tmp1 = "ST";
$tmp2 = substr($mem_old, 6, 3);
$Year = substr($mem_old, 2, 2);
$month = substr($mem_old, 4, 2);
$sub_date = substr($d, 2, 2);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //$sub_date = $sub_date + 1;
} else {
    $tmp2;
}

if ($month != $m) {
    $tmp2 = 0;
} else {
    $tmp2;
}

$t = $tmp2 + 1;

$a = sprintf("%03d", $t);

$stock_id = $tmp1 . $sub_date . $m . $a;
echo $stock_id;
$d = date("Y-m-d");

$l1 = $_POST['l1'];
$arramonut = $_POST['amonut'];
$date_stock =$_POST['date_stock'];
$i = 0;
for ($count1 = 0; $count1 < count($l1); $count1++) {
            $amount = mysqli_real_escape_string($conn, $arramonut[$count1]);
        $mat_id = mysqli_real_escape_string($conn, $l1[$count1]);
              

        $query = 'INSERT INTO tb_stock_detail(
id_st,
pd_id,
amount,
status)
VALUES(
"' . $stock_id . '",
"' . $mat_id . '",
"' . $amount . '",
"1"

);';
        if (mysqli_query($conn, $query)) {
            echo $query;
        } else {
            echo mysqli_error($conn);
        }
}

$sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการรับสินค้า','$ddd ')";
mysqli_query($conn, $sql_log);


$d = date("Y-m-d");
$insertrec = "INSERT INTO tb_stock(
st_id,
emp_id,
st_dete,
status)
VALUES(
'$stock_id',
'$empid',
'$date_stock',
'1'
);";
mysqli_query($conn, $insertrec);

echo "stock".mysqli_error($conn);


