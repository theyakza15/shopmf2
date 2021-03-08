<?php
require("sidebar.php");
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;

$sql_type = "SELECT max(ty_id) as Maxid  FROM tb_type";
$result = mysqli_query($conn, $sql_type);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
//M003
$tmp1 = "TY"; //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($mem_old, 4, 2);
$Year = substr($mem_old, 2, 2);
$sub_date = substr($d, 2, 3);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //  $sub_date=$sub_date+1;
} else {
    $tmp2;
}
$t = $tmp2 + 1;

$a = sprintf("%02d", $t);

$id_type_product = $tmp1 . $sub_date . $a;

///---------------------

$sql_color = "SELECT max(co_id) as Maxid  FROM tb_color";
$result = mysqli_query($conn, $sql_color);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
//M003
$tmp1 = "CO"; //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($mem_old, 4, 2);
$Year = substr($mem_old, 2, 2);
$sub_date = substr($d, 2, 3);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //  $sub_date=$sub_date+1;
} else {
    $tmp2;
}
$t = $tmp2 + 1;

$a = sprintf("%02d", $t);

$color_id = $tmp1 . $sub_date . $a;
///---------------------
$sql_size = "SELECT max(si_id) as Maxid  FROM tb_size";
$result = mysqli_query($conn, $sql_size);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
//M003
$tmp1 = "SI"; //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($mem_old, 4, 2);
$Year = substr($mem_old, 2, 2);
$sub_date = substr($d, 2, 3);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //  $sub_date=$sub_date+1;
} else {
    $tmp2;
}
$t = $tmp2 + 1;

$a = sprintf("%02d", $t);

$size_id = $tmp1 . $sub_date . $a;


///---------------------
$sql_group = "SELECT max(gr_id) as Maxid  FROM tb_group";
$result = mysqli_query($conn, $sql_group);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
//M003
$tmp1 = "GR"; //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2 = substr($mem_old, 4, 2);
$Year = substr($mem_old, 2, 2);
$sub_date = substr($d, 2, 3);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //  $sub_date=$sub_date+1;
} else {
    $tmp2;
}
$t = $tmp2 + 1;
$a = sprintf("%02d", $t);
$group_id = $tmp1 . $sub_date . $a;

?>
<!-- End Navbar -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">ตั้งค่า</h1>
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
                                ประเภทสินค้า</a>
                        </li>
                        <li class="nav-item nextab">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab2" data-toggle="tab" href="#menu1" role="tab" aria-controls="menu1" aria-selected="false"><i class="ni ni-cart"></i>
                                กลุ่มสินค้า</a>
                        </li>

                        <li class="nav-item nextab">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab3" data-toggle="tab" href="#m2" role="tab" aria-controls="m2" aria-selected="false"><i class="ni ni-cart"></i>
                                เพิ่มขนาด Size</a>
                        </li>


                        <li class="nav-item nextab">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab3" data-toggle="tab" href="#m3" role="tab" aria-controls="m3" aria-selected="false"><i class="ni ni-cart"></i>
                                เพิ่มข้อมูลสี</a>
                        </li>
                    </ul>
                </div>


                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <button type="button" class="btn btn-warning " data-toggle="modal" onclick="myFunction()" id='in_user' data-target="#test"><i class="ni ni-fat-add"></i>
                                    เพิ่มข้อมูลประเภทสินค้า</button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-bordered text-center" id="customer" width="100%">
                                    <thead class="table-info">
                                        <th>ลำดับ</th>
                                        <th>รหัสประเภทสินค้า</th>
                                        <th>ชื่อ</th>
                                        <th>สถานะ</th>
                                        <th>#</th>
                                    </thead>

                                    <?php

                                    $sql_type = "SELECT ty_id,ty_name,status 
                    FROM tb_type
                    /* LEFT JOIN tbl_type_product ON tbl_type_product.type_pro_id=tbl_group_product.type_pro_id  */
                    ORDER BY ty_id ASC";

                                    $result = mysqli_query($conn, $sql_type);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $i = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $ty_id = $row['ty_id'];
                                            $ty_name = $row['ty_name'];
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


                                    ?>
                                            <tr>
                                                <td><?php echo $i; ?>
                                                <td>
                                                    <?php echo $ty_id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ty_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $cus_status; ?>
                                                </td>
                                                <td class="sta">
                                                      <a href="#edit_promotion<?= $co_id ?>" data-toggle="modal">
                                                        <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                                    </a> 
                                                    <!--  <button type='button' id="cancel_all" class='<?= $color ?>' data-toggle="tooltip" data="<?= $co_id ?>" <?= $diss ?> co_name="<?= $co_name ?>" title="<?= $txt ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>
 -->
                                                </td>
                                            </tr>
                                    <?php
                                        } // while loop
                                    } // end if

                                    
                                    ?>




                            </div>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="test">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="width: auto;">
                            <div class="modal-header">
                                <h5 class="modal-title card-title"><i class="ni ni-single-02"></i> ข้อมูลประเภทสินค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                    <h3>&times;</h3>
                                </button>
                            </div>
                            <!-- ออกแบบตรงนี้ -->

                            <div class="modal-body">
                                <form role="form" method="POST" action="" enctype="multipart/form-data" class="insert" id="myForm">
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label>รหัสประเภทสินค้า : </label>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="type_id" readonly placeholder="รหัสประเภทสินค้า" value="<?php echo $id_type_product; ?>" name="type_id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label>ชื่อประเภทสินค้า : </label>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="type_name" placeholder="กรุณากรอกข้อมูล" name="type_name" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group" align="right">
                                        <button type="button" class="btn btn-outline-success" name="btn_add" id="btn_add">บันทึก</button>
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
                <!-- ปิด tab แรก -->

                <!-- หน้าเพิ่มสี -->
                <div class="tab-pane fade" id="m3" role="tabpanel" aria-labelledby="color-tab">
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-warning " data-toggle="modal" id='in_user' data-target="#add_color"><i class="ni ni-fat-add"></i>
                                เพิ่มข้อมูลสี</button>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-bordered text-center" id="promotion" width="99%">
                                <thead class="table-info">
                                    <th>ลำดับ</th>
                                    <th>รหัส</th>
                                    <th>ประเภทสินค้า</th>
                                    <th>สถานะ</th>
                                    <th class="sta">#</th>
                                </thead>
                                <?php

                     $sql_color = "SELECT co_id,co_name,status 
                    FROM tb_color
                    /* LEFT JOIN tbl_type_product ON tbl_type_product.type_pro_id=tbl_group_product.type_pro_id  */
                    ORDER BY co_id ASC";

                                $result = mysqli_query($conn, $sql_color);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $i = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $co_id = $row['co_id'];
                                        $co_name = $row['co_name'];
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


                                ?>
                                        <tr>
                                            <td><?php echo $i; ?>
                                            <td>
                                                <?php echo $co_id; ?>
                                            </td>
                                            <td>
                                                <?php echo $co_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $cus_status; ?>
                                            </td>
                                            <td class="sta">
                                                  <a href="#edit_promotion<?= $co_id ?>" data-toggle="modal">
                                                    <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                                </a> 
                                                <!--  <button type='button' id="cancel_all" class='<?= $color ?>' data-toggle="tooltip" data="<?= $co_id ?>" <?= $diss ?> co_name="<?= $co_name ?>" title="<?= $txt ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>
 -->
                                            </td>
                                        </tr>
                                <?php
                                    } // while loop
                                } // end if

                                // Add นิติบุคคล
                                ?>
                            </table>
                        </div>

                        <!-- modal เพิ่มสี -->
                        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add_color">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content" style="width: auto;">
                                    <div class="modal-header">
                                        <h5 class="modal-title card-title"><i class="ni ni-single-02"></i> ข้อมูลสี</h5>
                                        <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                            <h3>&times;</h3>
                                        </button>
                                    </div>
                                    <!-- ออกแบบตรงนี้ -->

                                    <div class="modal-body">
                                        <form role="form" method="POST" action="" enctype="multipart/form-data" class="insert" id="myForm">
                                            <div class="row">
                                                <div class="col-4" align="right">
                                                    <label>รหัส Size สินค้า : </label>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="co_id" readonly placeholder="รหัสสี" value="<?php echo $color_id; ?>" name="co_id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4" align="right">
                                                    <label>ชื่อสี : </label>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control " id="co_name" placeholder="กรุณากรอกข้อมูล" name="co_name" required>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-5">
                                            <div class="form-group" align="right">
                                                <button type="button" class="btn btn-outline-success" name="btn_add" id="btn_add">บันทึก</button>
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
                    </div>
                </div>



                <!-- หน้าSize -->
                <div class="tab-pane fade" id="m2" role="tabpanel" aria-labelledby="size-tab">
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-warning " data-toggle="modal" id='in_user' data-target="#add_size"><i class="ni ni-fat-add"></i>
                                เพิ่มข้อมูล Size</button>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-bordered text-center" id="promotion" width="99%">
                                <thead class="table-info">
                                    <th>ลำดับ</th>
                                    <th>รหัส</th>
                                    <th>Size</th>
                                    <th>สถานะ</th>
                                    <th class="sta">#</th>
                                </thead>
                                <?php
                                $sql_size = "SELECT si_id,si_name,status 
                    FROM tb_size
                    /* LEFT JOIN tbl_type_product ON tbl_type_product.type_pro_id=tbl_group_product.type_pro_id  */
                    ORDER BY si_id ASC";

                                $result = mysqli_query($conn, $sql_size);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $i = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $si_id = $row['si_id'];
                                        $si_name = $row['si_name'];
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


                                ?>
                                        <tr>
                                            <td><?php echo $i; ?>
                                            <td>
                                                <?php echo $si_id; ?>
                                            </td>
                                            <td>
                                                <?php echo $si_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $cus_status; ?>
                                            </td>
                                            <td class="sta">
                                                   <a href="#edit_promotion<?= $co_id ?>" data-toggle="modal">
                                                    <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                                </a> 
                                                <!--  <button type='button' id="cancel_all" class='<?= $color ?>' data-toggle="tooltip" data="<?= $co_id ?>" <?= $diss ?> co_name="<?= $co_name ?>" title="<?= $txt ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>
 -->
                                            </td>
                                        </tr>
                                <?php
                                    } // while loop
                                } // end if

                                // Add นิติบุคคล
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add_size">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="width: auto;">
                            <div class="modal-header">
                                <h5 class="modal-title card-title"><i class="ni ni-single-02"></i> ข้อมูล size สินค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                    <h3>&times;</h3>
                                </button>
                            </div>
                            <!-- ออกแบบตรงนี้ -->

                            <div class="modal-body">
                                <form role="form" method="POST" action="" enctype="multipart/form-data" class="insert" id="myForm">
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label>รหัส Size สินค้า : </label>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="si_id" readonly placeholder="รหัสSizeสินค้า" value="<?php echo $size_id; ?>" name="si_id">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4" align="right">
                                            <label>Size สินค้า : </label>
                                        </div>
                                        <div class="col-5">
                                            <div class="form-group">
                                                <input type="text" class="form-control " id="si_name" placeholder="กรุณากรอกข้อมูล" name="si_name" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group" align="right">
                                        <button type="button" class="btn btn-outline-success" name="btn_add" id="btn_add">บันทึก</button>
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



                <!-- หน้าเพิ่มกลุ่มสินค้า -->
                <div class="tab-pane fade" id="menu1" role="tabpanel" aria-labelledby="group-tab">
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <button type="button" class="btn btn-warning " data-toggle="modal" id='in_user' data-target="#add_gr"><i class="ni ni-fat-add"></i>
                                เพิ่มข้อมูลกลุ่มสินค้า</button>

                        </div>


                    </div>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped table-bordered text-center" id="promotion" width="99%">
                                <thead class="table-info">
                                    <th>ลำดับ</th>
                                    <th>รหัส</th>
                                    <th>ประเภทสินค้า</th>
                                    <th>ชนิดสินค้า</th>
                                    <th>สถานะ</th>
                                    <th class="sta">#</th>
                                </thead>
                        </div>
                        <?php
                        $sql_group = "SELECT gr_id ,gr_name , tb_group.status as status ,tb_type.ty_name as ty_name 
                        FROM tb_group
                        LEFT JOIN tb_type ON tb_type.ty_name=tb_group.ty_id 
                        ORDER BY gr_id ASC";

                        $result = mysqli_query($conn, $sql_group);
                        if ($result->num_rows > 0) {
                            // output data of each row
                            $i = 0;
                            while ($row = $result->fetch_assoc()) {
                                $gr_id = $row['gr_id'];
                                $gr_name = $row['gr_name'];
                                $status = $row['status'];
                                $type_name = $row['ty_name'];

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


                        ?>
                                <tr>
                                    <td><?php echo $i; ?>
                                    <td>
                                        <?php echo $gr_id; ?>
                                    </td>
                                    <td>
                                        <?php echo $ty_name; ?>
                                    </td>
                                    <td>
                                        <?php echo $gr_name; ?>
                                    </td>

                                    <td>
                                        <?php echo $cus_status; ?>
                                    </td>
                                    <td class="sta">
                                        <a href="#edit_promotion<?= $pm_id ?>" data-toggle="modal">
                                            <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                        </a> 
                                        <!-- <button type='button' id="cancel_all" class='<?= $color ?>' data-toggle="tooltip" data="<?= $pm_id ?>" <?= $diss ?> pm_name="<?= $pm_name ?>" title="<?= $txt ?>" status="<?= $pm_status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>  -->

                                    </td>
                                </tr>
                                <!-- Modal Editนิติ-->

                                <!-- modal view ข้อมูลลูกค้านิติบุคคล-->


                    </div>
            <?php
                            } // while loop
                        } // end if

                        
            ?>

            </table>
                </div>
                <!-- model add group -->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="add_gr">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="width: auto;">
                            <div class="modal-header">
                                <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                                    ข้อมูลชนิดสินค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                    <h3>&times;</h3>
                                </button>
                                </button>
                            </div>

                            <div class="modal-body">
                                <form role="form" method="POST" action="" enctype="multipart/form-data" class="insert" id="myForm">
                                    <div class="row">
                                        <div class="col-sm-11">
                                            <div class="row">
                                                <div class="col-4" align="right">
                                                    <label>รหัสชนิดสินค้า : </label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="gr_id" readonly placeholder="รหัสกลุ่มชนิดสินค้า" value="<?php echo $group_id; ?>" name="gr_id">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-4" align="right">
                                                    <label>ประเภทสินค้า : </label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="form-group">
                                                        <select class="form-control form-control-lg" id="sel_type">
                                                            <option value="0">กรุณาเลือกประเภทสินค้า</option>
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
                                                    </div>
                                                </div>
                                                <span style="color:red"> *</span>
                                            </div>
                                            <div class="row">
                                                <div class="col-4" align="right">
                                                    <label>กลุ่มสินค้า : </label>
                                                </div>
                                                <div class="col-7">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control " id="gr_name" placeholder="กรุณากรอกชื่อ" name="in_name" required>
                                                    </div>
                                                </div>
                                                <span style="color:red"> *</span>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <br>
                            <div class="modal-footer">

                                <div class="form-group" align="right">
                                    <button type="button" class="btn btn-outline-primary" name="btn_add" id="btn_con">บันทึก</button>
                                </div>

                                <div class="form-group">
                                    <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add บุคคลทั่วไป -->

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
                <script src="dist/js/apps/setting.js"></script>

                </html>