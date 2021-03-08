<?php
include "sidebar.php";
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ออกรายงาน</h1>
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
                    <div class="col-sm-8">
                        <div class="row">
                            <div class="col-4" align="right">
                                <label>รายงาน : </label>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <select class="form-control form-control-lg" id="sel_report" name="sel_report">
                                        <option value="0">กรุณาเลือกประเภทรายงาน</option>
                                        <option value="6">รายงานพนักงาน</option>
                                        <option value="1">รายงานข้อมูลสินค้า</option>
                                        <option value="2">รายงานข้อมูลรับเข้าสินค้า</option>
                                        <option value="3">รายงานสรุปสินค้าคงคลัง</option>
                                        <option value="4">รายงานยอดขาย</option>
                                        <option value="5">รายงานสรุปสินค้ายอดนิยม</option>
                                        
                                    </select>
                                </div>
                            </div>
                            <span style="color:red"> *</span>

                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div><!-- /.container-fluid -->
</div>
</section>
<!-- /.content -->
</div>
 <script src="dist/js/apps/report.js"></script> 
<?php
require("./modal/report/report_top.php");
require("./modal/report/report_sto.php");
require("./modal/report/report_stk.php");
require("./modal/report/report_pro.php");
require("./modal/report/report_paym.php");
require("./modal/report/report_emp.php");
?>
