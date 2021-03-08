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
$type_pro = $_POST['type_pro'];
$gr_pro = $_POST['gr_pro'];
$si_pro = $_POST['si_pro'];
$co_pro = $_POST['co_pro']; 
if($type_pro!='0'&& $gr_pro !='0'&&$si_pro!='0'&&$co_pro!='0'){
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
 
 }else if($type_pro!='0'){
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
  
  } else if ($gr_pro !='0'&&$si_pro!='0'&&$co_pro!='0'){
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
   WHERE tb_group.gr_id = '$gr_pro' AND  tb_size.si_id ='$si_pro' AND  tb_color.co_id ='$co_pro'
   ORDER BY pd_id ASC"; 
 
   
 }else if ($gr_pro !='0'){
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
   WHERE tb_group.gr_id = '$gr_pro' 
   ORDER BY pd_id ASC"; 
  
 }
 else if ($si_pro!='0'){
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
   WHERE tb_size.si_id = '$si_pro' 
   ORDER BY pd_id ASC"; 
   
 }else if ($co_pro!='0'){
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
   WHERE tb_color.co_id  = '$co_pro' 
   ORDER BY pd_id ASC";
 
 } 
 else{
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
  <title>รายงานสินค้าคลัง</title>
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

        </td>
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
      <center>รายงานสินค้าคลัง</center>
    </h3>
    <table class="table" border="1" width="100%">
      <thead>

        <tr>
          <th width="1%">
            <center>ลำดับ</center>
          </th>
          <th width="5%">
            <center>ประเภท</center>
          </th>
          <th width="5%">
            <center>กลุ่ม</center>
          </th>
          <th width="10%">
            <center>ชื่อสินค้า</center>
          </th>
          <th width="5%">
            <center>ไซร์</center>
          </th>
          <th width="5%">
            <center>สี</center>
          </th>
          <th width="5%">
            <center>คงเหลือ</center>
          </th>

        </tr>
      </thead>
      <tbody>
        <?php
      

        $result = mysqli_query($conn, $sql_emp_re);
        if ($result->num_rows > 0) {
          $i = 0;
          while ($row = $result->fetch_assoc()) {
            $proid = $row['pd_id'];
            $ty_name = $row['ty_name'];
            $proname = $row['pd_name'];
            $grname = $row['gr_name'];
            $siname = $row['si_name'];
            $coname = $row['co_name'];
            $am_ount = $row['amount'];
            $price_pro = $row['price'];

            $i++;



        ?>
            <tr>

              <td class="text-center border-bottom">
                <?php echo $i; ?>
              </td>
              <td class="text-center border-bottom">
                <?php echo $ty_name; ?>
              </td>
              <td class="text-center border-bottom">
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
              <td class="text-center border-bottom">
                <?php echo $am_ount; ?>
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