<?php
@session_start();
require 'connect.php';
$username = $_POST['username'];
$password = $_POST['password'];


$sql_login = "SELECT tb_employees.emp_id AS emp_id,username,password,tb_permissions.status AS status,type_per,
tb_employees.status_per AS status_per
,tb_employees.emp_name AS emp_name
,tb_employees.emp_surname AS emp_surname
FROM tb_permissions
INNER JOIN tb_employees ON tb_employees.emp_id = tb_permissions.emp_id
WHERE username = '$username' AND password ='$password' AND tb_employees.status_emp = '1' AND tb_employees.status_per ='1'
ORDER BY emp_id ASC ";
$result = mysqli_query($conn, $sql_login);
if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $type_per_num = $row['type_per'];
    if ($type_per_num == '1') {
        $type_per_name = 'ผู้ดูแลระบบ';
        $_SESSION["emp_id"] = $row["emp_id"];
        $_SESSION["emp_name"] = $row["emp_name"];
        $_SESSION["emp_surname"] = $row["emp_surname"];
        $_SESSION["type_per"] = $row["type_per"];
        
    } else if ($type_per_num == '2') {
        $_SESSION["emp_id"] = $row["emp_id"];
        $_SESSION["emp_name"] = $row["emp_name"];
        $_SESSION["emp_surname"] = $row["emp_surname"];
        $_SESSION["type_per"] = $row["type_per"];
        $type_per_name = 'พนักงาน';
    }
    echo $type_per_name;
    echo $_SESSION["emp_name"];
        echo $_SESSION["emp_surname"];
        echo $_SESSION["type_per"];
} else {
    echo "0";
}
