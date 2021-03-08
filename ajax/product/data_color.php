<?php
require 'connect.php';
$output = '';
$query = '';

$id = $_POST["extra_search"];



$query = "SELECT id_color_det,id_color,tb_color_detail.pd_id as pd_id,tb_color_detail.status as status
,tb_color.co_name as co_name
,tb_product.pd_name as pd_name
FROM tb_color_detail           
INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det=tb_color_detail.pd_id
INNER JOIN tb_color ON tb_color.co_id=tb_color_detail.id_color
INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
WHERE tb_color_detail.pd_id = '$id' 
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
        $subdata[] = $row['id_color_det'];
        $subdata[] = $row['pd_name'];
        $subdata[] = $row['co_name'];
        $subdata[] = $pds_status;
        
        $subdata[] = '
        <a href="#edit_color" data-toggle="modal"> <button type="button" class="btn btn-warning btn-sm" id="btn_edit_color" data="' . $row['id_color_det'] . ' " data_color="' . $row['id_color'] . ' "
        data-toggle="tooltip"  title="' . $edit . '" ">
        <i class="fas fa-edit" style="color:white"></i></button> </a>'
            .
            
            '<button type="button" class="' . $color . '" id="cancel_color" data-id="' . $row['id_color_det'] . ' " data-status="' . $row['status'] . ' "data-name="' .$row['co_name'].' 
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
