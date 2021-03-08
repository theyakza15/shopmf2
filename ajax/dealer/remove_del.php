<?php
require 'connect.php';
$id = $_POST["id"];
$status = $_POST['status'];

if ($status == 1) {
    $sql_type = "UPDATE tbl_dealer set deal_status='0' where deal_id ='$id'";
//$sql_stock = "UPDATE tbl_stock set st_date='$date',st_status='0' where st_id ='$st_id'";

} else {
    $sql_type = "UPDATE tbl_dealer set deal_status='1' where deal_id ='$id'";

}
if (mysqli_query($conn, $sql_type)) {
    echo $sql_type;
} else {
    echo mysqli_error($conn);
}
