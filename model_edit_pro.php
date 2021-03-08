    <div id="edit_pro<?php echo $pd_id; ?>" class="modal fade edit_user" role="dialog">
                                                <form method="post" class="form-horizontal Update" role="form" data='<?=$pd_id?>'
                                                id="edit_user" enctype="multipart/form-data" autocomplete="off">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content" style="width: auto;">
                                                <div class="modal-header">
                                                <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                                                    แก้ไขข้อมูลสินค้า</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    style="width:50px;">
                                                    <h3>&times;</h3>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="row">
                                                    <div class="col-sm-8">
                                                        <div class="row">
                                                            <div class="col-4" align="right">
                                                                <label>รหัสสินค้า : </label>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        id="edit_pro<?=$pd_id?>"
                                                                        placeholder="รหัสสี" disabled
                                                                        value="<?php echo $pd_id ?>" name="userID">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4" align="right">
                                                                <label>ชื่อประเภท : </label>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group">
                                                                <select name="select_type" class="form-control sel_type" id="gr_type<?=$gr_id?>">
                                                <option value="0">----โปรดเลือก----</option>
                                                <?php
                                                            $sql2 = "SELECT * FROM tb_type WHERE status ='1'";
                                                            $result2 = mysqli_query($conn, $sql2);
                                                            while ($row2 = $result2->fetch_assoc()) {
                                                                $edit_type_id = $row2['ty_id'];
                                                                $edit_type_name = $row2['ty_name'];
                                                            ?>
                                               <option value="<?= $edit_type_id ?>"<?php if($edit_type_id==$type_id){echo "selected";}?>> <?= $edit_type_name ?></option>
                                            <?php               
                                            }
                                            ?>
                                            </select>

                                                                </div>
                                                            </div>
                                                            <span style="color:red"> *</span>
                                                        </div>



                                                        <div class="row">
                                                            <div class="col-4" align="right">
                                                                <label>ชื่อกลุ่มสินค้า : </label>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group">
                                                                <select name="select_type" class="form-control sel_type" id="gr_type<?=$gr_id?>">
                                                <option value="0">----โปรดเลือก----</option>
                                                <?php
                                                            $sql2 = "SELECT * FROM tb_type WHERE status ='1'";
                                                            $result2 = mysqli_query($conn, $sql2);
                                                            while ($row2 = $result2->fetch_assoc()) {
                                                                $edit_type_id = $row2['ty_id'];
                                                                $edit_type_name = $row2['ty_name'];
                                                            ?>
                                               <option value="<?= $edit_type_id ?>"<?php if($edit_type_id==$type_id){echo "selected";}?>> <?= $edit_type_name ?></option>
                                            <?php               
                                            }
                                            ?>
                                            </select>

                                                                </div>
                                                            </div>
                                                            <span style="color:red"> *</span>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-4" align="right">
                                                                <label>ชื่อสินค้า : </label>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control check-type-name"
                                                                        id="pro_name<?=$pd_id?>"
                                                                        placeholder="กรุณากรอกข้อมูล" name="namepro"
                                                                        required value="<?php echo $pd_name; ?>">

                                                                </div>
                                                            </div>
                                                            <span style="color:red"> *</span>
                                                        </div>




                                                        <div class="row">
                                                            <div class="col-4" align="right">
                                                                <label>ราคา : </label>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control check-type-name"
                                                                        id="pro_price<?=$pd_id?>"
                                                                        placeholder="กรุณากรอกข้อมูล" name="namepro"
                                                                        required value="<?php echo $pd_price; ?>">

                                                                </div>
                                                            </div>
                                                            <span style="color:red"> *</span>
                                                        </div>


                                                        <div class="modal-footer">
                                                            <div class="form-group" align="right">
                                                                <button type="button" class="btn btn-outline-primary"
                                                                    data-id='<?=$pd_id?>' 
                                                                    id="btn_update_pro">บันทึก</button>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="button" class="btn btn-outline-danger"
                                                                    data-dismiss="modal">ยกเลิก</button>
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                            </div>

 