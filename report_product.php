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
$type_pro = $_POST['type_pro'];
$gr_pro = $_POST['gr_pro'];
$si_pro = $_POST['si_pro'];
$co_pro = $_POST['co_pro'];
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
if ($type_pro != '0' && $gr_pro != '0' && $si_pro != '0' && $co_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
,tb_produnt_detail.price AS price
,tb_size.si_name AS si_name
,tb_color.co_name AS co_name
,tb_color_detail.amount AS amount
,tb_group.gr_name AS gr_name
,tb_type.ty_name AS ty_name
FROM tb_product 
INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
WHERE  tb_type.ty_id = '$type_pro' AND tb_group.gr_id = '$gr_pro' AND  tb_size.si_id ='$si_pro' AND  tb_color.co_id ='$co_pro'
ORDER BY pd_id ASC";
} else if ($type_pro != '0' && $gr_pro != '0' && $si_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
 ,tb_produnt_detail.price AS price
 ,tb_size.si_name AS si_name
 ,tb_color.co_name AS co_name
 ,tb_color_detail.amount AS amount
 ,tb_group.gr_name AS gr_name
 ,tb_type.ty_name AS ty_name
 FROM tb_product 
 INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
 INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
 INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
 INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
 INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
 INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
 WHERE  tb_type.ty_id = '$type_pro' AND tb_group.gr_id = '$gr_pro'  AND  tb_size.si_id ='$si_pro'
 ORDER BY pd_id ASC";
} else if ($type_pro != '0' && $gr_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
 ,tb_produnt_detail.price AS price
 ,tb_size.si_name AS si_name
 ,tb_color.co_name AS co_name
 ,tb_color_detail.amount AS amount
 ,tb_group.gr_name AS gr_name
 ,tb_type.ty_name AS ty_name
 FROM tb_product 
 INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
 INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
 INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
 INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
 INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
 INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
 WHERE  tb_type.ty_id = '$type_pro' AND tb_group.gr_id = '$gr_pro'  
 ORDER BY pd_id ASC";
} else if ($gr_pro != '0' && $si_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
 ,tb_produnt_detail.price AS price
 ,tb_size.si_name AS si_name
 ,tb_color.co_name AS co_name
 ,tb_color_detail.amount AS amount
 ,tb_group.gr_name AS gr_name
 ,tb_type.ty_name AS ty_name
 FROM tb_product 
 INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
 INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
 INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
 INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
 INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
 INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
 WHERE   tb_group.gr_id = '$gr_pro' AND  tb_size.si_id ='$si_pro'
 ORDER BY pd_id ASC";
} else if ($type_pro != '0' && $si_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
 ,tb_produnt_detail.price AS price
 ,tb_size.si_name AS si_name
 ,tb_color.co_name AS co_name
 ,tb_color_detail.amount AS amount
 ,tb_group.gr_name AS gr_name
 ,tb_type.ty_name AS ty_name
 FROM tb_product 
 INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
 INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
 INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
 INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
 INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
 INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
 WHERE     tb_type.ty_id = '$type_pro'  AND tb_size.si_id ='$si_pro'
 ORDER BY pd_id ASC";
} else if ($type_pro != '0' && $si_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
 ,tb_produnt_detail.price AS price
 ,tb_size.si_name AS si_name
 ,tb_color.co_name AS co_name
 ,tb_color_detail.amount AS amount
 ,tb_group.gr_name AS gr_name
 ,tb_type.ty_name AS ty_name
 FROM tb_product 
 INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
 INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
 INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
 INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
 INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
 INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
 WHERE     tb_type.ty_id = '$type_pro'  AND tb_size.si_id ='$si_pro'
 ORDER BY pd_id ASC";
} else if ($type_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
 ,tb_produnt_detail.price AS price
 ,tb_size.si_name AS si_name
 ,tb_color.co_name AS co_name
 ,tb_color_detail.amount AS amount
 ,tb_group.gr_name AS gr_name
 ,tb_type.ty_name AS ty_name
 FROM tb_product 
 INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
 INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
 INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
 INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
 INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
 INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
 WHERE  tb_type.ty_id = '$type_pro' 
 ORDER BY pd_id ASC";
} else if ($gr_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
 ,tb_produnt_detail.price AS price
 ,tb_size.si_name AS si_name
 ,tb_color.co_name AS co_name
 ,tb_color_detail.amount AS amount
 ,tb_group.gr_name AS gr_name
 ,tb_type.ty_name AS ty_name
 FROM tb_product 
 INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
 INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
 INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
 INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
 INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
 INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
 WHERE   tb_group.gr_id = '$gr_pro' 
 ORDER BY pd_id ASC";
} else if ($si_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
 ,tb_produnt_detail.price AS price
 ,tb_size.si_name AS si_name
 ,tb_color.co_name AS co_name
 ,tb_color_detail.amount AS amount
 ,tb_group.gr_name AS gr_name
 ,tb_type.ty_name AS ty_name
 FROM tb_product 
 INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
 INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
 INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
 INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
 INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
 INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
 WHERE     tb_size.si_id ='$si_pro'
 ORDER BY pd_id ASC";
} else if ($co_pro != '0') {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
 ,tb_produnt_detail.price AS price
 ,tb_size.si_name AS si_name
 ,tb_color.co_name AS co_name
 ,tb_color_detail.amount AS amount
 ,tb_group.gr_name AS gr_name
 ,tb_type.ty_name AS ty_name
 FROM tb_product 
 INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
 INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
 INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
 INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
 INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
 INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
 WHERE     tb_color.co_id ='$co_pro'
 ORDER BY pd_id ASC";
} else {
  $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
,tb_produnt_detail.price AS price
,tb_size.si_name AS si_name
,tb_color.co_name AS co_name
,tb_color_detail.amount AS amount
,tb_group.gr_name AS gr_name
,tb_type.ty_name AS ty_name
FROM tb_product 
INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
ORDER BY pd_id ASC";
}





?>

<head>
  <title>รายงานข้อมูลสินค้า</title>
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
            <center>รายงานข้อมูลสินค้า</center>
          </h3>
<table class="table" border="1" width="100%">
<thead>
    <tr>
        <th> <center>ลำดับ</center></th>
        <th><center>รหัสสินค้า</center></th>
        <th><center>ประเภท</center></th>
        <th><center>กลุ่มสินค้า</center></th>
        <th><center>ชื่อสินค้า</center></th>
        <th><center>ไซร์</center></th>
        <th><center>สี</center></th>
        <th><center>ราคา</center></th>
        <th><center>คงเหลือ</center></th>
    </tr>
</thead>
<tbody>

              
              <?php


              $result = mysqli_query($conn, $sql_emp_re);
              if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                  $proid = $row['pd_id'];
                  $proname = $row['pd_name'];
                  $grname = $row['gr_name'];
                  $siname = $row['si_name'];
                  $coname = $row['co_name'];
                  $am_ount = $row['amount'];
                  $type_pro = $row['ty_name'];
                  $price_pro = $row['price'];

                  $i++;



              ?>
                  <tr>

                    <td class="text-center border-bottom">
                      <?php echo $i; ?>
                    </td>
                    <td class="text-center border-bottom">
                      <?php echo $proid; ?>
                    </td>
                    <td>
                      <?php echo $type_pro; ?>
                    </td>
                    <td>
                      <?php echo $grname; ?>
                    </td>
                    <td class="text-center border-bottom">
                      <?php echo $proname; ?>
                    </td>
                    <td class="text-center border-bottom">
                      <?php echo $siname; ?>
                    </td>
                    <td class="text-center border-bottom">
                      <?php echo $coname; ?>
                    </td>

                    <td class="text-right border-bottom">
                      <?php echo number_format($price_pro, 2); ?>
                    </td>
                    <td class="text-center border-bottom">
                      <?php echo $am_ount; ?>
                    </td>
                  </tr>


    </tbody>
<?php
                }
              }


?>
</tbody>