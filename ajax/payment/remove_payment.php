<?php
require 'connect.php';
$id = $_POST["id"];

date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d");

$sql_pro = "UPDATE tbl_payment set pay_status='0' where pay_id ='$id'";
//---------------------------------------select sale
$sql_sale = "SELECT * FROM tbl_sale WHERE pay_id='$id'";
$re_sale = mysqli_query($conn, $sql_sale);
$row_sale = $re_sale->fetch_assoc();
$sal_id = $row_sale['sal_id'];
$sql_up_sale = "UPDATE tbl_sale set sal_status='0' where sal_id ='$sal_id'";
mysqli_query($conn, $sql_up_sale);
$sql_sd = "SELECT * FROM tbl_sale_detail WHERE sal_id='$sal_id'";
$results = mysqli_query($conn, $sql_sd);
if ($results->num_rows > 0) {
    // output data of each row
    $i = 0;
    while ($row = $results->fetch_assoc()) {
        $sd_id = $row['sd_id'];
        $amount = $row['sd_amount'];
        $st_id = $row['st_id'];
        $sql_stock = "SELECT * FROM tbl_stock WHERE st_id='$st_id'";
        $re_stock = mysqli_query($conn, $sql_stock);
        $row_st = $re_stock->fetch_assoc();
        $st_amount = $row_st['st_amount'];
        $re_st = $amount + $st_amount;
        $sql_up_stock = "UPDATE tbl_stock set st_amount='$re_st' where st_id ='$st_id'";
        mysqli_query($conn, $sql_up_stock);
        $sql_up_sd = "UPDATE tbl_sale_detail set sd_status='0' where sd_id ='$sd_id'";
        mysqli_query($conn, $sql_up_sd);

    }

}
if (mysqli_query($conn, $sql_pro)) {
    echo $sql_pro;
} else {
    echo mysqli_error($conn);
}

//mysqli_query($conn,$sql_stock);
