<?php
// Include the database config file
require('connect.php');
$id = $_POST['id'];
if ($id !="") {
    // Fetch state data based on the specific country
    $query = "SELECT id_pd_det,si_name FROM `tb_produnt_detail`
    INNER JOIN tb_size ON tb_size.si_id=tb_produnt_detail.det_size
    WHERE pd_id ='$id' AND tb_size.status='1' AND tb_produnt_detail.status='1'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
echo '<option value="0">---กรุณาเลือกสินค้า---</option>';

        while ($row = $result->fetch_assoc()) {

            echo '<option value="' . $row['id_pd_det'] . '">' . $row['si_name'] . '</option>';
      
        }
    } else {
        echo '<option value="">ไม่พบไซส์สินค้า</option>';

    }
} else {
    echo '<option value="">ไม่พบไซส์สินค้า</option>';
    
}
