<div id="edit_empp<?php echo $emp_id; ?>" class="modal fade edit_user" role="dialog">
    <form method="post" class="form-horizontal Update" role="form" data='<?= $emp_id ?>' id="edit_user" enctype="multipart/form-data" autocomplete="off">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                        แก้ไขข้อมูลพนักงาน</h5>
                    <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                        <h3>&times;</h3>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">


                            <div class="col-4" align="center">
                                <div class="fileinput fileinput-new text-center a" data-provides="fileinput" align="center">
                                    <img src="images/<?= $emp_pic ?>" alt="..." align="center" width="150px" id="img_fileupload"><br><br>
                                    <input type="file" name="edit_upload_emp" id="edit_pload_emp" />
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>รหัสพนักงาน : </label>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="edit_empid<?= $emp_id ?>" placeholder="รหัสพนักงาน" readonly value="<?php echo $emp_id ?>" name="empid">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>ชื่อ </label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_name<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empname" required value="<?php echo $emp_name; ?>">

                                    </div>
                                </div>

                                <span style="color:red"> *</span>

                                <div class="col-2" align="right">
                                    <label>นามสกุล </label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_surname<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="surname" required value="<?php echo $emp_surname; ?>">

                                    </div>
                                </div>
                                <span style="color:red"> *</span>

                            </div>

                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>เลขบัตร : </label>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_number<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empczid" readonly value="<?php echo $emp_czid; ?>">

                                    </div>
                                </div>
                                <span style="color:red"> *</span>
                            </div>


                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>วันที่เข้าทำงาน : </label>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <input type="date" class="form-control check-type-name" id="emp_hbd<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="hbd" readonly value="<?php echo $emp_bd; ?>">

                                    </div>
                                </div>

                                <span style="color:red"> *</span>
                            </div>


                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>เพศ : </label>
                                </div>
                                <div class="col-2">
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="edit_M<?= $emp_id ?>" type="radio" value="1" <?php if ($emp_sex == '1') {
                                                                                                                                                echo "checked";
                                                                                                                                            }
                                                                                                                                            ?>>
                                        <label class="custom-control-label" for="edit_M<?= $emp_id ?>">ชาย </label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="custom-control custom-radio mb-3">
                                        <input name="gender" class="custom-control-input" id="edit_F<?= $emp_id ?>" type="radio" value="2" <?php if ($emp_sex == '2') {
                                                                                                                                                echo "checked";
                                                                                                                                            }
                                                                                                                                            ?>>
                                        <label class="custom-control-label" for="edit_F<?= $emp_id ?>">หญิง </label>
                                    </div>
                                </div>

                            </div>




                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>เบอร์โทร :</label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-number-emp" id="emp_number<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empnumber" required value="<?php echo $emp_number; ?>">

                                    </div>
                                </div>
                                <span style="color:red"> *</span>

                                <div class="col-2" align="right">
                                    <label>Email : </label>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-email-emp" id="emp_email<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empemail" required value="<?php echo $emp_email; ?>">

                                    </div>
                                </div>
                                <span style="color:red"> *</span>
                            </div>


                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>บ้านเลขที่ : </label>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_numhome<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empnumhome" required value="<?php echo $emp_numhome; ?>">

                                    </div>
                                </div>
                                <span style="color:red"> *</span>


                                <div class="col-2" align="right">
                                    <label>หมู่ : </label>
                                </div>
                                <div class="col-1">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_mu<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empmuu" required value="<?php echo $emp_muu; ?>">

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>ซอย : </label>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_alley<?= $emp_id ?>" placeholder=" " name="empalley" required value="<?php echo $emp_alley; ?>">

                                    </div>
                                </div>
                                <div class="col-3" align="right">
                                    <label>ถนน : </label>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_road<?= $emp_id ?>" placeholder=" " name="emproad" required value="<?php echo $emp_road; ?>">

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>ตำบล : </label>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_coun<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empcounty" required value="<?php echo $emp_county; ?>">

                                    </div>
                                </div>
                                <span style="color:red"> *</span>
                                <div class="col-3" align="right">
                                    <label>อำเภอ : </label>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_dis<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empdis" required value="<?php echo $emp_district; ?>">

                                    </div>

                                </div>
                                <span style="color:red"> *</span>
                            </div>

                            <div class="row">
                                <div class="col-0" align="right">
                                    <label>จังหวัด : </label>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_provi<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empprovi" required value="<?php echo $emp_province; ?>">

                                    </div>

                                </div>
                                <span style="color:red"> *</span>
                                <div class="col-3" align="right">
                                    <label>รหัสไปรษณีย์ : </label>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control check-type-name" id="emp_zicode<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="empzicode" required value="<?php echo $emp_posnum; ?>">

                                    </div>

                                </div>
                                <span style="color:red"> *</span>
                            </div>


                            <div class="modal-footer">
                                <div class="form-group" align="right">
                                    <button type="submit" class="btn btn-outline-primary" data-id='<?= $emp_id ?>' id="btn_update_emp">บันทึก</button>
                                </div>
                                <div class="form-group">
                                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </form>
</div>