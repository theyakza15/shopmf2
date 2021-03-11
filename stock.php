<?php
require("sidebar.php");
require "connect.php";
//-----------------------------------------------------
//run id
/* @session_start();
$nameall = $_SESSION['firstName']." ".$_SESSION['lastName'];
 */
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$m = date('m', $datenow);

$sqlm = "SELECT max(st_id) as Maxid  FROM tb_stock";
$result = mysqli_query($conn, $sqlm);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
$tmp1 = "ST";
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

$stock_id = $tmp1 . $sub_date . $m . $a;
?>
<!-- End Navbar -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">รับสินค้า</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">

        <div class="card shadow">
            <div class="card-body">
                <div class="nav-wrapper">

                    <ul class="nav nav-pills nav-fill flex-column flex-md-row nav-tabs" id="tabs-icons-text" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tab1" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="ni ni-single-02"></i>
                                ข้อมูลการรับสินค้า</a>
                        </li>
                        <li class="nav-item nextab">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab2" data-toggle="tab" href="#menu1" role="tab" aria-controls="menu1" aria-selected="false"><i class="ni ni-cart"></i>
                                เพิ่มข้อมูลการรับสินค้า</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div class="row">
                            <div class="col-12">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-bordered text-center" id="tb_stock" width="100%">
                                    <thead class="table-info">
                                        <th>ลำดับ</th>
                                        <th>รหัสการรับสินค้า</th>
                                        <th>วันที่รับสินค้า</th>
                                        <th>จำนวน</th>
                                        <th>ผู้รับ</th>
                                        <th>สถานะ</th>
                                        <th>วิธีการ</th>
                                    </thead>

                            </div>

                        </div>
                        </table>
                    </div>
                </div>
            </div>
            <div id="viewcom" class="modal fade" role="dialog">
                <form method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content" style="width: auto">
                            <div class="modal-header">
                                <h5 class="modal-title card-title" style="width: 100% "><i class="ni ni-single-02"></i>
                                    รายละเอียดรายการ
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" style="width:10%;">
                                    <h3>&times;</h3>
                                </button>
                            </div><br>
                            <div class="modal-body">
                                <table id="tbl_detail_payment" class="table table-striped table-bordered text-center" width="100%">
                                    <thead class="table-primary ">
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>รหัส</th>
                                            <th>ประเภทสินค้า</th>
                                            <th>กลุ่มสินค้า</th>
                                            <th>ชื่อสินค้า</th>
                                            <th>Size</th>
                                            <th>สี</th>
                                            <th>จำนวน</th>

                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ปิด tab แรก -->
            <div class="tab-pane fade" id="menu1" role="tabpanel" aria-labelledby="profile-tab">
                <br>

                <div class="row">
                    <div class="col-2" align="right">
                        <label>รหัสรับสินค้า </label>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <input type="text" class="form-control" id="stock_id" readonly placeholder="รหัสประเภทสินค้า" value="<?php echo $stock_id; ?>" name="sto_id">
                        </div>
                    </div>
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
                    <div class="col-3">
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
                    <div class="col-3">
                        <div class="form-group">
                            <select class="form-control" id="size_product">
                                <option value="0">กรุณาเลือก Size</option>
                            </select>
                        </div>
                    </div>

                </div>



                <div class="row">
                    <div class="col-2" align="right">
                        <label>วันที่รับสินค้า : </label>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="datetime-local" class="form-control " id="date_stock" placeholder="กรุณากรอกข้อมูล" name="date_stock" required>

                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12" align="center">
                        <button type="button" class="btn btn-primary" id="btn_add_list">เพิ่ม</button>
                        <button type="button" class="btn btn-warning" id="btn_save">บันทึก</button>
                        <button type="button" class="btn btn-danger" id="btn_cancel_stock">ยกเลิก</button>
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
                                <th>เลือก</th>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>สี</th>
                                <th>จำนวน</th>
                                <th>#</th>
                            </thead>

                        </table>
                    </div>
                </div>
                </form>


                <!--   Core JS Files   -->


                </body>

                <script src="dist/js/apps/stock.js"></script>



                </html>