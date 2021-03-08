<?php
//fetch.php
require 'connect.php';
$output = '';
$query = "";
$id = $_POST['id'];

$query = "SELECT tbl_product.pro_id as pro_id ,tbl_product.pro_name as pro_name,tbl_product.pro_price as price 
,tbl_sale_detail.sd_amount as amount,tbl_sale_detail.sd_total as  total
FROM tbl_product
LEFT JOIN tbl_sale_detail ON tbl_sale_detail.pro_id=tbl_product.pro_id
LEFT JOIN tbl_sale ON tbl_sale.sal_id=tbl_sale_detail.sal_id
LEFT JOIN tbl_payment ON tbl_payment.pay_id=tbl_sale.pay_id
WHERE tbl_payment.pay_id='$id'
ORDER BY tbl_product.pro_id ASC";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $i = 1;
    $data = array();
    while ($row = mysqli_fetch_array($result)) {
        $subdata = array();
 
        $subdata[] = $row['pro_id'];
        $subdata[] = $row['pro_name'];
        $subdata[] = $row['price'];
        $subdata[] = $row['amount'];
        $subdata[] = $row['total'];
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
