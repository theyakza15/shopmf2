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
/* $sisto=$_POST['si_sto'];
$co_sto=$_POST['co_sto']; */
$dapro1=$_POST['date_in_pro1'];
$dapro2=$_POST['date_in_pro2'];
$mip=$_POST['month_in_pro'];
$yip=$_POST['month_year_in_pro'];  
$st_sto=$_POST['status_sto'];
function month($strDate)
{

    $strMonth =$strDate;
   $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return "$strMonthThai";   
}
month($mip);
function yearThai1($start)
{
    $strYear = date("Y", strtotime($start)) + 543;
    
    return $strYear;
}
function DateThai1($start)
{
    $strYear = date("Y", strtotime($start)) + 543;
    $strMonth = date("m", strtotime($start));
    $strDay = date("d", strtotime($start));
    $show = $strDay . "/" . $strMonth . "/" . $strYear;
    return $show;
}
DateThai1($dapro1 && $dapro2);
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
if ($dapro1!=''&&$dapro2!=''&&$st_sto!='2'){ //วันที่
  $sql_sto_re = "SELECT id_st,tb_stock_detail.amount AS amount,tb_stock_detail.pd_id AS pd_id,tb_stock_detail.status AS status
  ,tb_stock.st_dete AS st_dete
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  FROM tb_stock_detail
  INNER JOIN tb_stock ON tb_stock.st_id =  tb_stock_detail.id_st
  INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
  INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
  WHERE DATE(st_dete) BETWEEN '$dapro1' AND '$dapro2' AND tb_stock_detail.status ='$st_sto'
  ORDER BY id_st ASC";
 $title = 'รายงานการรับสินค้าวันที่ '.DateThai1($dapro1)." ถึง ".DateThai1($dapro2);
 echo 1 ;
  
}else if($mip!=0 && $yip!=0 &&$st_sto!='2'){ //เดือน//ปี
  $sql_sto_re = "SELECT id_st,tb_stock_detail.amount AS amount,tb_stock_detail.pd_id AS pd_id,tb_stock_detail.status AS status
  ,tb_stock.st_dete AS st_dete
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  FROM tb_stock_detail
  INNER JOIN tb_stock ON tb_stock.st_id =  tb_stock_detail.id_st
  INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
  INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
  WHERE MONTH(st_dete) = '$mip' AND YEAR(st_dete) = '$yip' AND tb_stock_detail.status ='$st_sto'
  ORDER BY id_st ASC";
   $convert_date = $yip."-01-01";
   $strYear = date("Y", strtotime($convert_date)) + 543;
  $title = 'รายงานการรับสินค้าเดือน '. month($mip)." "."ปี"." ".$strYear;
  echo 2 ;
}else if($dapro1!=''&&$dapro2!=''){ //วันที่
  $sql_sto_re = "SELECT id_st,tb_stock_detail.amount AS amount,tb_stock_detail.pd_id AS pd_id,tb_stock_detail.status AS status
  ,tb_stock.st_dete AS st_dete
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  FROM tb_stock_detail
  INNER JOIN tb_stock ON tb_stock.st_id =  tb_stock_detail.id_st
  INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
  INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
  WHERE DATE(st_dete) BETWEEN '$dapro1' AND '$dapro2' 
  ORDER BY id_st ASC";
 $title = 'รายงานการรับสินค้าวันที่ '.DateThai1($dapro1)." ถึง ".DateThai1($dapro2);
 echo 3 ; 
}else if($mip!=0 && $yip!=0 ){ //เดือน//ปี
  $sql_sto_re = "SELECT id_st,tb_stock_detail.amount AS amount,tb_stock_detail.pd_id AS pd_id,tb_stock_detail.status AS status
  ,tb_stock.st_dete AS st_dete
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  FROM tb_stock_detail
  INNER JOIN tb_stock ON tb_stock.st_id =  tb_stock_detail.id_st
  INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
  INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
  WHERE MONTH(st_dete) = '$mip' AND YEAR(st_dete) = '$yip' 
  ORDER BY id_st ASC";
  $convert_date = $yip."-01-01";
  $strYear = date("Y", strtotime($convert_date)) + 543;
 $title = 'รายงานการรับสินค้าเดือน '. month($mip)." "."ปี"." ".$strYear;
  echo 4 ;
}else if($yip!=0 &&$st_sto!='2'){ //ปี
  $sql_sto_re = "SELECT id_st,tb_stock_detail.amount AS amount,tb_stock_detail.pd_id AS pd_id,tb_stock_detail.status AS status
  ,tb_stock.st_dete AS st_dete
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  FROM tb_stock_detail
  INNER JOIN tb_stock ON tb_stock.st_id =  tb_stock_detail.id_st
  INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
  INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
  WHERE  YEAR(st_dete) = '$yip' AND tb_stock_detail.status ='$st_sto'
  ORDER BY id_st ASC";
  $convert_date = $yip."-01-01";
  $strYear = date("Y", strtotime($convert_date)) + 543;
  $title = 'รายงานการรับสินค้าปี'.$strYear ;
  echo 5 ;
}else if($yip!=0 ){ //ปี
  $sql_sto_re = "SELECT id_st,tb_stock_detail.amount AS amount,tb_stock_detail.pd_id AS pd_id,tb_stock_detail.status AS status
  ,tb_stock.st_dete AS st_dete
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  FROM tb_stock_detail
  INNER JOIN tb_stock ON tb_stock.st_id =  tb_stock_detail.id_st
  INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
  INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
  WHERE  YEAR(st_dete) = '$yip' 
  ORDER BY id_st ASC";
  $convert_date = $yip."-01-01";
  $strYear = date("Y", strtotime($convert_date)) + 543;
  $title = 'รายงานการรับสินค้าปี'.$strYear ;
  echo 6 ;
}else if($st_sto!='2'){ //สถานะ
  $sql_sto_re = "SELECT id_st,tb_stock_detail.amount AS amount,tb_stock_detail.pd_id AS pd_id,tb_stock_detail.status AS status
  ,tb_stock.st_dete AS st_dete
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  FROM tb_stock_detail
  INNER JOIN tb_stock ON tb_stock.st_id =  tb_stock_detail.id_st
  INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
  INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
  WHERE   tb_stock_detail.status ='$st_sto'
  ORDER BY id_st ASC";
  $title = 'รายงานการรับสินค้าเดือน '. month($mip)." "."ปี"." ".yearThai1($yip);
  echo 7 ;
}else if($mip!=0 ){ //เดือน
  $sql_sto_re = "SELECT id_st,tb_stock_detail.amount AS amount,tb_stock_detail.pd_id AS pd_id,tb_stock_detail.status AS status
  ,tb_stock.st_dete AS st_dete
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  FROM tb_stock_detail
  INNER JOIN tb_stock ON tb_stock.st_id =  tb_stock_detail.id_st
  INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
  INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
  WHERE MONTH(st_dete) = '$mip' 
  ORDER BY id_st ASC";
  $title = 'รายงานการรับสินค้าเดือน '. month($mip);
  echo 8 ;
}else{
  $sql_sto_re = "SELECT id_st,tb_stock_detail.amount AS amount,tb_stock_detail.pd_id AS pd_id,tb_stock_detail.status AS status
  ,tb_stock.st_dete AS st_dete
  ,tb_color.co_name AS co_name
  ,tb_size.si_name AS si_name
  ,tb_product.pd_name AS pd_name
  FROM tb_stock_detail
  INNER JOIN tb_stock ON tb_stock.st_id =  tb_stock_detail.id_st
  INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
  INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
  INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
  INNER JOIN tb_size ON tb_size.si_id = tb_produnt_detail.det_size
  INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
  ORDER BY id_st ASC";
   $title = 'รายงานการรับสินค้าทั้งหมด ';
   echo 99 ;
}

?>

<head>
  <title>รายงานการรับสินค้า</title>
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
            <center>รหัสรับสินค้า</center>
          </th>
          <th >
            <center>ชื่อสินค้า</center>
          </th>
          <th >
            <center>ไซส์</center>
          </th>
          <th >
            <center>สี</center>
          </th>
          <th >
            <center>จำนวน</center>
          </th>
          <th >
            <center>วันที่รับ</center>
          </th>
          <th >
            <center>สถานะ</center>
          </th>
        </tr>
        </thead>
<tbody>
              <?php


$result = mysqli_query($conn, $sql_sto_re);
if ($result->num_rows > 0) {
  $i = 0;
  while ($row = $result->fetch_assoc()) {
    $sto_id = $row['id_st'];
    $pd_name = $row['pd_name'];
    $am_sto = $row['amount'];
    $date_sto = $row['st_dete'];
    $si_name_sto = $row['si_name'];
    $co_name_sto = $row['co_name'];
    $sto_status = $row['status'];
    if ($sto_status == '1') {
      $cus_status1 = 'ปกติ';
    } else if ($sto_status == '0') {
      $cus_status1 = 'ยกเลิก';
    }
    $i++;



              ?>
                   <tr>

<td class="text-center border-bottom">
  <?php echo $i; ?>
</td>
<td>
  <?php echo $sto_id; ?>
</td>
<td>
  <?php echo $pd_name ; ?>
</td>
<td class="text-center border-bottom">
  <?php echo $si_name_sto; ?>
</td>
<td class="text-center border-bottom">
  <?php echo $co_name_sto; ?>
</td>
<td class="text-center border-bottom">
  <?php echo $am_sto; ?>
</td>
<td class="text-center border-bottom">
  <?php echo DateThai ( $date_sto); ?>
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
 </tbody>