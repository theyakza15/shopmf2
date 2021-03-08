<?php
require 'connect.php';
$id = $_POST["id"];
$name = $_POST['name'];

$sql_type = "UPDATE tbl_dealer set deal_name='$name' where deal_id ='$id'";

if (mysqli_query($conn, $sql_type)) {
    echo "OK";
} else {
    mysqli_error($conn);
}
