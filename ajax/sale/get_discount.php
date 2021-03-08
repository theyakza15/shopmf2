<?php
require('connect.php');
$product_con = $_POST['product_con'];//array
$amonut_con = $_POST['amonut_con'];//array
$pay_total = $_POST['pay_total'];
$check=$_POST['check'];
$sum4= 0 ;
for($count1 = 0; $count1 < count($product_con); $count1++){
    $amount = mysqli_real_escape_string($conn, $amonut_con[$count1]);
    $pro_ids = mysqli_real_escape_string($conn, $product_con[$count1]);
    $sum = mysqli_real_escape_string($conn, $pay_total[$count1]);
    
    $sql_id_pd = "SELECT tb_product.pd_id AS pd_id 
    FROM tb_product
    INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id =tb_product.pd_id
    INNER JOIN tb_color_detail ON tb_color_detail.pd_id = tb_produnt_detail.id_pd_det
    WHERE tb_color_detail.id_color_det ='$pro_ids'";
   $result3= mysqli_query($conn,$sql_id_pd);
   $row = mysqli_fetch_assoc($result3);
   $p_dis_id = $row['pd_id'];


 if($check== 2){
    $sql_id_dis="SELECT discount.discount AS discount ,amount_pro , pd_id
    FROM discount
    WHERE pd_id  ='$p_dis_id'  AND discount.amount_pro <=$amount";
    $result10= mysqli_query($conn,$sql_id_dis); 
    $row = mysqli_fetch_assoc($result10);
    $p_dis_co = $row['discount'];
    if($result10->num_rows >0){ 
    $total_disco1=$p_dis_co/100;
    }else {
    $total_disco1= 0 ;
    }
}else if ($check== 1){
    $total_disco1= 0 ;
}

     $sum2=$total_disco1*$sum;
    $sum3=$sum-$sum2;

    $sum4+=$sum2;
    
    
    



}
echo $sum4; 
?>
