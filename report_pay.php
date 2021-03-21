<script>
window.print()
</script>
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
$name = $_SESSION['emp_name'];
$surname = $_SESSION['emp_surname'];
date_default_timezone_set("Asia/Bangkok");
$d = date("d-m-Y H:i");
$date_pay_pro1 = $_POST['date_pay_pro1'];
$date_pay_pro2 = $_POST['date_pay_pro2'];
$month_pay_pro = $_POST['month_pay_pro'];
$month_year_pay_pro = $_POST['month_year_pay_pro'];
$status_pay = $_POST['status_pay'];
$check=0;
function month($strDate)
{

    $strMonth =$strDate;
   $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strMonthThai";   
}
month($month_pay_pro);
function DateThai1($start)
{
    $strYear = date("Y", strtotime($start)) + 543;
    $strMonth = date("m", strtotime($start));
    $strDay = date("d", strtotime($start));
    $show = $strDay . "/" . $strMonth . "/" . $strYear;
    return $show;
}

DateThai1($date_pay_pro1 && $date_pay_pro2);
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

 if ($date_pay_pro1!=''&&$date_pay_pro2!=''&&$status_pay!='2') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_product.pd_name AS pd_name
  ,paymant.type_pay AS type_pay
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  FROM paymant_detail
  INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
  INNER JOIN tb_color_detail  ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
  INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
  WHERE DATE(pay_date) BETWEEN '$date_pay_pro1' AND '$date_pay_pro2' AND status_pay_det ='$status_pay'
  ORDER BY pay_id ASC";
  $title = 'รายงานยอดขายวันที่ '.DateThai1($date_pay_pro1)." ถึง ".DateThai1($date_pay_pro2);;
  echo 1;
}else if ($month_pay_pro!='0'&&$status_pay!='2'&&$month_year_pay_pro!='0') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_product.pd_name AS pd_name
  ,paymant.type_pay AS type_pay
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  FROM paymant_detail
  INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
  INNER JOIN tb_color_detail  ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
  INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
  WHERE MONTH(pay_date) ='$month_pay_pro'  AND status_pay_det ='$status_pay' AND YEAR(pay_date) ='$month_year_pay_pro'
  ORDER BY pay_id ASC";
  $convert_date = $month_year_pay_pro."-01-01";
  $strYear = date("Y", strtotime($convert_date)) + 543;
  $title = 'รายงานยอดขายเดือน '. month($month_pay_pro)." "."ปี".$month_year_pay_pro;
  echo 2;
}else if ($month_pay_pro!='0'&&$month_year_pay_pro!='0') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_product.pd_name AS pd_name
  ,paymant.type_pay AS type_pay
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  FROM paymant_detail
  INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
  INNER JOIN tb_color_detail  ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
  INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
  WHERE MONTH(pay_date) ='$month_pay_pro'   AND YEAR(pay_date) ='$month_year_pay_pro'
  ORDER BY pay_id ASC";
  $convert_date = $month_year_pay_pro."-01-01";
  $strYear = date("Y", strtotime($convert_date)) + 543;
  $title = 'รายงานยอดขายเดือน '. month($month_pay_pro)." "."ปี".$month_year_pay_pro;
  echo 2.2;
}else if ($month_year_pay_pro!='0'&&$status_pay!='2') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_product.pd_name AS pd_name
  ,paymant.type_pay AS type_pay
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  FROM paymant_detail
  INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
  INNER JOIN tb_color_detail  ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
  INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
  WHERE YEAR(pay_date) ='$month_year_pay_pro'  AND status_pay_det ='$status_pay'
  ORDER BY pay_id ASC";
//แปลงปี ใช้ตรงนี้
 $convert_date = $month_year_pay_pro."-01-01";
  $strYear = date("Y", strtotime($convert_date)) + 543;
  $title = 'รายงานยอดขายปีที่ '.$strYear;
  // แปลงปี ใช้ตรงนี้
  echo 3;
}
else if ($month_year_pay_pro!='0'&&$status_pay=='2') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_product.pd_name AS pd_name
  ,paymant.type_pay AS type_pay
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  FROM paymant_detail
  INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
  INNER JOIN tb_color_detail  ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
  INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
  WHERE YEAR(pay_date) ='$month_year_pay_pro'  
  ORDER BY pay_id ASC";
//แปลงปี ใช้ตรงนี้
 $convert_date = $month_year_pay_pro."-01-01";
  $strYear = date("Y", strtotime($convert_date)) + 543;
  $title = 'รายงานยอดขายปีที่ '.$strYear;
  // แปลงปี ใช้ตรงนี้
  echo 4;
}else if ($status_pay=='1') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_product.pd_name AS pd_name
  ,paymant.type_pay AS type_pay
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  
  FROM paymant_detail
  INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
  INNER JOIN tb_color_detail  ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
  INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id

  WHERE  status_pay_det ='$status_pay'
  ORDER BY pay_id ASC";
  $title = 'รายงานสถานะยอดขาย (ปกติ) ';
  echo 5;
}else if ($status_pay!='2') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_product.pd_name AS pd_name
  ,paymant.type_pay AS type_pay
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_employees.emp_name
  ,tb_employees.emp_surname

  FROM paymant_detail
  INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
  INNER JOIN tb_color_detail  ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
  INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
  INNER JOIN tb_employees ON tb_employees.emp_id = paymant.emp_can
  WHERE  status_pay_det ='$status_pay'
  ORDER BY pay_id ASC";
  $title = 'รายงานสถานะยอดขาย (ยกเลิก)';
  $check =1;
  echo 6;
}else if ($month_pay_pro!='0') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_product.pd_name AS pd_name
  ,paymant.type_pay AS type_pay
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  FROM paymant_detail
  INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
  INNER JOIN tb_color_detail  ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
  INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
  WHERE MONTH(pay_date) ='$month_pay_pro'   
  ORDER BY pay_id ASC";
  $title = 'รายงานยอดขายเดือน '. month($month_pay_pro);
  echo 7;
}
else{
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_product.pd_name AS pd_name
  ,paymant.type_pay AS type_pay
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  FROM paymant_detail
  INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
  INNER JOIN tb_color_detail  ON tb_color_detail.id_color_det = paymant_detail.pay_pd_id
  INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
  ORDER BY pay_id ASC";
  $title = "รายงานยอดขายทั้งหมด";
  echo 99;
}
$sumpayto  =0;
?>

<head>
  <title>รายงานยอดขาย</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    table {font-family: Helvetica, Arial, Verdana; font-size: 14pt
    }
    @media print {
        thead {display: table-header-group;}
    }
</style>
</head>


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
          <br>
          <br>
          <br>
          <br>
          <br>
          <div style="float:right">
            <p>
              <width="250px" class="text-right">วันออก :<?= DateThai($d) ?>
            </p>
            <p>
              <width="150px" class="text-right">ผู้ออก :<?= $name . " " . $surname ?>
            </p>
          </div>
        </div>
      </th>
    </tr>
    <thead>
    <?php
    if($check==1){
      ?>
      <tbody>
      <tr>
        <td>
          <h3>
            <center><?=$title?></center>
          </h3>
          <table class="table" border="1" width="100%">
            <thead>

            <tr>
          <th >
            <center>ลำดับ</center>
          </th>
          <th >
            <center>รายการ</center>
          </th>
          <th >
            <center>ไซส์</center>
          </th>
          <th >
            <center>สี</center>
          </th>
          <th >
            <center>จำนวนที่ขาย</center>
          </th>
          <th >
            <center>ส่วนลด</center>
          </th>
  
          <th >
            <center>ราคาสุทธิ</center>
          </th>
          <th >
            <center>ยกเลิกโดย</center>
          </th>
          <th >
            <center>วันที่ยกเลิก</center>
          </th>
        </tr>
        </thead>
<tbody>
        <?php
        

        $result = mysqli_query($conn, $sql_pay);
        if ($result->num_rows > 0) {
          $i = 0;
    
          while ($row = $result->fetch_assoc()) {
            $payid = $row['pay_id'];
            $pay_date = $row['pay_date'];
            $pay_pd_name = $row['pd_name'];
            $pay_dis = $row['total_dis_co'];
            $pay_to = $row['pay_total'];
            $am_pay = $row['amount_pay'];
            $co_pay = $row['co_name'];
            $si_pay = $row['si_name'];
            $status_pay = $row['status_pay_det'];
            $fname = $row['emp_name'];
            $lname = $row['emp_surname'];
            if ($status_pay == '1') {
              $cus_status1 = 'ปกติ';
            } else if ($status_pay == '0') {
              $cus_status1 = 'ยกเลิก';
            }
            $i++;
            
            $sumpayto += $pay_to ;


        ?>
                 <tr>

<td class="text-center border-bottom">
  <?php echo $i; ?>
</td>
<td>
  <?php echo $pay_pd_name; ?>
</td>
<td>
<?php echo $si_pay; ?>
 
</td>

<td class="text-center border-bottom">
<?php echo $co_pay; ?>
</td>
<td class="text-center border-bottom">
<?php echo $am_pay; ?>
</td>
<td class="text-center border-bottom">
<?php echo number_format($pay_dis, 2); ?>
</td>

<td class="text-right border-bottom">
<?php echo number_format($pay_to, 2); ?>
</td>
  <td class="text-right border-bottom">
  <?php echo $fname.'  '.$lname; ?>
</td>
<td class="text-center border-bottom">
<?php echo  DateThai ($pay_date); ?>
</td>
</tr>


    </tbody>
<?php
                }
              }


?>
</tbody>

      <?php
    }else{
     ?>
     <tbody>
      <tr>
        <td>
          <h3>
            <center><?=$title?></center>
          </h3>
          <table class="table" border="1" width="100%">
            <thead>

            <tr>
          <th >
            <center>ลำดับ</center>
          </th>
          <th >
            <center>รายการ</center>
          </th>
          <th >
            <center>วันที่ขาย</center>
          </th>
          
          <th >
            <center>ไซส์</center>
          </th>
          <th >
            <center>สี</center>
          </th>
          <th >
            <center>จำนวนที่ขาย</center>
          </th>
          

          <th >
            <center>ส่วนลด</center>
          </th>
  
          <th >
            <center>ราคาสุทธิ</center>
          </th>
<th >
            <center>สถานะ</center>
          </th>

        </tr>
        </thead>
<tbody>
        <?php
        

        $result = mysqli_query($conn, $sql_pay);
        if ($result->num_rows > 0) {
          $i = 0;
          $sumpayto  =0;
          while ($row = $result->fetch_assoc()) {
            $payid = $row['pay_id'];
            $pay_date = $row['pay_date'];
            $pay_pd_name = $row['pd_name'];
            $pay_dis = $row['total_dis_co'];
            $pay_to = $row['pay_total'];
            $am_pay = $row['amount_pay'];
            $co_pay = $row['co_name'];
            $si_pay = $row['si_name'];
            $status_pay = $row['status_pay_det'];
            if ($status_pay == '1') {
              $cus_status1 = 'ปกติ';
            } else if ($status_pay == '0') {
              $cus_status1 = 'ยกเลิก';
            }
            $i++;
            
            $sumpayto += $pay_to ;


        ?>
                 <tr>

<td class="text-center border-bottom">
  <?php echo $i; ?>
</td>
<td>
  <?php echo $pay_pd_name; ?>
</td>
<td>
  <?php echo  DateThai ($pay_date); ?>
</td>

<td class="text-center border-bottom">
  <?php echo $si_pay; ?>
</td>
<td class="text-center border-bottom">
  <?php echo $co_pay; ?>
</td>
<td class="text-center border-bottom">
  <?php echo $am_pay; ?>
</td>

<td class="text-right border-bottom">
  <?php echo number_format($pay_dis, 2); ?>
</td>
  <td class="text-right border-bottom">
  <?php echo number_format($pay_to, 2); ?>
</td>
<td class="text-center border-bottom">
  <?php echo $cus_status1; ?>
</td>
</tr>


    </tbody>
<?php
                }
              }


?>
      <?php
    }
    ?>
    
    </tbody>
<?php 
if($sumpayto >0){
  ?>
  <tr class="border-top">
                <td style="border-left:none; border-left:none;" colspan="7" rowspan="6" class="text-center">ราคารวม</td>
                <td class="text-right border-bottom" colspan="1"><?php echo number_format($sumpayto,2); ?>
                <td class="text-center border-bottom" >บาท</td>
            </tr>

  <?php
}else{
  ?>
    <tr class="border-top">
                <td style="border-left:none; border-left:none;" colspan="9" rowspan="6" class="text-center">ไม่พบข้อมูล</td>
                
            </tr>
  <?php
}
?>



