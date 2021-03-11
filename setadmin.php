<?php
require("sidebar.php");


?>
<!-- End Navbar -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">สิทธิ์พนักงาน</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">

        <div class="card shadow">
            <div class="card-body">
                <div class="nav-wrapper">

                    <ul class="nav nav-pills nav-fill flex-column flex-md-row nav-tabs" id="tabs-icons-text" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link mb-sm-3 mb-md-0 active" id="tab1" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="ni ni-single-02"></i>
                                ข้อมูลสถานะ</a>
                        </li>
                        <li class="nav-item nextab">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab2" data-toggle="tab" href="#menu1" role="tab" aria-controls="menu1" aria-selected="false"><i class="ni ni-cart"></i>
                                กำหนดสิทธิ์</a>
                        </li>

                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div class="row">
                            <div class="col-12">

                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-bordered text-center" id="customer1" width="100%">
                                    <thead class="table-info">
                                        <th>ลำดับ</th>
                                        <th>รหัสพนักงาน</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>ตำแหน่ง</th>
                                        <th>สถานะ</th>
                                        <th>วิธีการ</th>
                                    </thead>
                                    <?php

                                    $sql_per = "SELECT  id,password,username,tb_employees.emp_id as emp_id,type_per ,tb_permissions.status as status ,tb_employees.emp_name as emp_name
                                    ,tb_employees.emp_surname as emp_surname
                                    FROM tb_permissions
                                    LEFT JOIN tb_employees ON  tb_employees.emp_id = tb_permissions.emp_id
                                    ORDER BY emp_id ASC";

                                    $result = mysqli_query($conn, $sql_per);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $i = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $emp_id = $row['emp_id'];
                                            $emp_name = $row['emp_name'];
                                            $emp_surname = $row['emp_surname'];
                                            $type_per = $row['type_per'];
                                            $password_per = $row['password'];
                                            if ($type_per == '1') {
                                                $cus_per = 'ผู้ดูแลระบบ';
                                            } else if ($type_per == '2') {
                                                $cus_per = 'ผู้ใช้ระบบ';
                                            }
                                           

                                            $status = $row['status'];
                                            if ($status == '1') {
                                                $image = 'fas fa-times';
                                                $color = "btn btn-danger btn-sm";
                                                $txt = "ยกเลิกข้อมูล";
                                                $a_heft = "delete";
                                                $cus_status = 'กำลังใช้งาน';
                                            } else if ($status == '0') {
                                                $image = 'fas fa-check';
                                                $color = "btn btn-success btn-sm";
                                                $txt = "ยกเลิกการระงับ";
                                                $a_heft = "unremove";
                                                $cus_status = 'ระงับการใช้งาน';
                                            }
                                            $i++;
                                            $sql_dis = "SELECT * FROM tb_permissions
                                            INNER JOIN tb_employees ON tb_employees.emp_id=tb_permissions.emp_id
                                            WHERE tb_employees.emp_id='$emp_id' AND tb_employees.status_emp='0'";
                                            $res = mysqli_query($conn, $sql_dis);
                                            if ($rows = $res->num_rows > 0) {
                                                $dis = "disabled";
                                            } else {
                                                $dis = "";
                                            }

                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?>
                                                <td>
                                                    <?php echo $emp_id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $emp_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $emp_surname; ?>
                                                </td>
                                                <td>
                                                    <?php echo $cus_per; ?>
                                                </td>
                                                <td>
                                                    <?php echo $cus_status; ?>
                                                </td>
                                                <td class="sta">
                                                    <a   href="#edit_permissinos<?= $emp_id ?>" data-toggle="modal">
                                                        <button <?php echo $dis ?>  type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                                    </a>
                                                    <button <?php echo $dis ?>  type='button' id="cancel_per" class='<?= $color ?>' data-toggle="tooltip" data="<?= $emp_id ?>"  emp_name="<?= $emp_name ?>" emp_surname="<?= $emp_surname ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button> 

                                                </td>
                                     
                                                <div id="edit_permissinos<?php echo $emp_id; ?>" class="modal fade edit_user" role="dialog">
                                                <form method="post" class="form-horizontal Update" role="form" data='<?=$emp_id?>'
                                                id="edit_user" enctype="multipart/form-data" autocomplete="off">
                                                <div class="modal-dialog modal-lg">
                                                <div class="modal-content" style="width: auto;">
                                                <div class="modal-header">
                                                <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                                                    แก้ไขข้อมูลสิทธิ์</h5>
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
                                                                <label>รหัสพนักงาน : </label>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                        id="edit_per<?=$emp_id?>"
                                                                        placeholder="รหัสสี" disabled
                                                                        value="<?php echo $emp_id ?>" name="userID">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        
                                                       
                                                        <div class="form-group row color">
                                        <div class="col-sm-4" align="right">
                                        <label>ระดับผู้ใช้งาน : </label>
                                        </div>
                                        <div class="col-md-5">
                                            <select name="select_type" class="form-control sel_type" id="per_type<?=$emp_id?>">
                                                <option value="0">----โปรดเลือก----</option>
                                                <option <?php if ($type_per == '1') {
                                                echo "selected";
                                            }
                                            ?> value="1">ผู้ดูแลระบบ</option>
                                                                                    <option <?php if ($type_per == '2') {
                                                echo "selected";
                                            }
                                            ?> value="2">ผู้ใช้ระบบ</option>
                                            </select>
                                            
                                        </div>
                                        <span style="color:red"> *</span>
                                    </div>

                                                        <div class="modal-footer">
                                                            <div class="form-group" align="right">
                                                                <button type="button" class="btn btn-outline-primary"
                                                                    data-id='<?=$emp_id?>' 
                                                                    id="btn_update_per">บันทึก</button>
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
                                            </tr>
                            </div>
                    <?php
                                        } // while loop
                                    } // end if

                                    // Add นิติบุคคล
                    ?>
                        </div>
                        </table>
                    </div>
                </div>
            </div>

            <!-- ปิด tab แรก -->
            <div class="tab-pane fade" id="menu1" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                <div class="row">
                    <div class="col-2" align="right">
                        <label>ชื่อ-นามสกุล : </label>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select class="form-control" id="pername">
                                <option value="0">กรุณาเลือกชื่อ</option>
                                <?php
                                $sql_edit_pro = "SELECT * FROM tb_employees WHERE status_emp ='1' and status_per ='0'";
                                $result2 = mysqli_query($conn, $sql_edit_pro);
                                while ($row2 = $result2->fetch_assoc()) {
                                    $emp_id = $row2['emp_id'];
                                    $emp_name = $row2['emp_name'];
                                    $emp_surname = $row2['emp_surname'];
                                ?>
                                    <option value="<?= $emp_id ?>"><?= $emp_name . "  " ?><?= $emp_surname ?></option>
                                <?php
                                }
                                ?>

                            </select>

                        </div>
                    </div>

                    <div class="col-2" align="right">
                        <label>สิทธิ์การใช้งาน : </label>
                    </div>
                    <div class="col-4">
                        <div class="form-group">
                            <select class="form-control" id="perstatus">
                                <option value="1">ผู้ดูแลระบบ</option>
                                <option value="2">ผู้ใช้ระบบ</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group" align="right">
                            <button type="button" class="btn btn-outline-primary" name="btn_add" id="addadmin">บันทึก</button>
                        </div>
                    </div>
                    <div class="col-6" align="left">
                        <div class="form-group">
                            <button type="button" data-dismiss="modal" class="btn btn-outline-danger" id ="cna-admin">ยกเลิก</button>
                        </div>
                    </div>
                </div>
                <!-- Add บุคคลทั่วไป -->


                </form>
                <div class="modal fade" id="signupModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-signup" role="document">
                        <div class="modal-content">
                            <div class="card card-signup card-plain">

                            </div>
                        </div>
                    </div>
                </div>
                <!--   Core JS Files   -->

                </body>
                <script src="dist/js/apps/permissinos.js"></script>  <!-- ต้องเปลี่ยนตาม ไฟล์JS ของหน้านั้นๆ -->

                </html>







