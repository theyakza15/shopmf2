<?php
@session_start();
require 'connect.php';
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

$sqlm = "SELECT max(pay_id) as Maxid  FROM paymant";
$result = mysqli_query($conn, $sqlm);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
$tmp1 = "PM";
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

$pay_id = $tmp1 . $sub_date . $m . $a;

$d = date("Y-m-d");

$pro_id = $_POST['pro_id']; //array
$arramonut = $_POST['amonut']; //array
$dis2=$_POST['dis2'];
$total = $_POST['pay_total']; //array
$discount = $_POST['discount'];
$total_price = $_POST['total_price'];
$sum4 = 0;
$i = 0;
$total_discount = 0;

for ($count1 = 0; $count1 < count($pro_id); $count1++) {
    $amount = mysqli_real_escape_string($conn, $arramonut[$count1]);
    $pro_ids = mysqli_real_escape_string($conn, $pro_id[$count1]);
    $sum = mysqli_real_escape_string($conn, $total[$count1]);
    $dis22 = mysqli_real_escape_string($conn, $dis2[$count1]);




    

    $query_am =   "SELECT amount FROM tb_color_detail WHERE id_color_det='$pro_ids'";

    $result2 = mysqli_query($conn, $query_am);
    $row = mysqli_fetch_assoc($result2);
    $amount_from_db = $row['amount'];

    $total2 = $amount_from_db - $amount;
    $sql_update = "UPDATE tb_color_detail SET amount='$total2' WHERE id_color_det='$pro_ids'";
    mysqli_query($conn, $sql_update);

   
    $paytotal = $sum - $cal_discount;

    $sum4 += $paytotal;



    $query = 'INSERT INTO paymant_detail( 
pay_id,
pay_pd_id,
pay_total,
amount_pay,
total_dis_co,
status_pay_det)
VALUES(
"' . $pay_id . '",
"' . $pro_ids . '",
"' . $paytotal . '",
"' . $amount . '",
"' . $dis22 . '",
"1"
);';
    if (mysqli_query($conn, $query)) {
        echo $query;
    } else {
        echo mysqli_error($conn);
    }
}



$d = date("Y-m-d H:i");

$insertrec = "INSERT INTO paymant(
pay_id,
emp_id,
discount,
total,
pay_date,
status_pay,
type_pay)
VALUES(
'$pay_id',
'$empid',
'$discount',
'$sum4',
'$d',
'1',
'$type_pay'
);";
mysqli_query($conn, $insertrec);

$sql_log = "INSERT INTO log_mafear(emp_id,m_ss,date_log)
VALUES('$empid','ได้ทำการขายสินค้า','$ddd ')";
mysqli_query($conn, $sql_log);
