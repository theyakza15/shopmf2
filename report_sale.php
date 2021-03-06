
<style>
  .header {
    padding: 20px 0 20px 0;
    margin-bottom: 20px;
    overflow: auto;
    border-bottom: 2px solid #0095c8;
  }

  p {
    margin: 0;
  }

  .content {
    width: 100%;
    padding: 10px;
    height: 70px;
    border-bottom: 1px solid;
    text-align: center;

  }

  @media print {
    button {
      display: none;
    }

  }
</style>
<?php
@session_start();
require('connect.php');
$id = $_GET['id'];
/* $sum=0; */
$sql = "SELECT emp_name,emp_surname,pay_date FROM paymant
INNER JOIN tb_employees ON tb_employees.emp_id = paymant.emp_id
WHERE pay_id='$id'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    if ($strDay < 10) {
        $strDay = "0" . $strDay;
      
    }
    if ($strMonth < 10) {
        $strMonth ="0".$strMonth;
    }
    return "$strDay/$strMonth/$strYear $strHour:$strMinute";
}
?>
<head>
  <title>ใบเส็จรับเงิน</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<div style="margin:auto;  height : 40px; width :200px"></div>
<table style="margin:auto">
  <thead>
    <tr>
      <th>
        <div class="header">
          <div style="float:left">
            <h1>MafearShop</h1>
            <p>บ้านเลขที่ 4/436 ต.ในเมือง ถ.สระหลวง</p>
            <p>อ.เมือง จ.พิจิตร 66000</p>
            <p>เบอร์โทรศัพท์. 094-763-0932</p>
          </div>

          <div style="float:right">
            <h2>ใบเสร็จรับเงิน </h2>
            <p>
              <width="150px" class="text-right"> เลขที่ใบเสร็จ :<?php echo $id; ?>
            </p>
            <p>
              <width="250px" class="text-right">วันออก :<?php echo DateThai($row['pay_date']); ?>
            </p>
            <p>
              <width="150px" class="text-right">ผู้ออก :<?= $row['emp_name']." ".$row['emp_surname'];?>
            </p>

          </div>
        </div>
      </th>
    </tr>
    <thead>
    <tbody>
      <tr>
        <td>

          <h4>รายการสินค้า</h4>

          <table class="table" border="1" width="150%">
            <thead>
            <tr>
        <th width="10%"><center>ลำดับ</center></th>
        <th width="50%" ><center>รายการ</center></th>
        <th width="10%">ราคาต่อชิ้น</th>
        <th width="10%"><center>จำนวน</center></th>
        <th width="20%"><center>ส่วนลด</center></th>
        <th width="50%"><center>จำนวนเงิน</center></th>
        
        
      </tr>
      <?php
     $sql_pay ="SELECT paymant.pay_id AS pay_id,emp_id ,paymant.discount AS discount,total,pay_date,status_pay
     ,tb_product.pd_name AS pd_name
     ,paymant_detail.amount_pay AS amount_pay
     ,paymant_detail.pay_total AS pay_total
     ,tb_color.co_name AS co_name
     ,tb_size.si_name AS si_name
     ,tb_produnt_detail.price AS price
     ,paymant_detail.total_dis_co AS total_dis_co
     FROM paymant
     INNER JOIN paymant_detail ON paymant_detail.pay_id =paymant.pay_id
     INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
     INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
     INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det=tb_color_detail.pd_id
     INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
     INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
     LEFT JOIN discount ON discount.dis_id = paymant.dis_id
     WHERE paymant.pay_id = '$id'
     ORDER BY pay_id ASC";

        $result = mysqli_query($conn, $sql_pay);
        if ($result->num_rows > 0) {
          $i = 0;
          $total_price_sum=0;
          while ($row = $result->fetch_assoc()) {
            $payid = $row['pd_name'];
            $pay_si = $row['si_name'];
            $pay_co = $row['co_name'];
            $pay_price = $row['pay_total'];
            $pay_amo = $row['amount_pay'];
            $pay_total = $row['total'];
            $price_pro = $row['price'];
            $pay_dis = $row['discount'];
            $total_dis_co = $row['total_dis_co'];
            $i++; 
            $sum4=$pay_price+$total_dis_co;
            $total_price_sum += $sum4;
            
         
    ?>
              <tr>

<td class="text-center border-bottom">
<?php echo $i; ?>
</td>
<td >
<?php echo $payid." "."Size ".$pay_si ." "."สี ". $pay_co; ?>
</td>
<td class="text-right border-bottom">
<?php echo $price_pro; ?>
</td>
<td class="text-right border-bottom">
<?php echo $pay_amo; ?>
</td>
<td class="text-right border-bottom">
<?php echo number_format($total_dis_co,2); ?>
</td>
<td class="text-right border-bottom">
<?php echo number_format($sum4,2); ?>
</td>

</tr> 

    </tbody>
<?php
                }
              }


?>
<tr class="border-top">
                <td style="border-left:none; border-left:none;" colspan="4" rowspan="7" class="text-center"></td>
                <td class="text-right border-bottom">ราคารวม</td>
                <td class="text-right border-bottom"><?php echo number_format($total_price_sum,2); ?>
            </tr>
            <tr>
                <td class="text-right border-bottom">ส่วนลดรวม</td>
                <td class="text-right border-bottom"><?php echo number_format($pay_dis,2); ?>
            </tr>
            <tr>
                <td class="text-right border-bottom">ราคาสุทธิ</td>
                <td class="text-right border-bottom"><?php echo number_format($total_price_sum-$pay_dis,2); ?>
                  
            </tr>
  </thead>
</table>

</td>
</tr>
<tbody>


  </table>
