
<?php
//Run id
require 'connect.php';
$type_id = $_POST['type_id'];
$type_name = $_POST['type_name'];

?>
<?php

@session_start();
$sql_type = "INSERT INTO tbl_dealer(deal_id,deal_name,deal_status)
   VALUES('$type_id','$type_name','1')";

if (mysqli_query($conn, $sql_type)) {

} else {
    echo mysqli_error($conn);

}
?>
