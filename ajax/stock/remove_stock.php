<?php
@session_start();
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");
$dd = date("Y-m-d H:i");
$id = $_POST["id"];
$status=$_POST['status'];
$st_id  =$_POST['id'];
$empid = $_SESSION['emp_id'];
//echo "H".$amount;
date_default_timezone_set("Asia/Bangkok");
$d = date("Y-m-d");

if($status==1){
$sql_pro = "UPDATE tb_stock set st_dete='$d',status ='0' where st_id ='$st_id'";

$sql_st_re ="SELECT  pd_id,id_st,amount,status FROM tb_stock_detail 
WHERE id_st ='$st_id' ORDER BY id_st ASC";
$result2 = mysqli_query($conn, $sql_st_re);
       while ($row2 = $result2->fetch_assoc()){
        $sto_id = $row2['id_st'];
        $sto_am = $row2['amount'];
        $sto_pd = $row2['pd_id'];

            $sql_colordet ="SELECT id_color_det,status,amount
            FROM tb_color_detail
            WHERE id_color_det = '$sto_pd'
            ORDER BY id_color_det ASC";
            $result5 = mysqli_query($conn, $sql_colordet);
            $row = mysqli_fetch_assoc($result5);
            $color_iddet = $row['id_color_det'];
            $color_am=$row['amount'];
            
           $amount_sto= $color_am-$sto_am ;
           $sql_stoupdate="UPDATE tb_color_detail SET amount='$amount_sto' WHERE id_color_det='$color_iddet'";
           mysqli_query($conn,$sql_stoupdate);   

           $stodet= "UPDATE tb_stock_detail set status='0' where id_st='$sto_id'" ;
           mysqli_query($conn,$stodet);

       }
       $sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
       VALUES('$empid','ได้ทำการยกเลิกการรับสินค้า','$dd ')";
       
}else{
    $sql_pro = "UPDATE tb_stock set st_dete='$d',status='1' where st_id ='$st_id'";

    $sql_st_re ="SELECT  pd_id,id_st,amount,status FROM tb_stock_detail 
WHERE id_st ='$st_id' ORDER BY id_st ASC";
$result2 = mysqli_query($conn, $sql_st_re);
       while ($row2 = $result2->fetch_assoc()){
        $sto_id = $row2['id_st'];
        $sto_am = $row2['amount'];
        $sto_pd = $row2['pd_id'];

            $sql_colordet ="SELECT id_color_det,status,amount
            FROM tb_color_detail
            WHERE id_color_det = '$sto_pd'
            ORDER BY id_color_det ASC";
            $result5 = mysqli_query($conn, $sql_colordet);
            $row = mysqli_fetch_assoc($result5);
            $color_iddet = $row['id_color_det'];
            $color_am=$row['amount'];
            
           $amount_sto= $color_am+$sto_am ;
           $sql_stoupdate="UPDATE tb_color_detail SET amount='$amount_sto' WHERE id_color_det='$color_iddet'";
           mysqli_query($conn,$sql_stoupdate);   

           $stodet= "UPDATE tb_stock_detail set status='1' where id_st='$sto_id'" ;
           mysqli_query($conn,$stodet);

       }
       $sql_log ="INSERT INTO log_mafear(emp_id,m_ss,date_log)
       VALUES('$empid','ได้ทำการยกเลิกการระงับการรับสินค้า','$dd ')";
}
mysqli_query($conn, $sql_log);
mysqli_query($conn,$sql_pro);
echo $sql_pro;

