<?php
// Include the database config file
require('connect.php');
$id = $_POST['id'];
if ($id !="") {
    // Fetch state data based on the specific country
    $query = "SELECT * FROM `tb_product` WHERE pd_group ='$id' AND status='1'";
    
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
echo '<option value="0">---กรุณาเลือกสินค้า---</option>';

        while ($row = $result->fetch_assoc()) {

            echo '<option value="' . $row['pd_id'] . '">' . $row['pd_name'] . '</option>';
      
        }
    } else {
        echo '<option value="">ไม่พบสินค้า</option>';

    }
} else {
    echo '<option value="">ไม่พบสินค้า</option>';
    
}
