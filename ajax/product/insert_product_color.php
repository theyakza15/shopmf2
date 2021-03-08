<?php
//Run id
require 'connect.php';
$color_id=$_POST['color_id'];
$color_name=$_POST['color_name'];
$run_colordet=$_POST['run_colordet'];

?>
<?php


@session_start();
$sql_type = "INSERT INTO tb_color_detail(id_color_det,pd_id,id_color,status)
   VALUES('$color_id','$run_colordet','$color_name','1')";
   

if (mysqli_query($conn, $sql_type)) {

} else {
    echo mysqli_error($conn);

} 
?>


