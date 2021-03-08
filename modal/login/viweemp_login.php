<div id="view_dialog<?php echo $emp_id; ?>" class="modal fade view_user" role="dialog">
     <form method="post" class="form-horizontal Update" role="form" data='<?= $emp_id ?>' id="view_user" enctype="multipart/form-data" autocomplete="off">
         <div class="modal-dialog modal-lg">
             <div class="modal-content" style="width: auto;">
                 <div class="modal-header">
                     <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                         ข้อมูลพนักงาน</h5>
                     <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                         <h3>&times;</h3>
                     </button>
                 </div>
                 <div class="modal-body">
                     <div class="row">
                         <div class="col-sm-12">


                              <div class="col-4" align="center">
                                 <div class="fileinput fileinput-new text-center a" data-provides="fileinput" align="center">
                                     <img src="images/<?= $emp_pic?>" alt="..." align="center" width="150px" id="img_fileupload"><br><br>
                                    
                                 </div>

                             </div> 
                             <br>
                             <div class="row">
                                 <div class="col-0" align="right">
                                     <label>รหัสพนักงาน : </label>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                         <input type="text" class="form-control" id="view_empid<?= $emp_id ?>" placeholder="รหัสพนักงาน" readonly value="<?php echo $emp_id ?>" name="empid">
                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="col-0" align="right">
                                     <label>ชื่อ </label>
                                 </div>
                                 <div class="col-4">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_name<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewname" readonly value="<?php echo $emp_name; ?>">

                                     </div>
                                 </div>

                                

                                 <div class="col-2" align="right">
                                     <label>นามสกุล </label>
                                 </div>
                                 <div class="col-4">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_surname<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewsurname" readonly value="<?php echo $emp_surname; ?>">

                                     </div>
                                 </div>
                                 

                             </div>

                             <div class="row">
                                 <div class="col-0" align="right">
                                     <label>เลขบัตร : </label>
                                 </div>
                                 <div class="col-5">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_number<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewczid" readonly value="<?php echo $emp_czid; ?>">

                                     </div>
                                 </div>
                                 
                             </div>


                             <div class="row">
                                 <div class="col-0" align="right">
                                     <label>วันเกิด : </label>
                                 </div>
                                 <div class="col-5">
                                     <div class="form-group">
                                         <input type="date" class="form-control check-type-name" id="view_hbd<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewhbd" readonly value="<?php echo $emp_bd; ?>">

                                     </div>
                                 </div>

                                 
                             </div>


                             <div class="row">
                                 <div class="col-0" align="right">
                                     <label>เพศ : </label>
                                 </div>
                                 <div class="col-2">
                                     <div class="custom-control custom-radio mb-3">
                                         <input name="gender" class="custom-control-input" id="view_M<?= $emp_id ?>" type="radio" readonly  value="1" <?php if ($emp_sex == '1') {
                                                                                                                                                echo "checked";
                                                                                                                                            }
                                                                                                                                            ?>>
                                         <label class="custom-control-label" for="edit_M<?= $emp_id ?>">ชาย </label>
                                     </div>
                                 </div>
                                 <div class="col-3">
                                     <div class="custom-control custom-radio mb-3">
                                         <input name="gender" class="custom-control-input" id="view_F<?= $emp_id ?>" type="radio" readonly value="2" <?php if ($emp_sex == '2') {
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
                                         <input type="text" class="form-control check-number-emp" id="view_number<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewnumber" readonly value="<?php echo $emp_number; ?>">

                                     </div>
                                 </div>
                                 

                                 <div class="col-2" align="right">
                                     <label>Email : </label>
                                 </div>
                                 <div class="col-4">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-email-emp" id="view_email<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewemail" readonly value="<?php echo $emp_email; ?>">

                                     </div>
                                 </div>
                                 
                             </div>


                             <div class="row">
                                 <div class="col-0" align="right">
                                     <label>บ้านเลขที่ : </label>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_numhome<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewnumhome" readonly value="<?php echo $emp_numhome; ?>">

                                     </div>
                                 </div>
                                 


                                 <div class="col-2" align="right">
                                     <label>หมู่ : </label>
                                 </div>
                                 <div class="col-1">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_mu<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewmuu" readonly value="<?php echo $emp_muu; ?>">

                                     </div>
                                 </div>
                             </div>

                             <div class="row">
                                 <div class="col-0" align="right">
                                     <label>ซอย : </label>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_alley<?= $emp_id ?>" placeholder=" " name="viewalley" readonly value="<?php echo $emp_alley; ?>">

                                     </div>
                                 </div>
                                 <div class="col-3" align="right">
                                     <label>ถนน : </label>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_road<?= $emp_id ?>" placeholder=" " name="viewroad" readonly value="<?php echo $emp_road; ?>">

                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                 <div class="col-0" align="right">
                                     <label>ตำบล : </label>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_coun<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewcounty" readonly value="<?php echo $emp_county; ?>">

                                     </div>
                                 </div>
                                 
                                 <div class="col-3" align="right">
                                     <label>อำเภอ : </label>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_dis<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewdis" readonly value="<?php echo $emp_district; ?>">

                                     </div>

                                 </div>
                                 
                             </div>

                             <div class="row">
                                 <div class="col-0" align="right">
                                     <label>จังหวัด : </label>
                                 </div>
                                 <div class="col-3">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_provi<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewprovi" readonly value="<?php echo $emp_province; ?>">

                                     </div>

                                 </div>
                                 
                                 <div class="col-3" align="right">
                                     <label>รหัสไปรษณีย์ : </label>
                                 </div>
                                 <div class="col-2">
                                     <div class="form-group">
                                         <input type="text" class="form-control check-type-name" id="view_zicode<?= $emp_id ?>" placeholder="กรุณากรอกข้อมูล" name="viewzicode" readonly value="<?php echo $emp_posnum; ?>">

                                     </div>

                                 </div>
                                 
                             </div>


                         </div>
                     </div>

                 </div>
             </div>

         </div>
     </form>
 </div>
