<?php
require("sidebar.php");
date_default_timezone_set("Asia/Bangkok");
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$m = date('m', $datenow);

$sql_type = "SELECT max(ty_id) as Maxid  FROM tb_type";
$result = mysqli_query($conn, $sql_type);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
//M003
$tmp1 = "TP"; //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
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
$sql_rundis = "SELECT max(dis_id) as Maxid  FROM discount";
$result = mysqli_query($conn, $sql_rundis);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
$tmp1 = "DI";
$tmp2 = substr($mem_old, 6, 3);
$Year = substr($mem_old, 2, 2);
$month = substr($mem_old, 4, 2);
$sub_date = substr($d, 2, 2);
if ($Year != $sub_date) {
    $tmp2 = 0;
    //$sub_date = $sub_date + 1;
} else {
    $tmp2;
}
if ($month != $m) {
    $tmp2 = 0;
} else {
    $tmp2;
}
$t = $tmp2 + 1;
$a = sprintf("%03d", $t);
$dis_runid = $tmp1 . $sub_date . $m . $a;
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
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab2" data-toggle="tab" href="#m1" role="tab" aria-controls="menu1" aria-selected="false"><i class="ni ni-cart"></i>
                                กลุ่มสินค้า</a>
                        </li>

                        <li class="nav-item nextab">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab3" data-toggle="tab" href="#m2" role="tab" aria-controls="m2" aria-selected="false"><i class="ni ni-cart"></i>
                                ขนาดสินค้า</a>
                        </li>


                        <li class="nav-item nextab">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab3" data-toggle="tab" href="#m3" role="tab" aria-controls="m3" aria-selected="false"><i class="ni ni-cart"></i>
                                สีสินค้า</a>
                        </li>

                        <li class="nav-item nextab">
                            <a class="nav-link mb-sm-3 mb-md-0" id="tab3" data-toggle="tab" href="#m4" role="tab" aria-controls="m4" aria-selected="false"><i class="ni ni-cart"></i>
                                ส่วนลด</a>
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
                                        <th>วิธีการ</th>
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
                                            //ปุ่มยกเลิก
                                            $sql_dis = "SELECT * FROM tb_type
                                            INNER JOIN tb_group ON tb_group.ty_id=tb_type.ty_id
                                            WHERE tb_group.ty_id='$ty_id' AND tb_group.status='1'";
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
                                                    <?php echo $ty_id; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ty_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $cus_status; ?>
                                                </td>
                                                <td class="sta">
                                                    <a href="#edit_type<?= $ty_id ?>" data-toggle="modal">
                                                        <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $ty_id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                                    </a>
                                                    <button <?php echo $dis ?> type='button' id="cancel_type" class='<?= $color ?>' data-toggle="tooltip" data="<?= $ty_id ?>" ty_name="<?= $ty_name ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>

                                                </td>
                                                <!-- edit type modal -->

                                                <div id="edit_type<?php echo $ty_id; ?>" class="modal fade edit_user" role="dialog">
                                                    <form method="post" class="form-horizontal Update" role="form" data='<?= $ty_id ?>' id="edit_user" enctype="multipart/form-data" autocomplete="off">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content" style="width: auto;">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                                                                        แก้ไขข้อมูลประเภท</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                                                        <h3>&times;</h3>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                    <div class="row">
                                                                        <div class="col-sm-8">
                                                                            <div class="row">
                                                                                <div class="col-4" align="right">
                                                                                    <label>รหัสประเภท : </label>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control" id="edit_type<?= $ty_id ?>" placeholder="รหัสสี" disabled value="<?php echo $ty_id ?>" name="userID">
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row">
                                                                                <div class="col-4" align="right">
                                                                                    <label>ชื่อประเภท : </label>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <div class="form-group">
                                                                                        <input type="text" class="form-control check-type-name" id="ty_name<?= $ty_id ?>" placeholder="กรุณากรอกข้อมูล" name="fname" required value="<?php echo $ty_name; ?>">

                                                                                    </div>
                                                                                </div>
                                                                                <span style="color:red"> *</span>
                                                                            </div>




                                                                            <div class="modal-footer">
                                                                                <div class="form-group" align="right">
                                                                                    <button type="button" class="btn btn-outline-primary" data-id='<?= $ty_id ?>' id="btn_update_type">บันทึก</button>
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
                                                </div>

                                            </tr>
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
                                                <input type="text" class="form-control " id="type_name" placeholder="กรุณากรอกประเภทสินค้า" name="type_name" required>
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group" align="right">
                                        <button type="button" class="btn btn-outline-success" name="btn_add" id="add_type">บันทึก</button>
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
                <!-- หน้ากลุ่มสินค้า -->
                <div class="tab-pane fade" id="m1" role="tabpanel" aria-labelledby="group-tab">
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
                                    <th>กลุ่มสินค้า</th>
                                    <th>สถานะ</th>
                                    <th class="sta">วิธีการ</th>
                                </thead>


                                <?php
                                $sql_group = "SELECT gr_id ,gr_name , tb_group.status as status ,tb_type.ty_name as ty_name 
                        ,tb_type.ty_id as ty_id
                        FROM tb_group
                        INNER JOIN tb_type ON tb_type.ty_id=tb_group.ty_id 
                        ORDER BY gr_id ASC";

                                $result = mysqli_query($conn, $sql_group);
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    $i = 0;
                                    while ($row = $result->fetch_assoc()) {
                                        $gr_id = $row['gr_id'];
                                        $gr_name = $row['gr_name'];
                                        $status = $row['status'];
                                        $t_name = $row['ty_name'];
                                        $type_id = $row['ty_id'];

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
                                        //ปุ่มยกเลิก
                                        $sql_dis2 = "SELECT * FROM tb_product
                                        INNER JOIN tb_group ON tb_group.gr_id=tb_product.pd_group
                                         WHERE tb_product.pd_group='$gr_id' AND tb_product.status='1'";
                                        $ress = mysqli_query($conn, $sql_dis2);
                                        if ($rowss = $ress->num_rows > 0) {
                                            $diss = "disabled";
                                        } else {
                                            $diss = "";
                                        }


                                ?>
                                        <tr>
                                            <td><?php echo $i; ?>
                                            <td>
                                                <?php echo $gr_id; ?>
                                            </td>
                                            <td>
                                                <?php echo $t_name; ?>
                                            </td>
                                            <td>
                                                <?php echo $gr_name; ?>
                                            </td>

                                            <td>
                                                <?php echo $cus_status; ?>
                                            </td>
                                            <td class="sta">
                                                <a href="#edit_group<?= $gr_id ?>" data-toggle="modal">
                                                    <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                                </a>
                                                <button <?php echo $diss ?> type='button' id="cancel_gr" class='<?= $color ?>' data-toggle="tooltip" data="<?= $gr_id ?>" gr_name="<?= $gr_name ?>" t_name="<?= $t_name ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>

                                            </td>
                                            <!-- Modal Edit -->
                                            <div id="edit_group<?php echo $gr_id; ?>" class="modal fade edit_user" role="dialog">
                                                <form method="post" class="form-horizontal Update" role="form" data='<?= $si_id ?>' id="edit_user" enctype="multipart/form-data" autocomplete="off">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content" style="width: auto;">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                                                                    แก้ไขข้อมูลกลุ่มสินค้า</h5>
                                                                <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                                                    <h3>&times;</h3>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">

                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <div class="row">
                                                                            <div class="col-4" align="right">
                                                                                <label>รหัสชนิดสินค้า : </label>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control" id="edit_group<?= $gr_id ?>" placeholder="รหัสสี" disabled value="<?php echo $gr_id ?>" name="userID">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group row color">
                                                                            <div class="col-sm-4" align="right">
                                                                                <label> ประเภทสินค้า : </label>
                                                                            </div>
                                                                            <div class="col-md-5">
                                                                                <select name="select_type" class="form-control edit_sel_type" id="gr_type<?= $gr_id ?>">
                                                                                    <option value="0">----โปรดเลือก----</option>
                                                                                    <?php
                                                                                    $sql2 = "SELECT * FROM tb_type WHERE status ='1'";
                                                                                    $result2 = mysqli_query($conn, $sql2);
                                                                                    while ($row2 = $result2->fetch_assoc()) {
                                                                                        $edit_type_id = $row2['ty_id'];
                                                                                        $edit_type_name = $row2['ty_name'];
                                                                                    ?>
                                                                                        <option value="<?= $edit_type_id ?>" <?php if ($edit_type_id == $type_id) {
                                                                                                                                    echo "selected";
                                                                                                                                } ?>> <?= $edit_type_name ?></option>
                                                                                    <?php
                                                                                    }
                                                                                    ?>
                                                                                </select>

                                                                            </div>
                                                                            <span style="color:red"> *</span>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-4" align="right">
                                                                                <label>ชื่อกลุ่มสินค้า : </label>
                                                                            </div>
                                                                            <div class="col-7">
                                                                                <div class="form-group">
                                                                                    <input type="text" class="form-control check-gr-name " data-id='<?= $gr_id ?>' id="gr_name<?= $gr_id ?>" placeholder="กรุณากรอกข้อมูล" name="fname" required value="<?php echo $gr_name; ?>">

                                                                                </div>
                                                                            </div>
                                                                            <span style="color:red"> *</span>
                                                                        </div>


                                                                        <div class="modal-footer">
                                                                            <div class="form-group" align="right">
                                                                                <button type="button" class="btn btn-outline-primary" data-id='<?= $gr_id ?>' id="btn_update_gr">บันทึก</button>
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
                                            </div>

                                        </tr>

                        </div>
                <?php
                                    } // while loop
                                } // end if
                ?>
                </table>
                    </div>
                </div>
            </div>
            <!-- modeladdgroup -->
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
                                <button type="button" class="btn btn-outline-primary" name="btn_add" id="add_group">บันทึก</button>
                            </div>

                            <div class="form-group">
                                <button type="button" data-dismiss="modal" class="btn btn-outline-danger">ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- addSize -->
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
                        <table class="table table-striped table-bordered text-center" id="promotion1" width="99%">
                            <thead class="table-info">
                                <th>ลำดับ</th>
                                <th>รหัส</th>
                                <th>Size</th>
                                <th>สถานะ</th>
                                <th class="sta">วิธีการ</th>
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
                                            <a href="#edit_size<?= $si_id ?>" data-toggle="modal">
                                                <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                            </a>
                                            <button type='button' id="cancel_si" class='<?= $color ?>' data-toggle="tooltip" data="<?= $si_id ?>" si_name="<?= $si_name ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>
                                        </td>

                                        <!-- edit modal  size -->

                                        <div id="edit_size<?php echo $si_id; ?>" class="modal fade edit_user" role="dialog">
                                            <form method="post" class="form-horizontal Update" role="form" data='<?= $si_id ?>' id="edit_user" enctype="multipart/form-data" autocomplete="off">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content" style="width: auto;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                                                                แก้ไขข้อมูล Size</h5>
                                                            <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                                                <h3>&times;</h3>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="row">
                                                                        <div class="col-4" align="right">
                                                                            <label>รหัสSize : </label>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="edit_size<?= $si_id ?>" placeholder="รหัสสี" disabled value="<?php echo $si_id ?>" name="userID">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-4" align="right">
                                                                            <label>ชื่อ Size: </label>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control check-size-name" id="si_name<?= $si_id ?>" placeholder="กรุณากรอกข้อมูล" name="fname" required value="<?php echo $si_name; ?>">

                                                                            </div>
                                                                        </div>
                                                                        <span style="color:red"> *</span>
                                                                    </div>




                                                                    <div class="modal-footer">
                                                                        <div class="form-group" align="right">
                                                                            <button type="button" class="btn btn-outline-primary" data-id='<?= $si_id ?>' id="btn_update_size">บันทึก</button>
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
                                        </div>





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

            <!-- modeladdsize -->
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
                                            <input type="text" class="form-control " id="si_name" placeholder="กรุณากรอก Size" name="si_name" required>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <div class="form-group" align="right">
                                    <button type="button" class="btn btn-outline-success" name="btn_add" id="addsize">บันทึก</button>
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

            <!-- addcolor -->

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
                        <table class="table table-striped table-bordered text-center" id="promotion2" width="99%">
                            <thead class="table-info">
                                <th>ลำดับ</th>
                                <th>รหัสสี</th>
                                <th>ชื่อสี</th>
                                <th>สถานะ</th>
                                <th class="sta">วิธีการ</th>
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
                                            <a href="#edit_color<?= $co_id ?>" data-toggle="modal">
                                                <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                            </a>
                                            <button type='button' id="cancel_color" class='<?= $color ?>' data-toggle="tooltip" data="<?= $co_id ?>" co_name="<?= $co_name ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>

                                        </td>

                                        <!-- edit color -->

                                        <div id="edit_color<?php echo $co_id; ?>" class="modal fade edit_user" role="dialog">
                                            <form method="post" class="form-horizontal Update" role="form" data='<?= $co_id ?>' id="edit_user" enctype="multipart/form-data" autocomplete="off">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content" style="width: auto;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                                                                แก้ไขข้อมูลสี</h5>
                                                            <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                                                <h3>&times;</h3>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-sm-8">
                                                                    <div class="row">
                                                                        <div class="col-4" align="right">
                                                                            <label>รหัสสี : </label>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control" id="edit_color<?= $co_id ?>" placeholder="รหัสสี" disabled value="<?php echo $co_id ?>" name="userID">
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-4" align="right">
                                                                            <label>ชื่อสี : </label>
                                                                        </div>
                                                                        <div class="col-7">
                                                                            <div class="form-group">
                                                                                <input type="text" class="form-control check-color-name" id="co_name<?= $co_id ?>" placeholder="กรุณากรอกข้อมูล" name="fname" required value="<?php echo $co_name; ?>">

                                                                            </div>
                                                                        </div>
                                                                        <span style="color:red"> *</span>
                                                                    </div>




                                                                    <div class="modal-footer">
                                                                        <div class="form-group" align="right">
                                                                            <button type="button" class="btn btn-outline-primary" data-id='<?= $co_id ?>' id="btn_update_color">บันทึก</button>
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
                                        </div>



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

            <!-- modeladdcolor -->
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
                                        <label>รหัสสี : </label>
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
                                            <input type="text" class="form-control " id="co_name" placeholder="กรุณากรอกข้อมูลสี" name="co_name" required>
                                        </div>
                                    </div>
                                </div>
                        </div>

                        <div class="row">
                            <div class="col-5">
                                <div class="form-group" align="right">
                                    <button type="button" class="btn btn-outline-success" name="btn_add" id="addcolor">บันทึก</button>
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


            <!-- หน้าส่วนลด -->


            <div class="tab-pane fade" id="m4" role="tabpanel" aria-labelledby="color-tab">
                <br>
                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-warning " data-toggle="modal" id='in_user' data-target="#add_dis"><i class="ni ni-fat-add"></i>
                            เพิ่มส่วนลด</button>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center" id="dis23" width="99%">
                            <thead class="table-info">
                                <th>ลำดับ</th>
                                <th>รหัสส่วนลด</th>
                                <th>ชื่อสินค้า</th>
                                <th>ส่วนลด(บาทต่อตัว)</th>
                                <th>จำนวนขั้นต่ำ</th>
                                <th>วิธีการ</th>
                            </thead>
                            <?php

                            $sql_dis = "SELECT dis_id,discount,amount_pro,tb_product.pd_id AS pd_id,status_dis 
,tb_product.pd_name AS pd_name
FROM discount
LEFT JOIN tb_product ON tb_product.pd_id = discount.pd_id
ORDER BY dis_id ASC";

                            $result = mysqli_query($conn, $sql_dis);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                $i = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $dis_id = $row['dis_id'];
                                    $dis_name = $row['discount'];
                                    $am_dis = $row['amount_pro'];
                                    $pd = $row['pd_name'];
                                    $pddis_id = $row['pd_id'];
                                    $status = $row['status_dis'];
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
                                            <?php echo $dis_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $pd; ?>
                                        </td>
                                        <td>
                                            <?php echo $dis_name; ?>
                                        </td>
                                        <td>
                                            <?php echo $am_dis; ?>
                                        </td>

                                        <td class="sta">
                                            <a href="#edit_dis<?= $dis_id ?>" data-toggle="modal">
                                                <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                            </a>
                                            <button type='button' id="cancel_dis" class='<?= $color ?>' data-toggle="tooltip" data="<?= $dis_id ?>" dis_name="<?= $dis_name ?>" status="<?= $status ?>"><i class="<?= $image ?>" style="color:white"></i></span></button>

                                        </td>

                                        <div id="edit_dis<?php echo $dis_id; ?>" class="modal fade edit_user" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content" style="width: auto;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                                                            แก้ไขส่วนลด</h5>
                                                        <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                                                            <h3>&times;</h3>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-sm-8">
                                                                <div class="row">
                                                                    <div class="col-4" align="right">
                                                                        <label>รหัสส่วนลด : </label>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control" id="edit_dis<?= $dis_id ?>" placeholder="รหัสสี" disabled value="<?php echo $dis_id ?>" name="userID">
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="row">
                                                                    <div class="col-4" align="right">
                                                                        <label>สินค้า: </label>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <select name="select_type" class="form-control edit_sel_dispro" id="dispro_edit<?= $dis_id ?>">
                                                                            <option value="0">กรุณาเลือกสินค้า</option>
                                                                            <option value="0">----โปรดเลือก----</option>
                                                                            <?php
                                                                            $sql2 = "SELECT * FROM tb_product WHERE status ='1'";
                                                                            $result2 = mysqli_query($conn, $sql2);
                                                                            while ($row2 = $result2->fetch_assoc()) {
                                                                                $edit_prodis_id = $row2['pd_id'];
                                                                                $edit_prodis_name = $row2['pd_name'];
                                                                            ?>
                                                                                <option value="<?= $edit_prodis_id ?>" <?php if ($edit_prodis_id == $pddis_id) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>> <?= $edit_prodis_name ?></option>
                                                                            <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        </select>
                                                                    </div>
                                                                    <span style="color:red"> *</span>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col-4" align="right">
                                                                        <label>จำนวน : </label>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control check-dis-name" id="edit_dis_am<?= $dis_id ?>" placeholder="กรุณากรอกข้อมูล" name="fname" required value="<?php echo $am_dis; ?>">

                                                                        </div>
                                                                    </div>
                                                                    <span style="color:red"> *</span>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-4" align="right">
                                                                        <label>ส่วนลด : </label>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <div class="form-group">
                                                                            <input type="text" class="form-control check-dis-name" id="edit_dis_name<?= $dis_id ?>" placeholder="กรุณากรอกข้อมูล" name="fname" required value="<?php echo $dis_name; ?>">

                                                                        </div>
                                                                    </div>
                                                                    <span style="color:red"> *</span>
                                                                </div>



                                                                <div class="modal-footer">
                                                                    <div class="form-group" align="right">
                                                                        <button type="button" class="btn btn-outline-primary" data-id='<?= $dis_id ?>' id="btn_update_dis">บันทึก</button>
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
                                        </div>





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
            <?php
            require("./modal/st/add_dis.php");
            ?>


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