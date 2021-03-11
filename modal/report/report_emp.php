<!--สินค้ายอดนิยม-->
<div id="report_emp" class="modal fade" role="dialog">
    <form method="post" class="form-horizontal" role="form" action="report_emp.php" enctype="multipart/form-data" id="re_emp" target="_blank">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i> รายงานพนักงาน
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                        <h3>&times;</h3>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-4" align="right">
                            <label>ค้นหา : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select id="emp" class="form-control" name="emp">
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <option value="3">ทั้งหมด</option>
                                        <option value="1">สิทธิ์ผู้ใช้</option>
                                        <option value="4">วันที่</option>
                                        <option value="5">เดือน</option>
                                        <option value="6">ปี</option>
                                        <option value="2">สถานะ</option>

                                    </select>
                                    <span class="error_select"></span>
                                </div>
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>
                    <div class="row">
                        <div class="col-4" align="right">
                            <label>สิทธิ์ผู้ใช้งาน : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select id="type_emp" class="form-control" name="type_emp" readonly>
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <option value="1">ผู้ดูแลระบบ</option>
                                        <option value="2">พนักงาน</option>

                                    </select>
                                    <span class="error_select"></span>
                                </div>
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>


                    <div class="row">
                        <div class="col-4" align="right">
                            <label>วันที่เริ่มต้น : </label>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <input type="date" class="form-control" id="date_emp_pro1" name="date_emp_pro1" readonly placeholder="กรอกข้อมูลที่ต้องการค้นหา">
                            </div>
                        </div>

                        <div class="col-4" align="right">
                            <label>วันที่สิ้นสุด : </label>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <input type="date" class="form-control" id="date_emp_pro2" name="date_emp_pro2" readonly placeholder="กรอกข้อมูลที่ต้องการค้นหา">
                            </div>
                        </div>

                        <span style="color:red"> *</span>
                    </div>
                    <div class="row">
                        <div class="col-4" align="right">
                            <label>เดือน : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select id="month_emp_pro" class="form-control" name="month_emp_pro" readonly>
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <option value="1">มกราคม</option>
                                        <option value="2">กุมภาพันธ์</option>
                                        <option value="3">มีนาคม</option>
                                        <option value="4">เมษายน</option>
                                        <option value="5">พฤษภาคม</option>
                                        <option value="6">มิถุนายน</option>
                                        <option value="7">กรกฎาคม</option>
                                        <option value="8">สิงหาคม</option>
                                        <option value="9">กันยายน</option>
                                        <option value="10">ตุลาคม</option>
                                        <option value="11">พฤษจิกายน</option>
                                        <option value="12">ธันวาคม</option>
                                    </select>
                                    <span class="error_select"></span>
                                </div>
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>
                    <div class="row">
                        <div class="col-4" align="right">
                            <label>ปี : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select class="form-control sel_type" id="month_year_emp_pro" name="month_year_emp_pro" readonly>
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <?php
                                        $datenow = strtotime(date("Y-m-d"));
                                        $year = date('Y', $datenow) + 543;
                                        $year = intval($year);
                                        $endyear = $year - 10;
                                        for ($i = $year; $i >= $endyear; $i--) {
                                            $a = $i - 543
                                        ?>
                                            <option value="<?= $a ?>"><?php echo $i; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="error_select"></span>
                                </div>
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>
                    <div class="row">

                        <div class="col-4" align="right">
                            <label>สถานะ : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select id="status_emp" class="form-control" name="status_emp" readonly>
                                        <option selected value="2">----โปรดเลือก----</option>
                                        <option value="1">ปกติ</option>
                                        <option value="0">ลาออก</option>

                                    </select>
                                    <span class="error_select"></span>
                                </div>
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>




                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" align="right">
                                <button type="button" class="btn btn-outline-primary" name="btn_add" id="btn_emp">พิมพ์</button>
                            </div>
                        </div>
                        <div class="col-6" align="left">
                            <div class="form-group">
                                <button type="button" data-dismiss="modal" id="cn_emp" class="btn btn-outline-danger">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>