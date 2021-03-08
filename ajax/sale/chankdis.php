<?php
@session_start();
require 'connect.php';
$id_pd = $_POST['id_pd']; 
$amuont_pro  = $_POST['amuont_pro']; 


$sql_ck_dis ="SELECT tb_color_detail.pd_id AS pd_id
,tb_product.pd_id AS pd_id
,discount.amount_pro AS amount_pro
,discount.discount AS discount
FROM tb_color_detail
INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
INNER JOIN discount ON discount.pd_id = tb_product.pd_id
WHERE tb_color_detail.id_color_det ='$id_pd' AND discount.amount_pro <='$amuont_pro'";

$result3 = mysqli_query($conn, $sql_ck_dis);
    $row = mysqli_fetch_assoc($result3);
    if($result3->num_rows > 0){
      echo   $row['discount']*$amuont_pro;
    }else{
        echo 0 ;
    }
?>