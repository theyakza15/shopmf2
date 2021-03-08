<?php
//fetch.php
require 'connect.php';
$output = '';
$query = "";
$id = $_POST['id'];

$query = "SELECT tbl_product.pro_id as pro_id,tbl_product.pro_name as pro_name,tbl_product.pro_price as price
,tbl_product.pro_status as status,tbl_group_product.gr_id as gr_id,tbl_group_product.gr_name as gr_name ,tbl_type_product.type_pro_id as type_id
,tbl_type_product.type_pro_name as type_name,tbl_dealer.deal_id as deal_id,tbl_dealer.deal_name as deal_name,tbl_product.pro_pic as pic
FROM tbl_product
LEFT JOIN tbl_group_product ON tbl_group_product.gr_id=tbl_product.group_id
LEFT JOIN tbl_type_product ON tbl_type_product.type_pro_id=tbl_group_product.type_pro_id
LEFT JOIN tbl_dealer ON tbl_dealer.deal_id=tbl_product.deal_id
WHERE tbl_product.group_id='$id'
ORDER BY tbl_product.pro_id ASC";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $i = 1;
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        $subdata = array();
        $status = $row['status'];
        if ($status == '1') {
            $image = 'fas fa-times';
            $color = "btn btn-danger btn-sm";
            $txt = "ยกเลิกข้อมูล";
            $a_heft = "delete";
            $com_status = 'ปกติ';
        } else {
            $image = 'fas fa-check';
            $color = "btn btn-success btn-sm";
            $txt = "ยกเลิกการระงับ";
            $a_heft = "unremove";
            $com_status = 'ยกเลิก';

        }
$sql_max = 'SELECT MAX(st_amount) as max_amount FROM tbl_stock WHERE pro_id="' . $row['pro_id'] . '"';
$result_max = mysqli_query($conn, $sql_max);
$row_max = $result_max->fetch_assoc();

        $subdata[] = $row['pro_id'];
        $subdata[] = $row['pro_name'];
        $subdata[] = $row['deal_name'];
        $subdata[] = $row['price'];
        $subdata[] = '
        <button type="button" class="btn btn-success btn-sm" id="btn_add_list"
        data-id="' . $row['pro_id'] . '"
        data-name="' . $row['pro_name'] . '"
        data-price="' . $row['price'] . '"
        data-max ="' . $row_max['max_amount'] . '"
            data-toggle="tooltip"  title="แก้ไขข้อมูล"">
            <i class="fas fa-plus"style="color:white"></i></button>';
        $rows[] = $subdata;

        $i++;

    }
    $json_data = array(
        "draw" => intval($request['draw']),
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFilter),
        "data" => $rows,
    );
    echo json_encode($json_data);

} else {
    $json_data = array(
        "draw" => intval($request['draw']),
        "recordsTotal" => intval($totalData),
        "recordsFiltered" => intval($totalFilter),
        "data" => $rows,
    );
    echo json_encode($json_data);

}
