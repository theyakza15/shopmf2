<?php
@session_start();
require("sidebar.php");
$type_per = $_SESSION['type_per'];
$empid = $_SESSION['emp_id'];
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d")); //โค้ดเรียกวันที่ปัจจุบัน
$d = date('Y', $datenow) + 543;  //เรียกว่าวันที่เป็น พ.ศ. ดึงปีปัจจุบัน+ด้วย 543
$sqlm = "SELECT max(emp_id) as Maxid  FROM tb_employees"; //
$result = mysqli_query($conn, $sqlm);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
//M003
$tmp1 = "EMP"; //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($mem_old, 5, 6);
$Year = substr($mem_old, 3, 2);
$sub_date = substr($d, 2, 3);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //  $sub_date=$sub_date+1;
} else {
    $tmp2;
}
$t = $tmp2 + 1;

$a = sprintf("%03d", $t);

$emp_i = $tmp1 . $sub_date . $a;


?>
<!-- End Navbar -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">พนักงาน</h1>
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
                                ข้อมูลพนักงาน</a>
                        </li>
                        <?php    
                                        if ($type_per != 2){  
                                        ?>
                        <li class="nav-item nextab">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab2" data-toggle="tab" href="#menu1" role="tab" aria-controls="menu1" aria-selected="false"><i class="ni ni-cart"></i>
                                เพิ่มพนักงาน</a>
                        </li>
                        <?php
                                        
                                    }

                                
                                        ?> 
                    </ul>
                </div>
                <!--    </div>
        </div> -->
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
                                <table class="table table-striped table-bordered text-center" id="emptable" width="100%">
                                    <thead class="table-info">
                                        <th>ลำดับ</th>
                                        <th>รหัสพนักงาน</th>
                                        <th>ชื่อ</th>
                                        <th>นามสกุล</th>
                                        <th>เบอร์โทร</th>
                                        <th>สถานะ</th>
                                      
                                        <th>วิธีการ</th>
                                     
                                       
                                    </thead>
                                    <?php

                                    $sql_emp = "SELECT emp_id ,emp_name ,emp_surname,emp_number,emp_czid,emp_bd
                            ,emp_email,emp_sex,emp_numhome,emp_muu,emp_alley,emp_road,emp_county,emp_district
                            ,emp_province,emp_posnum,emp_pic,status
FROM tb_employees
/* LEFT JOIN tb_type ON tb_type.ty_name=tb_group.ty_id  */
ORDER BY emp_id ASC";

                                    $result = mysqli_query($conn, $sql_emp);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $i = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $emp_id = $row['emp_id'];
                                            $emp_name = $row['emp_name'];
                                            $emp_surname = $row['emp_surname'];
                                            $emp_number = $row['emp_number'];
                                            $emp_czid = $row['emp_czid'];
                                            $emp_bd = $row['emp_bd'];
                                            $emp_email = $row['emp_email'];
                                            $emp_sex = $row['emp_sex'];
                                            $emp_numhome = $row['emp_numhome'];
                                            $emp_muu = $row['emp_muu'];
                                            $emp_alley = $row['emp_alley'];
                                            $emp_road = $row['emp_road'];
                                            $emp_county = $row['emp_county'];
                                            $emp_district = $row['emp_district'];
                                            $emp_province = $row['emp_province'];
                                            $emp_posnum = $row['emp_posnum'];
                                            $emp_pic = $row['emp_pic'];

                                            $status = $row['status'];
                                            if ($status == '1') {
                                                $image = 'fas fa-times';
                                                $color = "btn btn-danger btn-sm";
                                                $txt = "ยกเลิกข้อมูล";
                                                $a_heft = "delete";
                                                $cus_status = 'ปกติ';
                                            } else if ($status == '0') {
                                                $image = 'fas fa-check';
                                                $color = "btn btn-success btn-sm";
                                                $txt = "ยกเลิกการระงับ";
                                                $a_heft = "unremove";
                                                $cus_status = 'ลาออก';
                                            }
                                            $i++;
                                            if($type_per == 1){
                                                $dis = " ";
                                            }else if ($emp_id != $empid){
                                                        $dis = "disabled";   
                                                     }else{
                                                        $dis = " ";
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
                                                    <?php echo $emp_number; ?>
                                                </td>
                                                <td>
                                                    <?php echo $cus_status; ?>
                                                </td>
                                            
                                                <td class="sta">
                                               
                                                      <a href="#edit_emp<?= $emp_id ?>" data-toggle="modal">
                                                        <button <?php echo $dis ?> type='button' class='btn btn-warning btn-sm' id="emp_edit" data="<?= $emp_id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                                    </a> 

                                                    <a href="#view_dialog<?= $emp_id ?>" data-toggle="modal">
                                                        <button <?php echo $dis ?> type='button' class='btn btn-info btn-sm'  id="btn_show" data="<?= $emp_id ?>"data-toggle="tooltip" title="แสดงข้อมูล">  <i class="fas fa-list-ol" style="color:black"></i></button>
                                                    </a>
                                        <?php    
                                        if ($type_per != 2){  
                                        ?>  
                                                    <button type='button' id="cancel_emp" class='<?= $color ?>' data-toggle="tooltip" data="<?= $emp_id ?>" emp_name="<?= $emp_name ?>" emp_surname="<?= $emp_surname ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>
                                                    <?php
                                        
                                    }

                                
                                        ?> 
                                          

                                                </td>
                                          
<!-- editemp -->
 <!-- รายละเอียดพนักงาน -->
 <?php
 require("./modal/employees/viwe_emp_modal.php");
 require("./modal/employees/edit_emp_modal.php");
?>
 
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

            <!-- ข้อมูลพนักงาน -->

            <div class="tab-pane fade" id="menu1" role="tabpanel" aria-labelledby="profile-tab">
                <br>
                <form role="form" method="POST" action="" enctype="multipart/form-data" class="insert" id="myForm">


                    <div class="col-4" align="center">
                        <div class="fileinput fileinput-new text-center a" data-provides="fileinput" align="center">
                            <img src="images/upload-1.png" alt="..." align="center" width="150px" id="img_fileupload"><br><br>
                            <input type="file" name="upload_emp" id="upload_emp" />
                        </div>

                    </div>

                    <br>
                    <div class="row">
                        <div class="col-2" align="right">
                            <label>รหัสพนักงาน : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input value="<?= $emp_i ?>" readonly type="text" class="form-control " id="id_emp" placeholder="กรุณากรอกข้อมูล" name="id_emp" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2" align="right">
                            <label>ชื่อ : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control " id="name_emp" placeholder="กรุณากรอกชื่อ" name="name_emp">
                            </div>
                        </div>
                        <span style="color:red"> *</span>



                        <div class="col-2" align="right">
                            <label>นามสกุล : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control " id="surname_emp" placeholder="กรุณากรอกนามสกุล" name="surname_emp">
                            </div>
                        </div>
                        <span style="color:red"> *</span>



                    </div>


                    <div class="row">
                        <div class="col-2" align="right">
                            <label>รหัสบัตรประชาชน : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control " id="cz_id" placeholder="กรอกเลขบัตรประชาชน" name="cz_id">
                            </div>
                        </div>
                        <span style="color:red"> *</span>

                        <div class="col-2" align="right">
                            <label>วันที่เข้าทำงาน : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="date" class="form-control " id="hbd_emp" placeholder="กรุณากรอกข้อมูล" name="hbd_emp">
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>

                    <div class="row">
                        <div class="col-2" align="right">
                            <label>เบอร์โทรศัทพ์ : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control " id="number_emp" placeholder="กรุณากรอกเบอร์โทรศัพท์" name="number_emp">

                            </div>
                        </div>
                        <span style="color:red"> *</span>
                        <div class="col-2" align="right">
                            <label>Email : </label>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control " id="email_emp" placeholder="test@hotmail.com" name="email_emp">

                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>



                    <div class="row">
                        <div class="col-2" align="right">
                            <label>เพศ : </label>
                        </div>
                        <div>
                            <label class="radio-inline"><input value="1" type="radio" name="optradio" checked> ชาย </label>
                            <label class="radio-inline"><input value="2" type="radio" name="optradio"> หญิง </label>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-2" align="right">
                            <label> บ้านเลขที่ : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control " id="num_home" placeholder="กรุณากรอกบ้านเลขที่" name="num_home">

                            </div>
                        </div>
                        <span style="color:red"> *</span>
                        <div class="col-2" align="right">
                            <label>หมู่ : </label>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control " id="muu" placeholder="กรุณากรอกข้อมูล" name="muu">

                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-2" align="right">
                            <label>ซอย : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control " id="alley" placeholder="กรุณากรอกข้อมูล" name="alley">
                            </div>
                        </div>
                        <div class="col-2" align="right">
                            <label>ถนน : </label>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control " id="road" placeholder="กรุณากรอกข้อมูล" name="road">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-2" align="right">
                            <label>ตำบล : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control " id="county" placeholder="กรุณากรอกตำบล" name="county">

                            </div>
                        </div>
                        <span style="color:red"> *</span>
                        <div class="col-2" align="right">
                            <label>อำเภอ : </label>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control " id="district" placeholder="กรุณากรอกอำเภอ" name="district">

                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>
                    <div class="row">
                        <div class="col-2" align="right">
                            <label>จังหวัด : </label>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input type="text" class="form-control " id="province" placeholder="กรุณากรอกจังหวัด" name="province">
                            </div>
                        </div>
                        <span style="color:red"> *</span>
                        <div class="col-2" align="right">
                            <label>รหัสไปรษณีย์ : </label>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input type="text" class="form-control " id="postal_number" placeholder="กรุณากรอกรหัสไปรษณีย์" name="postal_number">

                            </div>
                        </div>
                        <span style="color:red"> *</span>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="form-group" align="right">
                                <button type="submit" class="btn btn-outline-primary" name="btn_add" id="addemp">บันทึก</button>
                            </div>
                        </div>
                        <div class="col-6" align="left">
                            <div class="form-group">
                                <button type="button" data-dismiss="modal" class="btn btn-outline-danger" id ="can-emp">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <!-- Add บุคคลทั่วไป -->



        <!--   Core JS Files   -->

        </body>
        <script src="dist/js/apps/employees.js"></script>



        </html>