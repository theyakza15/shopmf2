<?php
require 'connect.php';
$output = '';
$query = '';

$id = $_POST["extra_search"];



$query = "SELECT id_st,  tb_color_detail.id_color_det AS pd_id ,tb_stock_detail.amount AS amount ,tb_stock_detail.status AS status,
tb_type.ty_name AS ty_name,
tb_group.gr_name AS gr_name,
tb_product.pd_name AS pd_name,
tb_size.si_name AS si_name,
tb_color.co_name AS co_name
FROM tb_stock_detail
INNER JOIN tb_color_detail ON tb_color_detail.id_color_det = tb_stock_detail.pd_id
INNER JOIN tb_color ON tb_color.co_id = tb_color_detail.id_color
INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det = tb_color_detail.pd_id
INNER JOIN tb_size ON tb_produnt_detail.det_size = tb_size.si_id
INNER JOIN tb_product ON tb_product.pd_id = tb_produnt_detail.pd_id
INNER JOIN tb_group ON tb_group.gr_id = tb_product.pd_group
INNER JOIN tb_type ON tb_type.ty_id = tb_group.ty_id
WHERE id_st = '$id' 
ORDER BY id_st ASC";

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $i = 1;
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $subdata = array();

        $image = 'fas fa-times';
        $color = "btn btn-danger btn-sm";
        $txt = "ยกเลิกข้อมูล";
        $subdata[] = $i;
        $subdata[] = $row['pd_id'];
        $subdata[] = $row['ty_name'];
        $subdata[] = $row['gr_name'];
        $subdata[] = $row['pd_name'];
        $subdata[] = $row['si_name'];
        $subdata[] = $row['co_name'];
        $subdata[] = $row['amount'];     
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
