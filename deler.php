<?php
include "sidebar.php";
$datenow = strtotime(date("Y-m-d"));
$d = date('Y', $datenow) + 543;
$sqlm = "SELECT max(deal_id) as Maxid  FROM tbl_dealer";
$result = mysqli_query($conn, $sqlm);
$row_mem = mysqli_fetch_assoc($result);
$mem_old = $row_mem['Maxid'];
//M003
$tmp1 = substr($mem_old, 0, 3); //จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
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


$id_del = $tmp1 . $sub_date . $a;

?>
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0 text-dark">ผู้จัดจำหน่าย</h1>
                  </div><!-- /.col -->

              </div><!-- /.row -->
          </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <!-- Small boxes (Stat box) -->
              <div class="card ">
                  <br>
                  <div class="row">
                      <div class="col-12">
                          <button type="button" class="btn btn-success" data-toggle="modal"
                              data-target=".bd-example-modal-lg" id="add_product"><i class="ni ni-fat-add"></i>
                              เพิ่มข้อมูลผู้จัดจำหน่าย</button>
                      </div>
                  </div>
                  <br>
                  <div class="row">
                      <div class="col-md-12 ">


                          <table class="table table-striped text-center " cellspacing="0" id="tbl_product" width="100%">
                              <thead>
                                  <th>ลำดับ</th>
                                  <th>รหัส</th>
                                  <th>ชื่อ</th>
                                  <th>สถานะ</th>
                                  <th>#</th>
                              </thead>

                              <?php
$sql = "SELECT * FROM tbl_dealer ORDER BY deal_id ASC";

$results = mysqli_query($conn, $sql);

if ($results->num_rows > 0) {
    // output data of each row
    $i = 0;
    while ($row = $results->fetch_assoc()) {
        $i++;
        $id = $row['deal_id'];
        $deal_name = $row['deal_name'];
        $status = $row['deal_status'];
       
        ?>
                              <?php
if ($status == '1') {
            $image = 'fas fa-times';
            $color = "btn btn-danger btn-sm";
            $txt = "ยกเลิกข้อมูล";
            $a_heft = "delete";
            $com_status = 'ปกติ';
        } else if ($status == '0') {
            $image = 'fas fa-check';
            $color = "btn btn-success btn-sm";
            $txt = "ยกเลิกการระงับ";
            $a_heft = "unremove";
            $com_status = 'ยกเลิก';

        }
        ?>
                              <tr>
                                  <td><?php echo $i; ?></td>
                                  <td >
                                      <?php echo $id; ?>
                                  </td>
                                  <td >
                                      <?php echo $deal_name; ?>
                                  </td>
                                  <td >
                                      <?php echo $com_status; ?>
                                  </td>
                                  <td>
                                      <a href="#edit<?php echo $id; ?>" data-toggle="modal">
                                          <button type='button' class='btn btn-warning btn-sm' id="edit"
                                              data_id="<?=$id?>"data_st="<?=$st_id?>" data-toggle="tooltip"
                                              title="แก้ไขข้อมูล"><i class="fas fa-edit"
                                                  style="color:white"></i></button>
                                      </a>

                                      <button type='button' class='<?=$color?>' id="cancel" data-dismiss="modal"
                                          data_id="<?=$id?>" data_st="<?=$st_id?> "status="<?=$status?>" data-name="<?=$deal_name?>"
                                          data-toggle="tooltip" title="<?=$txt?>"><i class="<?=$image?>"
                                              style="color:white"></i></button>

                                  </td>
                                  <!-- Modal Edit-->
                                  <div id="edit<?php echo $id; ?>" class="modal fade edit_mem" role="dialog">
                                      <form method="post" class="form-horizontal" id="edit_fm" role="form" action=""
                                          enctype="multipart/form-data">
                                          <div class="modal-dialog modal-lg">
                                              <div class="modal-content" style="width: auto;">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title card-title"><i class="ni ni-single-02"></i>
                                                          แก้ไขข้อมูลผู้จัดจำหน่าย
                                                      </h5>
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
                                                                      <label>รหัสผู้จัดจำหน่าย </label>
                                                                  </div>
                                                                  <div class="col-7">
                                                                      <div class="form-group">
                                                                          <input type="text" class="form-control"
                                                                              id="edit_userID<?=$id?>"
                                                                              placeholder="รหัสพนักงาน" disabled
                                                                              value="<?php echo $id ?>" name="userID">
                                                                      </div>
                                                                  </div>
                                                              </div>
                                                              <div class="row">
                                                                  <div class="col-4" align="right">
                                                                      <label>ชื่อ : </label>
                                                                  </div>
                                                                  <div class="col-7">
                                                                      <div class="form-group">
                                                                          <input type="text"
                                                                              class="form-control edit-name"
                                                                              id="del_name<?=$id?>"
                                                                              placeholder="กรุณากรอกข้อมูล" required
                                                                              name="lname"
                                                                              value="<?php echo $deal_name; ?>">
                                                                      </div>

                                                                  </div>
                                                                  <span style="color:red"> *</span>
                                                              </div>
                                                          </div>
                                                          <div class="col-sm-4">
                                                          </div>


                                                      </div>

                                                      <div class="modal-footer">
                                                          <div class="form-group" align="right">
                                                              <button type="button" class="btn btn-outline-primary"
                                                                  data-id='<?=$id?>' data_st='<?=$st_id?>'
                                                                  id="btn_update_product">บันทึก</button>
                                                          </div>
                                                          <div class="form-group">
                                                              <button type="button" class="btn btn-outline-danger"
                                                                  data-dismiss="modal">ยกเลิก</button>
                                                          </div>
    
                                                      </div>
                                                  </div>
                                              </div>
                                      </form>
                                  </div>
                      </div>
                  </div>
                  </tr>
              </div>

          </div>
          <?php
} // while loop
} // end if
?>
          </table>
  </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  </div>

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
      aria-hidden="true" id="dialog_user">
      <div class="modal-dialog modal-lg">
          <div class="modal-content" style="width: auto;">
              <div class="modal-header">
                  <h5 class="modal-title card-title"><i class="ni ni-single-02"></i> ข้อมูลสินค้า</h5>
                  <button type="button" class="close" data-dismiss="modal" style="width:50px;">
                      <h3>&times;</h3>
                  </button>
                  </button>
              </div>

            <div class="modal-body">
                <form role="form" method="POST" action="" enctype="multipart/form-data" class="insert" id="myForm">
                    <div class="row">
                        <div class="col-4" align="right">
                            <label>รหัสประเภทสินค้า : </label>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <input type="text" class="form-control" id="type_id" readonly
                                    placeholder="รหัสประเภทสินค้า" value="<?php echo $id_del; ?>" name="type_id">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" align="right">
                            <label>ชื่อประเภทสินค้า : </label>
                        </div>
                        <div class="col-5">
                            <div class="form-group">
                                <input type="text" class="form-control " id="type_name" placeholder="กรุณากรอกข้อมูล"
                                    name="type_name" required>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="row">
                <div class="col-5">
                    <div class="form-group" align="right">
                        <button type="button" class="btn btn-outline-success" name="btn_add"
                            id="btn_add">บันทึก</button>
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
  <script src="dist/js/apps/deler.js"></script>