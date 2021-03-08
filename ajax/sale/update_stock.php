<?php
require 'connect.php';
$id = $_POST["id"];
$name = $_POST['name'];
$price = $_POST['price'];
$amount = $_POST['amount'];
$st_id = $_POST['st'];
$date = $_POST['date'];
echo "H".$amount;
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d");
$sql_pro = "UPDATE tbl_stock set pro_id='$name',st_date='$date',st_price='$price',st_amount='$amount' where st_id ='$st_id'";

if(mysqli_query($conn,$sql_pro)){
    echo $sql_pro;
}else{
    mysqli_error($conn);
}
