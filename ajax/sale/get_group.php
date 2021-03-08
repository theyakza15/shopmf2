<?php
// Include the database config file
require('connect.php');
$id = $_POST['id'];
if ($id !="") {
    // Fetch state data based on the specific country
    $query = "SELECT * FROM `tb_group` WHERE ty_id ='$id' AND status='1'";
    
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
echo '<option value="0">---โปรดเลือกกลุ่มสินค้า---</option>';

        while ($row = $result->fetch_assoc()) {

            echo '<option value="' . $row['gr_id'] . '">' . $row['gr_name'] . '</option>';
      
        }
    } else {
        echo '<option value="">ไม่พบกลุ่มสินค้า</option>';

    }
} else {
    echo '<option value="">ไม่พบกลุ่มสินค้า</option>';
    
}
