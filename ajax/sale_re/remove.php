<?php
require 'connect.php';
$id=$_POST['id'];
$sql= "SELECT pay_pd_id,amount_pay FROM paymant_detail WHERE pay_id='$id' ";

$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $pd_id = $row['pay_pd_id'];
    $amount = $row['amount_pay'];
    $sql_amount = "SELECT  amount FROM `tb_color_detail` WHERE id_color_det='$pd_id'";
    $result2 = mysqli_query($conn,$sql_amount);
    $row2 = $result2->fetch_assoc();
    $pd_amount = $row2['amount'];
    $total = $amount+$pd_amount;

    $sql_product = "UPDATE tb_color_detail SET amount='$total' WHERE id_color_det='$pd_id' ";
    $sql_update_payment  = "UPDATE paymant_detail SET status_pay_det='0' WHERE pay_id='$id' ";
    echo $sql_update_payment;
    if(mysqli_query($conn,$sql_product) && mysqli_query($conn,$sql_update_payment)){
      echo 1;
    }else{
    
    } 
  }
  $update = "UPDATE paymant SET status_pay='0' WHERE pay_id='$id' ";
  mysqli_query($conn,$update);
}

?>