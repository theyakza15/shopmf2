<?php
require("sidebar.php");
require "connect.php";

date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$m = date('m', $datenow);

$sqlm = "SELECT max(pay_id) as Maxid  FROM paymant";
$result = mysqli_query($conn, $sqlm);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
$tmp1 = "PM";
$tmp2 = substr($mem_old, 6, 3);
$Year = substr($mem_old, 2, 2);
$month = substr($mem_old, 4, 2);
$sub_date = substr($d, 2, 2);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //$sub_date = $sub_date + 1;
} else {
    $tmp2;
}

if ($month != $m) {
    $tmp2 = 0;
} else {
    $tmp2;
}

$t = $tmp2 + 1;

$a = sprintf("%03d", $t);

$pay_id = $tmp1 . $sub_date . $m . $a;
?>
<!-- End Navbar -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ขายสินค้า</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="card shadow">
            <div class="card-body">
                <div class="nav-wrapper">


                </div>
                
                <!-- ปิด tab แรก -->
                <div class="row">
                    <div class="col-2" align="right">
                        <label>รหัสขายสินค้า </label>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="stock_id" readonly placeholder="รหัสประเภทสินค้า" value="<?php echo $pay_id; ?>" name="sto_id">
                        </div>
                    </div>

                    <!-- <div class="col-2" align="right">
                        <label>ประเภท : </label>
                    </div>
                    <div>
                        <label class="radio-inline"><input value="1" type="radio" name="optradio" checked id="p"> ขายปลีก </label>
                        <label class="radio-inline"><input value="2" type="radio" name="optradio" id="s"> ขายส่ง </label>
                    </div> -->
                </div>


                <div class="row">
                    <div class="col-2" align="right">
                        <label>ประเภทสินค้า : </label>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select class="form-control" id="type_product">
                                <option value="0">กรุณาเลือกประเภท</option>
                                <?php
                                $sql_edit_pro = "SELECT * FROM tb_type WHERE status ='1'";
                                $result2 = mysqli_query($conn, $sql_edit_pro);
                                while ($row2 = $result2->fetch_assoc()) {
                                    $type_id = $row2['ty_id'];
                                    $type_name = $row2['ty_name'];
                                ?>
                                    <option value="<?= $type_id ?>"><?= $type_name ?></option>
                                <?php
                                }
                                ?>

                            </select>

                        </div>
                    </div>

                    <div class="col-2" align="right">
                        <label>กลุ่มสินค้า : </label>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control" id="group_product">
                                <option value="0">กรุณาเลือกกลุ่มสินค้า</option>
                            </select>

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-2" align="right">
                        <label>ชื่อสินค้า : </label>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select class="form-control" id="product_name">
                                <option value="0">กรุณาเลือกสินค้า</option>
                            </select>


                        </div>
                    </div>

                    <div class="col-2" align="right">
                        <label>Size : </label>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control" id="size_product">
                                <option value="0">กรุณาเลือก Size</option>
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">
                   <!--  <div class="col-2" align="right">
                        <label>รายการสินค้าทั้งหมด : </label>
                    </div> -->
                    <div class="col-3">
                        <input type="hidden" class="form-control" id="count" readonly placeholder="รายการสินค้า" value="" name="sto_id">
                    </div>

                  <!--   <div class="col-2" align="right">
                        <label>ยอดชำระ : </label>
                    </div> -->
                    <div class="col-4">
                        <input type="hidden" class="form-control" id="total_price" readonly placeholder="จำนวนเงิน" value="" name="sto_id">
                    </div>
                </div>
 


                <br>
                <div class="row">
                    <div class="col-12" align="center">
                        <button type="button" class="btn btn-primary" id="btn_add_list">เพิ่ม</button>
                        <button type="button" class="btn btn-warning " data-toggle="modal" id='btn_con' data-target="#sale_price"><i class="ni ni-fat-add"></i>
                            ชำระ</button>
                        <button type="button" class="btn btn-danger" id="btn_cancel_sale">ยกเลิก</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center" id="tb_product" width="100%">
                            <thead class="table-info">
                                <th>เลือก</th>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>สี</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>

                            </thead>


                        </table>
                    </div>
                </div>
                <!-- Add บุคคลทั่วไป -->
                <br>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center" id="tb_product_list" width="100%">
                            <thead class="table-info">
                                <th>ลำดับ</th>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>สี</th>
                                <th>จำนวน</th>
                                <th>ส่วนลด</th>
                                <th>ราคารวม</th>
                                
                                <th>#</th>
                            </thead>

                        </table>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>

    <?php
require("./modal/sale/model_sale_price.php");
?>


    <!--   Core JS Files   -->


    </body>

    <script src="dist/js/apps/sale.js"></script>



    </html>