<script>
window.print()
</script>
<?php
@session_start();
require('connect.php');
$name = $_SESSION['emp_name'];
$surname = $_SESSION['emp_surname'];
date_default_timezone_set("Asia/Bangkok");
$d = date("d-m-Y H:i");
/* $sale_sto = $_POST['sale_sto']; */
/* $si_pay = $_POST['si_pay'];
$co_pay = $_POST['co_pay']; */
$date_pay_pro1 = $_POST['date_pay_pro1'];
$date_pay_pro2 = $_POST['date_pay_pro2'];
$month_pay_pro = $_POST['month_pay_pro'];
$month_year_pay_pro = $_POST['month_year_pay_pro'];
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
/* $status_pay = $_POST['status_pay']; */
/* if ($sale_sto!='0'){
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay
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
  WHERE paymant.type_pay='$sale_sto'  
  ORDER BY pay_id ASC";
  $title = "รายงานยอดขาย (ประเภทการขาย)"; */
  
/* }else if ($si_pay!='0') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay
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
  WHERE tb_size.si_id='$si_pay'  
  ORDER BY pay_id ASC";
  $title = "รายงานยอดขาย (ไซส์)";
 
}else if ($co_pay!='0') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay
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
  WHERE tb_color.co_id='$co_pay'  
  ORDER BY pay_id ASC";
  $title = "รายงานยอดขาย (สี)"; */
  
 if ($date_pay_pro1!=''&&$date_pay_pro2!='') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay
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
  WHERE DATE(pay_date) BETWEEN '$date_pay_pro1' AND '$date_pay_pro2'
  ORDER BY pay_id ASC";
  $title = 'รายงานยอดขายวันที่ '.DateThai1($date_pay_pro1)." ถึง ".DateThai1($date_pay_pro2);;
  
}else if ($month_pay_pro!='0') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay
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
  
}else if ($month_year_pay_pro!='0') {
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay
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
  $title = 'รายงานยอดขายปีที่ '.$month_year_pay_pro;
  
}
else{
  $sql_pay = "SELECT paymant.pay_id AS pay_id ,pay_pd_id,total_dis_co,pay_total,amount_pay
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
}
?>

<head>
  <title>รายงานยอดขาย</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
  <br>
  <div class="container">
    <table width="100%">
      <tr>
        <td width="150px" style="vertical-align: top"><img height="48px" src="images/logo-sm.PNG" alt=""></td>

      </tr>

      <tr>
        <td>
          บ้านเลขที่ 4/436 ต.ในเมือง ถ.สระหลวง
        </td>
        <td width="150px" class="text-right"></td>
      </tr>
      <tr>
        <td>อ.เมือง จ.พิจิตร 66000</td>
        <td width="250px" class="text-right">วันออก :<?=$d?> </td>
      </tr>
      <tr>
        <td>เบอร์โทรศัพท์. 094-763-0932</td>
        <td width="150px" class="text-right">ผู้ออก :<?=$name." ".$surname?> </td>
      </tr>
    </table>
    <br>

    <h3>
      <center><?=$title?></center>
    </h3>
    <table class="table" border="1" width="100%">
      <thead>
        <tr>
          <th width="1%">
            <center>ลำดับ</center>
          </th>
          <th width="20%">
            <center>รายการ</center>
          </th>
          <th width="15%">
            <center>วันที่ขาย</center>
          </th>
          
          <th width="5%">
            <center>ไซส์</center>
          </th>
          <th width="5%">
            <center>สี</center>
          </th>
          <th width="5%">
            <center>จำนวนที่ขาย</center>
          </th>
          <th width="10%">
            <center>ส่วนลด</center>
          </th>
          <th width="10%">
            <center>ราคาสุทธิ</center>
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
            
            $i++;



        ?>
            <tr>

              <td class="text-center border-bottom">
                <?php echo $i; ?>
              </td>
              <td>
                <?php echo $pay_pd_name; ?>
              </td>
              <td>
                <?php echo $pay_date; ?>
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


            </tr>

      </tbody>
  <?php
          }
        }

  ?>
    </table>

  </div>

</body>