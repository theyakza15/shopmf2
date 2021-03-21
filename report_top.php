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
$d = date("Y-m-d H:i");

$date_top_pro1 = $_POST['date_top_pro1'];
$date_top_pro2 = $_POST['date_top_pro2'];
$month_top_pro = $_POST['month_top_pro'];
$month_year_top_pro = $_POST['month_year_top_pro'];
function month($strDate)
{

  $strMonth = $strDate;
  $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
  $strMonthThai = $strMonthCut[$strMonth];
  return "$strMonthThai";
}
month($month_top_pro);
function DateThai1($start)
{
  $strYear = date("Y", strtotime($start)) + 543;
  $strMonth = date("m", strtotime($start));
  $strDay = date("d", strtotime($start));
  $show = $strDay . "/" . $strMonth . "/" . $strYear;
  return $show;
}
DateThai1($date_top_pro1 && $date_top_pro2);

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
    $strMonth = "0" . $strMonth;
  }
  return "$strDay/$strMonth/$strYear $strHour:$strMinute";
}
if ($date_top_pro1 != '' && $date_top_pro2 != '') {
  $sql_pay = "SELECT  pay_pd_id,SUM(pay_total) AS pay_total,SUM(amount_pay)AS amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  ,tb_color.co_name AS co_name
    FROM paymant_detail
    INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
    INNER JOIN tb_color_detail ON tb_color_detail.id_color_det =paymant_detail.pay_pd_id
    INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
    INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
    INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
    INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
    WHERE DATE(pay_date) BETWEEN '$date_top_pro1' AND '$date_top_pro2'
    GROUP BY det_size
    ORDER BY SUM(amount_pay) DESC
    LIMIT 5";
  $title = "รายงานยอดขายสูงสุดวันที่ " . DateThai1($date_top_pro1) . " ถึง " . DateThai1($date_top_pro2);
 
}else if ($month_top_pro != '0'&&$month_year_top_pro != '0') {
  $sql_pay = "SELECT  pay_pd_id,SUM(pay_total) AS pay_total,SUM(amount_pay)AS amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  ,tb_color.co_name AS co_name
    FROM paymant_detail
    INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
    INNER JOIN tb_color_detail ON tb_color_detail.id_color_det =paymant_detail.pay_pd_id
    INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
    INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
    INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
    INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
    WHERE MONTH(pay_date) ='$month_top_pro' AND YEAR(pay_date) ='$month_year_top_pro'
    GROUP BY det_size
    ORDER BY SUM(amount_pay) DESC
    LIMIT 5";
    $convert_date = $month_year_top_pro."-01-01";
    $strYear = date("Y", strtotime($convert_date)) + 543;
  $title = 'รายงานยอดขายสูงสุดประจำเดือน ' . month($month_top_pro) ." "."ปี".$strYear;
  
}else if ($month_top_pro != '0') {
  $sql_pay = "SELECT  pay_pd_id,SUM(pay_total) AS pay_total,SUM(amount_pay)AS amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  ,tb_color.co_name AS co_name
    FROM paymant_detail
    INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
    INNER JOIN tb_color_detail ON tb_color_detail.id_color_det =paymant_detail.pay_pd_id
    INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
    INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
    INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
    INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
    WHERE MONTH(pay_date) ='$month_top_pro' 
    GROUP BY det_size
    ORDER BY SUM(amount_pay) DESC
    LIMIT 5";
  $title = 'รายงานยอดขายสูงสุดประจำเดือน ' . month($month_top_pro);
  
} else if ($month_year_top_pro != '0') {
  $sql_pay = "SELECT  pay_pd_id,SUM(pay_total) AS pay_total,SUM(amount_pay)AS amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  ,tb_color.co_name AS co_name
    FROM paymant_detail
    INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
    INNER JOIN tb_color_detail ON tb_color_detail.id_color_det =paymant_detail.pay_pd_id
    INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
    INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
    INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
    INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
    WHERE YEAR(pay_date) ='$month_year_top_pro' 
    GROUP BY det_size
    ORDER BY SUM(amount_pay) DESC
    LIMIT 5";
    $convert_date = $month_year_top_pro."-01-01";
    $strYear = date("Y", strtotime($convert_date)) + 543;
  
  $title = "รายงานยอดขายสูงสุดปี " . "  " . $strYear;
 
}else {
  $sql_pay = "SELECT  pay_pd_id,SUM(pay_total) AS pay_total,SUM(amount_pay)AS amount_pay,status_pay_det
  ,paymant.pay_date AS pay_date
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  ,tb_color.co_name AS co_name
    FROM paymant_detail
    INNER JOIN paymant ON paymant.pay_id = paymant_detail.pay_id
    INNER JOIN tb_color_detail ON tb_color_detail.id_color_det =paymant_detail.pay_pd_id
    INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
    INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
    INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
    INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
    GROUP BY det_size
    ORDER BY SUM(amount_pay) DESC
    LIMIT 5";
  $title = "รายงานยอดขายสูงสุดทั้งหมด";
  
}



?>

<head>
  <title>รายงานยอดขายสูงสุด</title>
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
    <tbody>
      <tr>
        <td>
          <h3>
            <center><?= $title ?></center>
          </h3>
          <table class="table" border="1" width="100%">
            <thead>

              <tr>
                <th width="5%">
                  <center>ลำดับ</center>
                </th>
                <th width="35%">
                  <center>ชื่อสินค้า</center>
                </th>
                <th width="20%">
                  <center>ไซร์</center>
                </th>
                <th width="20%">
                  <center>จำนวนที่ขายได้</center>
                </th>
                <th width="20%">
                  <center>รวม</center>
                </th>



              </tr>

              <?php


              $result = mysqli_query($conn, $sql_pay);
              if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                  $top_name = $row['pd_name'];
                  $top_si = $row['si_name'];
                  $top_to = $row['pay_total'];
                  $top_am = $row['amount_pay'];

                  $i++;




              ?>
                  <tr>

                    <td class="text-center border-bottom">
                      <?php echo $i; ?>
                    </td>
                    <td>
                      <?php echo $top_name; ?>
                    </td>
                    <td>
                      <?php echo $top_si; ?>
                    </td>
                    <td>
                      <?php echo $top_am; ?>
                    </td>
                    <td class="text-right border-bottom">
                      <?php echo number_format($top_to, 2); ?>
                    </td>


                  </tr>


    </tbody>
<?php
                }
              }


?>
  </thead>
</table>

</td>
</tr>
<tbody>


  </table>