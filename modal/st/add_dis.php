<?php
//Run id
require 'connect.php';
?>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add_dis">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="width: auto;">
                                    <div class="modal-header">
                                        <h5 class="modal-title card-title"><i class="ni ni-single-02"></i> ข้อมูลส่วนลด</h5>
                                        <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                            <h3>&times;</h3>
                                        </button>
                                    </div>
                                    <!-- ออกแบบตรงนี้ -->

                                    <div class="modal-body">
                                        <form role="form" method="POST" action="" enctype="multipart/form-data" class="insert" id="myForm">
                                            <div class="row">
                                                <div class="col-4" align="right">
                                                    <label>รหัสส่วนลด  : </label>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="dis_id" readonly placeholder="รหัสส่วนลด" value="<?php echo $dis_runid; ?>" name="dis_id">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-4" align="right">
                                                    <label>สินค้า : </label>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                    <select class="form-control form-control-lg" id="add_prodis" name="sel_prodis">
                                                            <option value="0">กรุณาเลือกสินค้า</option>
                                                            <?php
                                                            $sql = "SELECT * FROM tb_product WHERE status ='1'";
                                                            $result = mysqli_query($conn, $sql);
                                                            while ($row = $result->fetch_assoc()) {
                                                                $p_id = $row['pd_id'];
                                                                $p_name = $row['pd_name'];
                                                            ?>
                                                                <option value="<?= $p_id ?>"><?= $p_name ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                                <div class="row">
                                                <div class="col-4" align="right">
                                                    <label>จำนวน : </label>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control " id="am_dispro" placeholder="กรุณากรอกข้อมูล" name="am_dispro" required>
                                                    </div>
                                                </div>
                                            </div>





                                            <div class="row">
                                                <div class="col-4" align="right">
                                                    <label>ส่วนลด : </label>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control " id="dis_name" placeholder="กรุณากรอกข้อมูล" name="dis_name" required>
                                                    </div>
                                                </div>
                                            </div>


                                            
                                            







                                    </div>








                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group" align="right">
                                                <button type="button" class="btn btn-outline-success" name="btn_add" id="adddis">บันทึก</button>
                                            </div>
                                        </div>
                                        <div class="col-6" align="left">
                                            <div class="form-group">
                                                <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>