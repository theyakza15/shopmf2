<?php
@session_start();
include("connect.php");
$type_per = $_SESSION['type_per'];
$name_user = $_SESSION['emp_name'];
$surname_user = $_SESSION['emp_surname'];
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mafear Clothing</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/custom.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!--  Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
          <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-search fa-fw"></i>
          </a>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><?=$name_user." ".$surname_user?></a>
          <div class="dropdown-menu">
             <!-- <a class="dropdown-item" href="#">ข้อมูลส่วนตัว</a>
            <a class="dropdown-item" href="#edit_empp" data-toggle="modal">แก้ไขข้อมูล</a>  -->
            <!-- <a class="dropdown-item" href="#edit_password" data-toggle="modal">เปลี่ยนรหัสผ่าน</a> -->
            <div class="dropdown-divider"></div>
            <a class="dropdown-item " href="logout.php"><i class="fas fa-sign-out-alt"></i> ออกจากระบบ</a>
          </div>
        </li>
      </ul>
      
    </nav>

  
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">

        <span class="brand-text font-weight-light"><i class="fas fa-shopping-bag"></i> Mafear Clothing</span>
      </a>

      <?php
      if ($type_per == '') {
        header("Location: login_naw.php ");
      }
      ?>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="fas fa-home"></i>
                <p>
                  หน้าแรก
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="emp.php" class="nav-link">
                <i class="fas fa-user-tie"></i>
                <p>
                  พนักงาน
                </p>
              </a>
            </li>
            <?php
            if ($type_per != 2) {
            ?>
              <li class="nav-item">
                <a href="setadmin.php" class="nav-link">
                  <i class="fas fa-address-card"></i>
                  <p>
                    กำหนดสิทธิพนักงาน
                  </p>
                </a>
              </li>
            <?php

            }


            ?>

            <li class="nav-item">
              <a href="sale.php" class="nav-link">
                <i class="fas fa-comment-dollar"></i>
                <p>
                  ขายสินค้า
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="product.php" class="nav-link">
                <i class="fab fa-product-hunt"></i>
                <p>
                  สินค้า
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="st_product.php" class="nav-link">
                <i class="fas fa-shopping-basket"></i>
                <p>
                  สินค้าคงคลัง
                </p>
              </a>
            </li>

            <li class="nav-item">
              <a href="stock.php" class="nav-link">
                <i class="fas fa-box-open"></i>
                <p>
                  รับเข้าสินค้า
                </p>
              </a>
            </li>
              <li class="nav-item">
            <a href="sale_re.php" class="nav-link">
             <i class="fas fa-cash-register"></i>
              <p>
                รายงานการชำระเงิน
              </p>
            </a>
          </li>  
            <li class="nav-item">
              <a href="report.php" class="nav-link">
                <i class="fas fa-print"></i>
                <p>
                  ออกรายงาน
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="setting.php" class="nav-link">
                <i class="fas fa-cogs"></i>
                <p>
                  ตั้งค่า
                </p>
              </a>
            </li>
            
            <?php
            if ($type_per != 2) {
            ?>
              <li class="nav-item">
                <a href="log_mf.php" class="nav-link">
                  <i class="fa fa-file"></i>
                  <p>
                    Log การใช้งาน
                  </p>
                </a>
              </li>
            <?php

            }


            ?>

           <!--  <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <p>
                  ออกจากระบบ
                </p>
              </a>
            </li>
 -->



          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>

      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>

  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

 
  <div id="edit_password" class="modal fade edit_user" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: auto;">
                <div class="modal-header">
                    <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>เปลี่ยนรหัสผ่าน</h5>     
                    <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                        <h3>&times;</h3>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label>รหัสผ่านเดิม : </label>
                                </div>
                                <div class="col-7">
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="edit_dis" placeholder=" " value="" name="userID">
                                    </div>
                                </div>
                            </div>
           
                            <div class="row">
                                <div class="col-4" align="right">
                                    <label>รหัสผ่านใหม่: </label>
                                </div>
                                <div class="col-7">
                                    <div class="form-group">
                                        <input type="password" class="form-control check-dis-name" id="edit_dis_am" placeholder="กรุณากรอกข้อมูล" name="fname" required value="">

                                    </div>
                                </div>
                                <span style="color:red"> *</span>
                            </div>

                                <div class="row">
                                <div class="col-4" align="right">
                                    <label>ยืนยันรหัสผ่านใหม่: </label>
                                </div>
                                <div class="col-7">
                                    <div class="form-group">
                                        <input type="password" class="form-control check-dis-name" id="edit_dis_name" placeholder="กรุณากรอกข้อมูล" name="fname" required value="">

                                    </div>
                                </div>
                                <span style="color:red"> *</span>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group" align="right">
                                    <button type="button" class="btn btn-outline-primary" data-id='' id="btn_update_pass">บันทึก</button>
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

</body>

</html>
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script> -->
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/JQL.min.js"></script>
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dependencies/typeahead.bundle.js"></script>
<link rel="stylesheet" href="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.css">
<script type="text/javascript" src="https://earthchie.github.io/jquery.Thailand.js/jquery.Thailand.js/dist/jquery.Thailand.min.js"></script>



<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.dataTables.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
date_default_timezone_set('Asia/Bangkok');

function DateThai1($start)
{
  $strYear = date("Y", strtotime($start)) + 543;
  $strMonth = date("m", strtotime($start));
  $strDay = date("d", strtotime($start));
  $show = $strDay . "/" . $strMonth . "/" . $strYear;
  return $show;
}

?>