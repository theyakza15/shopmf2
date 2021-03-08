<?php
//Run id
require 'connect.php';

date_default_timezone_set("Asia/Bangkok");
//---sal_id
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;

$sql_lost = "SELECT max(sal_id) as Maxid  FROM tbl_sale";
$re_lost = mysqli_query($conn, $sql_lost);
$row_pay = mysqli_fetch_assoc($re_lost);
$mem_old = $row_pay['Maxid'];
//M003
$tmp1 = substr($mem_old, 0, 3); //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($mem_old, 5, 6);
$Year = substr($mem_old, 3, 2);
$sub_date = substr($d, 2, 3);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //  $sub_date=$sub_date+1;
} else {
    $tmp2;
}
$t = $tmp2 + 1;

$a = sprintf("%04d", $t);

$sal_id = $tmp1 . $sub_date . $a;
//-----------sale_detail
$sql_detail = "SELECT max(sd_id) as Maxid  FROM tbl_sale_detail";
$re_dt = mysqli_query($conn, $sql_detail);
$row_dt = mysqli_fetch_assoc($re_dt);
$dt_old = $row_dt['Maxid'];

$sd_id = $dt_old + 1;
//---------------------------
//---------------------pay_id-----------------
$sql_pay = "SELECT max(pay_id) as Maxid  FROM tbl_payment";
$re_pay = mysqli_query($conn, $sql_pay);
$row_payment = mysqli_fetch_assoc($re_pay);
$pay_old = $row_payment['Maxid'];
//M003
$tmp1 = substr($pay_old, 0, 3); //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($pay_old, 5, 6);
$Year = substr($pay_old, 3, 2);
$sub_date = substr($d, 2, 3);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //  $sub_date=$sub_date+1;
} else {
    $tmp2;
}
$t = $tmp2 + 1;

$a = sprintf("%04d", $t);

$pay_id = $tmp1 . $sub_date . $a;
//----------------------------------
?>
<?php

$d = date("Y-m-d");
$insert_sale = "INSERT INTO tbl_sale(sal_id,sal_status,sal_date,pay_id)
   VALUES('$sal_id','1','$d','$pay_id');";
   if (mysqli_query($conn, $insert_sale)) {
    
} else {
    echo 'sale' . mysqli_error($conn);
}

$pro_id = $_POST['pro_id'];
$pay_total = $_POST['pay_total'];
$amounts = $_POST['amount'];
$arr_total = $_POST['arr_total'];
for ($count = 0; $count < count($pro_id); $count++) {
    $pro_id2 = mysqli_real_escape_string($conn, $pro_id[$count]);
    $amounts2 = mysqli_real_escape_string($conn, $amounts[$count]);
    $arr_total2 = mysqli_real_escape_string($conn, $arr_total[$count]);
    $sel_pro = "SELECT st_id,st_amount,st_date FROM tbl_stock
WHERE pro_id='$pro_id2' AND st_date = (SELECT MIN(st_date) FROM tbl_stock WHERE st_status='1'AND pro_id='$pro_id2' AND st_amount !=0)
GROUP BY pro_id";

    $re = mysqli_query($conn, $sel_pro);
    $rows = $re->fetch_assoc();
    $amount = $rows['st_amount'];
    $st_id = $rows['st_id'];
    if ($amounts2 > $amount) {
        $sel_pro = "SELECT st_id,st_amount,st_date FROM tbl_stock
WHERE pro_id='$pro_id2' AND st_date = (SELECT MIN(st_date) FROM tbl_stock WHERE st_status='1'AND pro_id='$pro_id2' AND st_amount >=$amounts2)
GROUP BY pro_id";

        $re = mysqli_query($conn, $sel_pro);
        $rows = $re->fetch_assoc();
        $amount = $rows['st_amount'];
        $st_id = $rows['st_id'];

    }
    $af_st_amount = $amount - $amounts2;
    $update_stock = "UPDATE tbl_stock set st_amount='$af_st_amount'where st_id ='$st_id'";
   
    if (mysqli_query($conn,$update_stock)) {
   
} else {
    echo 'update_stock' . mysqli_error($conn);
}

    $insert_sale_detail = "INSERT INTO tbl_sale_detail(sd_id,sd_amount,sd_total,sd_status,pro_id,sal_id,st_id)
   VALUES('$sd_id','$amounts2','$arr_total2','1','$pro_id2','$sal_id','$st_id');";
 
if (mysqli_query($conn,$insert_sale_detail)) {
   
} else {
    echo 'insert_sale_detail' . mysqli_error($conn);
}
$sd_id++;

}
$insert_payment = "INSERT INTO tbl_payment(pay_id,pay_total,pay_status,pay_date)
   VALUES('$pay_id','$pay_total','1','$d');";
 
if (mysqli_query($conn, $insert_payment)) {
    
} else {
    echo 'insert_payment' . mysqli_error($conn);
}
