<?php
require 'connect.php';
$name = $_POST['name'];

$sql = "SELECT * FROM tbl_dealer WHERE deal_name='$name' AND deal_status='1'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo 1;
} else {
    echo 0;
}

