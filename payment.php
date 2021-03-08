<?php
include "sidebar.php";
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$sqlm = "SELECT max(st_id) as Maxid  FROM tbl_stock";
$result = mysqli_query($conn, $sqlm);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
//M003
$tmp1 = substr($mem_old, 0, 2); //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($mem_old, 5, 6);
$Year = substr($mem_old, 2, 2);
$sub_date = substr($d, 2, 3);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //  $sub_date=$sub_date+1;
} else {
    $tmp2;
}
$t = $tmp2 + 1;

$a = sprintf("%03d", $t);

$id_product = $tmp1 . $sub_date . $a;

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">การชำระเงิน</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card ">
                <br>
                <div class="row">
                    <div class="col-md-12 ">


                        <table class="table table-striped text-center " cellspacing="0" id="tbl_product" width="100%">
                            <thead>
                                <th>ลำดับ</th>
                                <th>รหัสใบเสร็จ</th>
                                <th>รวมเงิน</th>
                                <th>วันที่</th>
                                <th>#</th>
                            </thead>

                            <?php
$sql = "SELECT tbl_payment.pay_id as pay_id ,SUM(tbl_sale_detail.sd_total) as sum ,tbl_payment.pay_date as pay_date,tbl_payment.pay_status as pay_status FROM tbl_payment
INNER JOIN tbl_sale ON tbl_sale.pay_id=tbl_payment.pay_id
INNER JOIN tbl_sale_detail ON tbl_sale_detail.sal_id=tbl_sale.sal_id
WHERE tbl_payment.pay_status='1'
GROUP BY tbl_payment.pay_id
ORDER BY tbl_payment.pay_date DESC ";

$results = mysqli_query($conn, $sql);

if ($results->num_rows > 0) {
    // output data of each row
    $i = 0;
    while ($row = $results->fetch_assoc()) {
        $i++;
        $pay_id = $row['pay_id'];
        $pay_total = $row['sum'];
        $pay_date = $row['pay_date'];
        $status = $row['pay_status'];
        ?>
                            <?php
if ($status == '1') {
            $image = 'fas fa-times';
            $color = "btn btn-danger btn-sm";
            $txt = "ยกเลิกข้อมูล";
            $a_heft = "delete";
            $com_status = 'ปกติ';
        } else if ($status == '0') {
            $image = 'fas fa-check';
            $color = "btn btn-success btn-sm";
            $txt = "ยกเลิกการระงับ";
            $a_heft = "unremove";
            $com_status = 'ยกเลิก';

        }
        ?>
                            <tr>
                                <td width="5%"><?php echo $i; ?></td>
                                <td class="mem_id" width="20%">
                                    <?php echo $pay_id; ?>
                                </td>
                                <td width="15%">
                                    <?php echo $pay_total; ?>
                                </td>
                                <td width="15%">
                                    <?php echo DateThai1($pay_date); ?>
                                </td>
                                <td width="10%">
                                    <a href="#view_dialog" data-toggle="modal">
                                        <button type='button' class='btn btn-success btn-sm' id="edit" data="<?=$pay_id?>"
                                            data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-list"  style="color:white"></i></button>
                                    </a>
                                    <button type='button' class='<?=$color?>' id="cancel" data-dismiss="modal"
                                        data_id="<?=$pay_id?>" data-toggle="tooltip" title="<?=$txt?>"><i
                                            class="<?=$image?>" style="color:white"></i></button>

                                </td>

                    </div>
                </div>
                </tr>
            </div>

        </div>
        <?php
} // while loop
} // end if
?>
        </table>
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>


<script src="dist/js/apps/payment.js"></script>
  <div id="view_dialog" class="modal fade" role="dialog">
      <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
          <div class="modal-dialog modal-lg">
              <!-- Modal content-->
              <div class="modal-content" style="width: auto;">
                  <div class="modal-header">
                      <h5 class="modal-title card-title"><i class="ni ni-single-02"></i> ข้อมูลสินค้า
                      </h5>
                      <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                          <h3>&times;</h3>
                      </button>
                  </div>
                  <div class="modal-body">
                      <table width="100%" id="tbl_detail_product" class="text-center table">
                          <thead class="table-primary ">
                              <tr>
                                  <th>รหัส</th>
                                  <th>ชื่อ</th>
                                  <th>ราคา</th>
                                  <th>จำนวน</th>
                                  <th>รวม</th>
                              </tr>
                          </thead>
                      </table>

                  </div>

              </div>
          </div>
      </form>
  </div>