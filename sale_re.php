<?php
require("sidebar.php");
function DateThai($strDate)
{
    $strYear = date("Y", strtotime($strDate)) + 543;
    $strMonth = date("n", strtotime($strDate));
    $strDay = date("j", strtotime($strDate));
    $strHour = date("H", strtotime($strDate));
    $strMinute = date("i", strtotime($strDate));
    if ($strDay < 10) {
        $strDay = "0" . $strDay;
      
    }
    if ($strMonth < 10) {
        $strMonth ="0".$strMonth;
    }
    return "$strDay/$strMonth/$strYear $strHour:$strMinute";
}
?>
<!-- End Navbar -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">รายการขายสินค้า</h1>
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
                                        <th>รหัสการขาย</th>
                                        <th>วันที่ขาย</th>
                                        

                                        <th>ส่วนลด</th>
                                        <th>ราคาสุทธิ</th>
                                        <th>วิธีการ</th>
                                    </thead>
                                    <?php
                                   $sql_pay = "SELECT pay_id,dis_id,discount,total,pay_date,status_pay,type_pay
                                   FROM paymant
                                   
                                   ORDER BY pay_id ASC";
                                    $result = mysqli_query($conn, $sql_pay);
                                    if ($result->num_rows > 0) {
                                        $i = 0;
                                        while ($row = $result->fetch_assoc()) {
                                            $payid = $row['pay_id'];
                                            $pay_date = $row['pay_date'];
                                            $pay_dis = $row['discount'];
                                            $pay_to = $row['total'];
                                            $status = $row['status_pay'];
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
                                            <td>
                                                <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $payid; ?>
                                                </td>
                                                <td>
                                                    <?php echo Datethai($pay_date); ?>
                                                </td>
                                                
                                                <td class="text-right border-bottom">
                                                    <?php echo number_format($pay_dis, 2); ?>
                                                </td>
                                                <td class="text-right border-bottom">
                                                    <?php echo number_format($pay_to, 2); ?>
                                                </td>
                                                </td>
                                                <td class="sta">
                                                <button type='button' id="cancel_sale" class='<?= $color ?>' data-toggle="tooltip" data=" " ><i class="<?= $image ?>" style="color:white"></i></span></button>
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