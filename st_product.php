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
                    <h1 class="m-0 text-dark">สินค้าคงคลัง</h1>
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
                                        <th>กลุ่ม</th>
                                        <th>ชื่อสินค้า</th>
                                        <th>ไซร์</th>
                                        <th>สี</th>
                                        <th>คงเหลือ(ชิ้น)</th>
                                        
                                    </thead>
                                    <?php
                                   $sql_emp_re = "SELECT tb_product.pd_id AS pd_id,pd_name,pd_group,tb_product.status AS status
                                   ,tb_produnt_detail.price AS price
                                   ,tb_size.si_name AS si_name
                                   ,tb_color.co_name AS co_name
                                   ,tb_color_detail.amount AS amount
                                   ,tb_group.gr_name AS gr_name
                                   ,tb_type.ty_name AS ty_name
                                   FROM tb_product 
                                   INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
                                   INNER JOIN tb_type ON tb_type.ty_id =tb_group.ty_id
                                   INNER JOIN tb_produnt_detail ON tb_produnt_detail.pd_id=tb_product.pd_id
                                   INNER JOIN tb_size ON tb_size.si_id =tb_produnt_detail.det_size
                                   INNER JOIN tb_color_detail ON tb_color_detail.pd_id =tb_produnt_detail.id_pd_det
                                   INNER JOIN tb_color ON tb_color.co_id =tb_color_detail.id_color
                                   ORDER BY pd_id ASC";
                                   
                                   
                                   $result = mysqli_query($conn, $sql_emp_re);
                                   if ($result->num_rows > 0) {
                                     $i = 0;
                                     while ($row = $result->fetch_assoc()) {
                                       $proid = $row['pd_id'];
                                       $ty_name = $row['ty_name'];
                                       $proname = $row['pd_name'];
                                       $grname = $row['gr_name'];
                                       $siname = $row['si_name'];
                                       $coname = $row['co_name'];
                                       $am_ount = $row['amount'];
                                       $price_pro = $row['price'];
                           
                                       $i++;
                           


                                    ?>
                                            <tr>
                                            <td>
                                                <?php echo $i; ?>
                                                </td>
                                                <td>
                                                    <?php echo $ty_name; ?>
                                                </td>
                                                <td>
                                                    <?php echo $grname; ?>
                                                </td>
                                                <td>
                                                    <?php echo $proname; ?>
                                                </td>
                                                <td >
                                                    <?php echo $siname;; ?>
                                                </td>
                                                <td>
                                                    <?php echo $coname; ?>
                                                </td>
                                                <td class="text-right border-bottom">
                                                    <?php echo $am_ount; ?>
                                                </td>
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