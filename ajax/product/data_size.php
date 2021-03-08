<?php
require 'connect.php';
$output = '';
$query = '';

$id = $_POST["extra_search"];



$query = "SELECT id_pd_det,price,tb_product.pd_id as pd_id ,det_size,tb_produnt_detail.status as status
,tb_product.pd_name as pd_name
,tb_size.si_name as si_name
FROM tb_produnt_detail           
LEFT JOIN tb_product ON tb_product.pd_id=tb_produnt_detail.pd_id
LEFT JOIN tb_size ON tb_size.si_id=tb_produnt_detail.det_size
WHERE tb_product.pd_id = '$id'
ORDER BY pd_id ASC";


$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $i = 1;
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        $subdata = array();
        if ($row['status'] == 1) {
            $pds_status = "กำลังใช้งาน";
            $image = 'fas fa-times';
            $color = "btn btn-danger btn-sm";
            $txt = "ยกเลิกข้อมูล";
            $edit = "แก้ไขข้อมูล";
            $a_heft = "delete";
        } else {
            $image = 'fas fa-check';
            $color = "btn btn-success btn-sm";
            $txt = "ยกเลิกการระงับ";
            $a_heft = "unremove";
            $edit = "ยกเลิกข้อมูล";
            $pds_status = 'ยกเลิก';
        }
        $subdata[] = $i;
        $subdata[] = $row['pd_id'];
        $subdata[] = $row['pd_name'];
        $subdata[] = $row['si_name'];
        $subdata[] = $row['price'];
        $subdata[] = $pds_status;
        
        $subdata[] = '
        <a href="#edit_size" data-toggle="modal"><button type="button" class="btn btn-warning btn-sm" id="btn_edit_size" data="' . $row['id_pd_det'] . ' " data_size="' . $row['det_size'] . ' " 
        data-toggle="tooltip"  title="' . $edit . '" ">
        <i class="fas fa-edit" style="color:white"></i></button> </a>'
            .
            '<a href="#view_color" data-toggle="modal"> <button type="button" class="btn btn-info btn-sm" id="color_view" data="' . $row['id_pd_det'] . ' "
            data-toggle="tooltip"  title="' . $edit . '" ">
            <i class="fas fa-list-ol" style="color:white"></i></button> </a>'
            .
            '<button type="button" class="' . $color . '" id="cancel_size" data-id="' . $row['id_pd_det'] . ' " data-status="' . $row['status'] . ' "data-name="' . $row['si_name'] . ' 
        "data-toggle="tooltip"  title="' . $txt . '" ">
        <i  class="' . $image . '" style="color:white"></i></button>';
       

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
