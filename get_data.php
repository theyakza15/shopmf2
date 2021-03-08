<?php
    $host="localhost";
    $username="root";
    $password="";
    $dbname= "db_mafearshop"; //ชื่อฐานข้อมูล
    
    //การเชื่อมต่อฐานข้อมูล
    $conn=mysqli_connect($host,$username,$password,$dbname);
    
    //กำหนด charset ให้ฐานข้อมุลอ่านภาษาไทยได้
    mysqli_query($conn,'set names utf8');

    $sql="SELECT  tb_product.pd_name as pd_name,COALESCE(SUM(tb_color_detail.amount)  ,0) as am FROM tb_product
    INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
    INNER JOIN tb_color_detail ON tb_color_detail.pd_id = tb_produnt_detail.id_pd_det
    GROUP By tb_product.pd_id
    ORDER BY am DESC";
    $result =mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        $item=[];
        while($row[] = $result->fetch_assoc()) {
	 
            $item = $row;
            
            $json = json_encode($item, JSON_NUMERIC_CHECK);
            
        }
        echo $json;
    }
?>