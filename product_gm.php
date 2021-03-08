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
                    <h1 class="m-0 text-dark">การจัดการสินค้า</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">

        <div class="card shadow">
            <div class="card-body">
                <div class="nav-wrapper">

                    <div class="col-12">
                        <button type="button" class="btn btn-warning " data-toggle="modal" id='in_user' data-target="#addproduct_mf"><i class="ni ni-fat-add"></i>
                            เพิ่มสินค้า</button>

                    </div>
                    <br>
                </div>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center" id="tb_product_mg" width="100%">
                            <thead class="table-info">
                                <th>ลำดับ</th>
                                <th>รหัสสินค้า</th>
                                <th>ประเภทสินค้า</th>
                                <th>ชนิดสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ไซร์</th>
                                <th>สี</th>
                                <th>ราคา</th>
                                <th>จำนวน</th>
                                <th>วิธีการ</th>

                            </thead>
                            <tr>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>

                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require("./modal/product/addproduct.php");
    ?>

    <!--   Core JS Files   -->

    </body>
    <script src="dist/js/apps/product.js"></script>



    </html>