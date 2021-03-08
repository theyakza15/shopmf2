<?php
require 'connect.php';
$output = '';
$query = '';

$id = $_POST["extra_search"];



$query = "SELECT  pd_id ,pd_name,pd_pic,tb_product.status as status
FROM tb_product           
LEFT JOIN tb_group ON tb_group.gr_id=tb_product.pd_group
WHERE tb_product.pd_group = '$id'
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
        $subdata[] = '<img src="images/' . $row['pd_pic'] . '" width="100" height="100"/>';
        $subdata[] = $pds_status;
        
        $subdata[] = '
        <a href="#edit_product" data-toggle="modal"><button type="button" class="btn btn-warning btn-sm" id="btn_edit_product" data="' . $row['pd_id'] . ' "
        data-toggle="tooltip"  title="' . $edit . '" ">
        <i class="fas fa-edit" style="color:white"></i></button> </a>'
            .
            
           '<a href="#view_size" data-toggle="modal"> <button type="button" class="btn btn-info btn-sm" id="size_view" data="' . $row['pd_id'] . ' "
        data-toggle="tooltip"  title="' . $edit . '" ">
        <i class="fas fa-list-ol" style="color:white"></i></button> </a>'
            .

            '<button type="button" class="' . $color . '" id="cancel_pro" data-id="' . $row['pd_id'] . ' " data-status="' . $row['status'] . ' "data-name="' . $row['pd_name'] . ' 
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
