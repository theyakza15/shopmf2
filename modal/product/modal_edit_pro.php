<div id="edit_product" class="modal fade edit_user" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="width: auto;">
            <div class="modal-header">
                <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                    แก้ไขสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                    <h3>&times;</h3>
                </button>
            </div>
            <br>
            <div class="modal-body">

                <div class="col5" align="center">
                    <div class="fileinput fileinput-new text-center a" data-provides="fileinput" align="center">
                        <img src="images/upload-1.png" alt="..." align="center" width="150px" id="edit_img_fileupload"><br><br>
                        <input type="file" name="edit_upload_product" id="edit_upload_product" />
                    </div>

                </div>
                <br>

                <div class="row">
                    <div class="col-4" align="right">
                        <label>รหัสสินค้า : </label>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control" id="edit_product_id" readonly placeholder="รหัสประเภทสินค้า" value="test" name="edit_pro_id">
                        </div>
                    </div>
                </div>

                <input type="hidden" id="hd_group_name" name="hd_group_name">

                <div class="row">

                <div class="col-4" align="right">
                            <label>กลุ่มสินค้า : </label>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <select class="form-control edit_checkpro " name="edit_product_group" id="edit_group_product">
                                <option value="0">กรุณาเลือกกลุ่มสินค้า</option>
                                <?php
                                    $sql_edit_pro = "SELECT * FROM tb_group WHERE status ='1'";
                                    $result2 = mysqli_query($conn, $sql_edit_pro);
                                    while ($row2 = $result2->fetch_assoc()) {
                                        $gr_id = $row2['gr_id'];
                                        $gr_name = $row2['gr_name'];
                                    ?>
                                        <option value="<?= $gr_id ?>"><?= $gr_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                </div>




                    <div class="row">
                        <div class="col-4" align="right">
                            <label>ชื่อสินค้า : </label>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control edit_check " id="edit_pro_name" placeholder="กรุณากรอกชื่อสินค้า" name="edit_pro_name" required>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="form-group" align="right">
                            <button type="submit" class="btn btn-outline-success" name="btn_add" id="edit_pro">บันทึก</button>
                        </div>
                    </div>
                    <div class="col-6" align="left">
                        <div class="form-group">
                            <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                        </div>
                    </div>
                </div>

                <br>


            </div>
        </div>

    </div>