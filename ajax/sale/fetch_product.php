
<?php
require 'connect.php';
$output = '';
$query = '';

$id = $_POST["extra_search"];

$query = "SELECT tb_product.pd_name as pd_name,tb_color.co_name as co_name,tb_color_detail.id_color_det as id,tb_produnt_detail.price as price,amount FROM tb_color_detail
INNER JOIN tb_color ON tb_color.co_id=tb_color_detail.id_color
INNER JOIN tb_produnt_detail ON tb_produnt_detail.id_pd_det=tb_color_detail.pd_id
INNER JOIN tb_product ON tb_product.pd_id=tb_produnt_detail.pd_id
WHERE tb_color_detail.pd_id='$id' AND tb_color_detail.status='1'";

$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $i = 1;
    $data = array();

    while ($row = mysqli_fetch_array($result)) {
        $subdata = array();
        $pd_name = $row['pd_name'];
        $co_name = $row['co_name'];
        $price = $row['price'];
        $id = $row['id'];
        $amount=$row['amount'];
        $subdata[] = '<label class="checkbox-inline"><input type="checkbox" id="chk' . $id . '"value="' . $id . '" total ="0" class="checkbox larger "data-name="' . $pd_name . '" data-color="' . $co_name . '">  เลือก</label>';
        $subdata[] = $id;
        $subdata[] = $pd_name;
        $subdata[] = $co_name;
        $subdata[] = $price;
        $subdata[] = '<input type="number" name="num" max="'.$amount.'" maxlength="4" style="width:150px" data-id="' . $id . '" data-price="' . $price . '" id="num' . $id . '" placeholder="0" class="form-control number-check amount" required min="1"  value="0" disabled>';
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
