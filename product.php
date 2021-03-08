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
                    <h1 class="m-0 text-dark">สินค้า</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">

        <div class="card shadow">
            <div class="card-body">
                <div class="nav-wrapper">


                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped table-bordered text-center" id="customer" width="100%">
                                    <thead class="table-info">
                                        <th>ลำดับ</th>

                                        <th>ประเภท</th>
                                        <th>กลุ่มสินค้า</th>

                                        <th>สถานะ</th>
                                        <th>วิธีการ</th>
                                    </thead>
                                    <?php
                                    $sql_pd = "SELECT gr_id,gr_name,tb_group.status as status,tb_type.ty_id as ty_id 
                                    ,tb_type.ty_name as ty_name
                                    FROM tb_group           
                                    LEFT JOIN tb_type ON tb_type.ty_id=tb_group.ty_id
                                    ORDER BY ty_id ASC";

                                    $result = mysqli_query($conn, $sql_pd);
                                    if ($result->num_rows > 0) {
                                        // output data of each row
                                        $i = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $gr_id = $row['gr_id'];
                                            $type_name = $row['ty_name'];
                                            $group_name = $row['gr_name'];
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
                                                    <?php echo  $type_name; ?>
                                                </td>

                                                <td>
                                                    <?php echo $group_name; ?>
                                                </td>

                                                <td>
                                                    <?php echo  $cus_status; ?>
                                                </td>
                                                <td class="sta">
                                                   <!--  <a href="#edit_pro<?= $pd_id ?>" data-toggle="modal">
                                                        <button type='button' class='btn btn-warning btn-sm' id="edit" data="<?= $id ?>" data-toggle="tooltip" title="แก้ไขข้อมูล"><i class="fas fa-edit" style="color:white"></i></button>
                                                    </a> -->
                                                    <a href="#view_product" data-toggle="modal">
                                                        <button type='button' class='btn btn-info btn-sm' id="pro_view" data="<?= $gr_id ?>" data-toggle="tooltip" title="แสดงข้อมูล"> <i class="fas fa-list-ol" style="color:black"></i></button>
                                                    </a>
                                                   

                                                </td>

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
<!-- model view -->
<div id="view_product" class="modal fade edit_user" role="dialog">
    
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                        สินค้า</h5>
                    <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                        <h3>&times;</h3>
                    </button>
                </div>
                <br>

                <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-warning " data-toggle="modal" id='in_user' data-target="#add_product"><i class="ni ni-fat-add"></i>
                            เพิ่มสินค้า</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center" id="tb_pro_view" width="100%">
                            <thead class="table-info">
                                <th>ลำดับ</th>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>รูปสินค้า</th>
                                <th>สถานะ</th>
                                <th>วิธีการ</th>
                            </thead>
                        </table>
                    </div>
                </div>
                                   
            </div>
        </div>

</div>

<!-- viewsize -->
<div id="view_size" class="modal fade edit_user" role="dialog">
    
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                        Size สินค้า</h5>
                    <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                        <h3>&times;</h3>
                    </button>
                </div>
                <br>
                    <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-warning " data-toggle="modal" id='in_user' data-target="#add_size"><i class="ni ni-fat-add"></i>
                            เพิ่มSizeสินค้า</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center" id="tb_size_view" width="100%">
                            <thead class="table-info">
                                <th>ลำดับ</th>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>Size</th>
                                <th>ราคา</th>
                                <th>สถานะ</th>
                                <th>วิธีการ</th>
                            </thead>
                        </table>
                    </div>
                </div>
                                   
            </div>
        </div>
</div>


<!-- viewcolor -->
<div id="view_color" class="modal fade edit_user" role="dialog">
    
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                        Color</h5>
                    <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                        <h3>&times;</h3>
                    </button>
                </div>
                <br>
                    <div class="row">
                    <div class="col-12">
                        <button type="button" class="btn btn-warning " data-toggle="modal" id='in_user' data-target="#add_color"><i class="ni ni-fat-add"></i>
                            เพิ่มสี</button>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center" id="tb_color_view" width="100%">
                            <thead class="table-info">
                                <th>ลำดับ</th>
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>สี</th>
                                <th>สถานะ</th>
                                <th>วิธีการ</th>
                            </thead>
                            

                        </table>
                    </div>
                </div>
                                   
            </div>
        </div>

</div>
<form method="post" class="form-horizontal insert_product" role="form"  id="edit_user" enctype="multipart/form-data" autocomplete="off">
<?php
require("./modal/product/modal_add_pro.php");
?>
</form>
<form method="post" class="form-horizontal edit_product" role="form"  id="edit_user" enctype="multipart/form-data" autocomplete="off">
<?php
require("./modal/product/modal_edit_pro.php");
?>
</form>
<?php
require("./modal/product/modal_add_size.php");
require("./modal/product/modal_add_color.php");
require("./modal/product/modal_edit_size.php");
require("./modal/product/modal_edit_color.php");
?>




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
<script src="dist/js/apps/product.js"></script>



</html>