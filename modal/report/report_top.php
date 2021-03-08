
<!--สินค้ายอดนิยม-->
<div id="report_top" class="modal fade" role="dialog">
    <form method="post" class="form-horizontal" role="form" action="report_top.php"  enctype="multipart/form-data" id="re_top" target="_blank">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i> รายงานสรุปสินค้ายอดนิยม
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
                                    <select id="top" class="form-control" name="top_pro" >
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <option value="7">ทั้งหมด</option>
                                        <!-- <option value="1">สินค้า</option>
                                        <option value="2">ไซส์</option>
                                        <option value="3">สี</option> -->
                                        <option value="6">วันที่</option>
                                        <option value="4">เดือน</option>
                                        <option value="5">ปี</option>
                                        
                                        
                                    </select>
                                    <span class="error_select"></span>
                                </div>
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>
                    <!-- <div class="row">
                        <div class="col-4" align="right">
                            <label>สินค้า : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select id="top_product" class="form-control" name="top_product" readonly>
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <?php
                                                            $sql = "SELECT * FROM tb_product WHERE status ='1'";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                $pd_id = $row['pd_id'];
                                                                $pd_name = $row['pd_name'];
                                                            ?>
                                                                <option value="<?= $pd_id ?>"><?= $pd_name ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                    </select>
                                    <span class="error_select"></span>
                                </div>
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div> -->
                    <!-- <div class="row">
                        <div class="col-4" align="right">
                            <label>ไซส์ : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select id="top_si" class="form-control" name="top_si" readonly>
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <?php
                                                            $sql = "SELECT * FROM tb_size WHERE status ='1'";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                $si_id = $row['si_id'];
                                                                $si_name = $row['si_name'];
                                                            ?>
                                                                <option value="<?= $si_id ?>"><?= $si_name ?></option>
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
                            <label>สี : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select id="top_co" class="form-control" name="top_co" readonly>
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <?php
                                                            $sql = "SELECT * FROM tb_color WHERE status ='1'";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                $co_id = $row['co_id'];
                                                                $co_name = $row['co_name'];
                                                            ?>
                                                                <option value="<?= $co_id ?>"><?= $co_name ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                    </select>
                                    <span class="error_select"></span>
                                </div>
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div> -->







                    <div class="row">
                        <div class="col-4" align="right">
                            <label>วันที่เริ่มต้น : </label>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <input type="date" class="form-control" id="date_top_pro1" name="date_top_pro1" readonly
                                    placeholder="กรอกข้อมูลที่ต้องการค้นหา">
                            </div>
                        </div>

                        <div class="col-4" align="right">
                            <label>วันที่สิ้นสุด : </label>
                        </div>
                        <div class="col-7">
                            <div class="form-group">
                                <input type="date" class="form-control" id="date_top_pro2" name="date_top_pro2" readonly
                                    placeholder="กรอกข้อมูลที่ต้องการค้นหา">
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
                                    <select id="month_top_pro" class="form-control" name="month_top_pro"readonly>
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
                                    <select id="month_year_top_pro" class="form-control" name="month_year_top_pro"readonly>
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <?php
$count = 2600;
for ($i = 2560; $i < $count; $i++) {
    $a = $i - 543;
    ?>
                                        <option value="<?=$a?>"><?php echo $i; ?></option>
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
                  <div class="col-6">
                      <div class="form-group" align="right">
                          <button type="button" class="btn btn-outline-primary" name="btn_print_in_pro"
                              id="btn_top">พิมพ์</button>
                      </div>
                  </div>
                  <div class="col-6" align="left">
                      <div class="form-group">
                          <button type="button" data-dismiss="modal" id ="cn_top" class="btn btn-outline-danger">ยกเลิก</button>
                      </div>
                  </div>
              </div>
                </div>

            </div>
        </div>
    </form>
</div>