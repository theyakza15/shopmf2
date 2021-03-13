<?php
require 'connect.php';
date_default_timezone_set("Asia/Bangkok");

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


$output = '';
$query = '';

@session_start();

$query = "SELECT  st_id,st_dete, tb_employees.emp_id as emp_id , tb_stock.status as status,
sum(tb_stock_detail.amount) as amount,
tb_employees.emp_name AS emp_name,
tb_employees.emp_surname AS emp_surname
FROM tb_stock
LEFT JOIN tb_employees ON tb_employees.emp_id = tb_stock.emp_id
LEFT JOIN tb_stock_detail ON tb_stock_detail.id_st= tb_stock.st_id
GROUP BY st_id 
ORDER BY st_id ASC";

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $i = 1;
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $subdata = array();

        $image = 'fas fa-times';
        $color = "btn btn-danger btn-sm";
        $txt = "ยกเลิกข้อมูล";
        $pay_id = $row['st_id'];
        $pay_date = $row['st_dete'];
        $pay_status = $row['status'];
        $emp_name = $row['emp_name']."  ".$row['emp_surname'];
        $sum = $row['amount'];
        if ($pay_status == '1') {
            $image = 'fas fa-times';
            $color = "btn btn-danger btn-sm";
            $txt = "ยกเลิกข้อมูล";
            $a_heft = "delete";
            $status = 'ปกติ';
        }else{
            $image = 'fas fa-check';
            $color = "btn btn-success btn-sm";
            $txt = "ยกเลิกการระงับ";
            $a_heft = "unremove";
            $edit = "ยกเลิกข้อมูล";
            $status = 'ยกเลิก';
        }

        $subdata[] = $i;
        $subdata[] = $pay_id;
        $subdata[] = Datethai($pay_date);
        $subdata[] = $sum;
        $subdata[] = $emp_name;
        $subdata[] = $status;
        $subdata[] = '
        <a href="#viewcom" data-toggle="modal">
                                <button type="button" class="btn btn-info btn-sm" id="view" data-toggle="tooltip"
                                    data-id="' . $pay_id . '" title="แสดงข้อมูล"><i class="fas fa-list"
                                        style="color:white"></i></button>
        </a>
                            
                            <button type="button" id="cancel_product" class="' . $color . '" data-toggle="tooltip"
                                title="' . $txt . '"
                                data-id="' . $pay_id . '"  data-status="' . $pay_status . '"><i class="' . $image . '"
                                    style="color:white"></i></span></button>';
        $rows[] = $subdata;

        $i++;
    }
    $json_data = array(

        "data" => $rows,
    );
    echo json_encode($json_data);
} else {
    $json_data = array(

        "data" => "",
    );
    echo json_encode($json_data);
}
