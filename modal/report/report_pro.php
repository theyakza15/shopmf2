<div id="report_product" class="modal fade" role="dialog">
    <form method="post" class="form-horizontal" role="form" action="report_product.php" enctype="multipart/form-data" id="re_product" target="_blank">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i> รายงานข้อมูลสินค้า
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
                                    <select id="product" class="form-control" name="product">
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <option value="5">ทั้งหมด</option>
                                        <option value="1">กำหนดเอง</option>
                                        <!-- <option value="2">กลุ่มสินค้า</option> -->
                                        <!-- <option value="3">ไซส์</option>
                                        <option value="4">สี</option> -->
                                        
                                        
                                        
                                    </select>
                                    <span class="error_select"></span>
                                </div>
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>
                    <div class="row">

                        <div class="col-4" align="right">
                            <label>ประเภท : </label>
                        </div>
                        <div class="col-7">
                        <div class="dropdown">
                                <div class="form-group">
                                    <select id="type_pro" class="form-control" name="type_pro" readonly>
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <?php
                                                            $sql = "SELECT * FROM tb_type WHERE status ='1'";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                $type_id = $row['ty_id'];
                                                                $type_name = $row['ty_name'];
                                                            ?>
                                                                <option value="<?= $type_id ?>"><?= $type_name ?></option>
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
                            <label>กลุ่ม : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select id="gr_pro" class="form-control" name="gr_pro" readonly>
                                        <option selected value="0">----โปรดเลือก----</option>
                                        <?php
                                                            $sql = "SELECT * FROM tb_group WHERE status ='1'";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                $gr_id = $row['gr_id'];
                                                                $gr_name = $row['gr_name'];
                                                            ?>
                                                                <option value="<?= $gr_id ?>"><?= $gr_name ?></option>
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
                            <label>ไซส์ : </label>
                        </div>
                        <div class="col-7">
                            <div class="dropdown">
                                <div class="form-group">
                                    <select id="si_pro" class="form-control" name="si_pro" readonly>
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
                                    <select id="co_pro" class="form-control" name="co_pro" readonly>
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
                    </div>

                <div class="row">
                  <div class="col-6">
                      <div class="form-group" align="right">
                          <button type="" class="btn btn-outline-primary" name="btn_add"
                              id="btn_re_pro">พิมพ์</button>
                      </div>
                  </div>
                  <div class="col-6" align="left">
                      <div class="form-group">
                          <button type="button" data-dismiss="modal" id ="cn_pro" class="btn btn-outline-danger">ยกเลิก</button>
                      </div>
                  </div>
              </div>
                </div>

            </div>
        </div>
    </form>
</div>