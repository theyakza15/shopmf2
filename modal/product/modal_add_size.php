<div id="add_size" class="modal fade edit_user" role="dialog">
    
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                        Size</h5>
                    <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                        <h3>&times;</h3>
                    </button>
                </div>
                <br>
                <div class="modal-body"> 
                
                
                
                <div class="row">
                        <div class="col-4" align="right">
                            <label>Size : </label>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <select class="form-control " id="size_product" name="size_product" >
                                <option value="0">กรุณาเลือก Size</option>
                            <?php
                                    $sql_edit_pro = "SELECT * FROM tb_size WHERE status ='1'";
                                    $result2 = mysqli_query($conn, $sql_edit_pro);
                                    while ($row2 = $result2->fetch_assoc()) {
                                        $size_id = $row2['si_id'];
                                        $size_name = $row2['si_name'];
                                    ?>
                                        <option value="<?= $size_id ?>"><?= $size_name ?></option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                    </div>



                <div class="row">
                    <div class="col-4" align="right">
                        <label>ราคา : </label>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <input type="text" class="form-control " id="price_pro" placeholder="กรุณากรอกชื่อสินค้า" name="price_pro" required>

                        </div>
                    </div>
                </div>

             
                <input type ="hidden" id= "hd_size_id" name= "hd_size_id"  > 
                <input type ="hidden" id= "hd_pd_id" name= "hd_pd_id"  > 



                </div>
                    <div class="row">
                                <div class="col-5">
                                    <div class="form-group" align="right">
                                        <button type="button" class="btn btn-outline-success" name="btn_add" id="add_pro_size">บันทึก</button>
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