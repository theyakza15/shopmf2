<?php
require 'connect.php';
$datenow = strtotime(date("Y-m-d"));
$month = date('m', $datenow) ;
$month = intval($month);
?>


    <?php
    if(!empty($_POST['month']) && empty($_POST['year'])){
        $month =$_POST['month'];
        $fiter = "WHERE MONTH(pay_date)='$month'";
    }else if(empty($_POST['month']) && !empty($_POST['year'])){
        $year =$_POST['year'];
        $fiter = "WHERE YEAR(pay_date)='$year'";
    }else if(!empty($_POST['month']) && !empty($_POST['year'])){
        $year =$_POST['year'];
        $month =$_POST['month'];
        $fiter = "WHERE YEAR(pay_date)='$year' AND MONTH(pay_date)='$month'";
    }else{
        $fiter = "WHERE MONTH(pay_date)='$month'";
    }
    $sql_pay = "SELECT  pay_pd_id,SUM(pay_total) AS pay_total,SUM(amount_pay)AS amount_pay,status_pay_det
    ,tb_size.si_name AS si_name
    ,tb_product.pd_name AS pd_name
    ,tb_color.co_name AS co_name
    FROM paymant_detail
    INNER JOIN tb_color_detail ON tb_color_detail.id_color_det =paymant_detail.pay_pd_id
    INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
    INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det =tb_color_detail.pd_id
    INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
    INNER JOIN tb_product ON tb_product.pd_id =tb_produnt_detail.pd_id
    INNER JOIN paymant ON paymant.pay_id=paymant_detail.pay_id
    {$fiter}
    GROUP BY det_size
    ORDER BY SUM(amount_pay) DESC
    LIMIT 5";

    $result = mysqli_query($conn, $sql_pay);
    if ($result->num_rows > 0) {
      $i = 0;
      ?>
      <table class="table" border="0" width="50%">
<thead>
    <tr>
      <th width="5%">
        <center>ชื่อสินค้า</center>
      </th>
      <th width="5%">
        <center>ไซส์</center>
      </th>
      <th width="5%">
        <center>จำนวนที่ขายได้</center>
      </th>
     
    </tr>
  </thead>
  <tbody>
  <?php
      while ($row = $result->fetch_assoc()) {
        $top_name = $row['pd_name'];
        $top_si = $row['si_name'];
        $top_to = $row['pay_total'];
        $top_am = $row['amount_pay'];

        $i++;



    ?>
        <tr>

          
          <td class="text-center border-bottom">
            <?php echo $top_name; ?>
          </td>
          <td class="text-center border-bottom">
            <?php echo $top_si; ?>
          </td>
          <td class="text-center border-bottom">
            <?php echo $top_am; ?>
          </td>
          

        </tr>

  </tbody>
<?php
      }
    }else{
        ?>
        <br>
        <center><span>ไม่พบข้อมูล</span></center>
        <?php
    }

?>

</table>