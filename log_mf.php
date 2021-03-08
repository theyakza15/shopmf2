<?php
@session_start();
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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Log การใช้งาน</h1>
                </div>

            </div>
        </div>
    </div>
    <div class="content">
        <div class="card shadow">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <table class="table table-striped table-bordered text-center" id="log_1" width="100%">
                            <thead class="table-info">
                                <th>ลำดับ</th>
                                <th>รหัสพนักงาน</th>
                                <th>การกระทำ</th>
                                <th>วันที่</th>
                            </thead>
                            <?php

                            $sql_per = "SELECT * FROM `log_mafear`";

                            $result = mysqli_query($conn, $sql_per);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                $i = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $emp_id = $row['emp_id'];
                                    $mss = $row['m_ss'];
                                    $date = $row['date_log'];
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php echo $emp_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $mss; ?>
                                        </td>
                                        <td>
                                            <?php echo Datethai($date); ?>
                                        </td>
                                        
                                    </tr>
                                <?php
                                } // while loop
                            } // end if

                            // Add นิติบุคคล
                                ?>
                        </table>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end card body -->
        </div> <!-- end card shadow -->
    </div> <!-- end con -->
</div>
<script>
    var tbl_log = $('#log_1').DataTable({
    "responsive": true,
    "lengthChange": false,
    "columnDefs": [
        { responsivePriority: 1, targets: 0 },
        { responsivePriority: 2, targets: 1 }
    ],

    "language": {
        "search": "ค้นหา:",


        "info": "<h4> แสดง  _START_  ถึง _END_ ทั้งหมด จาก <strong style='color:red;'> _TOTAL_ </strong> รายการ </h4>",
        "zeroRecords": "ไม่พบรายการค้นหา",
        "infoEmpty": "แสดงรายการ 0 ถึง 0 ทั้งหมด 0 รายการ",
        "paginate": {
            "first": "หน้าแรก",
            "last": "หน้าสุดท้าย",
            "next": ">>>",
            "previous": "<<<"
        },


        "infoFiltered": "( คำที่ค้นหา จาก _MAX_ รายการ ทั้งหมด ) ",

    }
});
</script>