<div id="edit_color" class="modal fade edit_user" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                       แก้ไขColor</h5>
                    <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                        <h3>&times;</h3>
                    </button>
                </div>
                <br>
                <div class="modal-body"> 
                    
                <input type ="hidden" id= "edit_hd_pd_iddet" name= "edit_hd_pd_iddet"  >     
                <!-- <input type ="text" id= "edit_hd_color_id" name= "edit_hd_color_id"  >  -->
                

                <div class="row">
                <div class="col-4" align="right">
                            <label>สี : </label>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <select class="form-control checkcolor" id="edit_color_product" name="edit_color_product">
                                <option value="0">กรุณาเลือกสี</option>
                            <?php
                                    $sql_edit_pro = "SELECT * FROM tb_color WHERE status ='1'";
                                    $result2 = mysqli_query($conn, $sql_edit_pro);
                                    while ($row2 = $result2->fetch_assoc()) {
                                        $color_id = $row2['co_id'];
                                        $color_name = $row2['co_name'];
                                    ?>
                                        <option value="<?= $color_id ?>"><?= $color_name ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>

                    </div>


             
               




                </div>
                    <div class="row">
                                <div class="col-5">
                                    <div class="form-group" align="right">
                                        <button type="button" class="btn btn-outline-success" name="btn_add" id="edit_pro_color">บันทึก</button>
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