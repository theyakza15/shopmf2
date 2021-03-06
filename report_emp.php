<script>
  window.print()
</script>
<style>
  .header {
    padding: 20px 0 20px 0;
    margin-bottom: 20px;
    overflow: auto;
    border-bottom: 2px solid #0095c8;
  }

  p {
    margin: 0;
  }

  .content {
    width: 100%;
    padding: 10px;
    height: 70px;
    border-bottom: 1px solid;
    text-align: center;

  }

  @media print {
    button {
      display: none;
    }

  }
</style>
<?php
@session_start();
require('connect.php');
$name = $_SESSION['emp_name'];
$surname = $_SESSION['emp_surname'];
date_default_timezone_set("Asia/Bangkok");
$d = date("d-m-Y H:i");

$type = $_POST['type_emp'];
$status_e = $_POST['status_emp'];
$date_emp1 = $_POST['date_emp_pro1'];
$date_emp2 = $_POST['date_emp_pro2'];
$month_emp = $_POST['month_emp_pro'];
$year_emp = $_POST['month_year_emp_pro'];

function month($strDate)
{

  $strMonth = $strDate;
  $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
  $strMonthThai = $strMonthCut[$strMonth];
  return "$strMonthThai";
}
month($month_emp);
function yearThai1($start)
{
  $strYear = date("Y", strtotime($start)) + 543;

  return $strYear;
}
function DateThai1($start)
{
  $strYear = date("Y", strtotime($start)) + 543;
  $strMonth = date("m", strtotime($start));
  $strDay = date("d", strtotime($start));
  $show = $strDay . "/" . $strMonth . "/" . $strYear;
  return $show;
}
DateThai1($date_emp1 && $date_emp2);
function DateThai($strDate)
{
  $strYear = date("Y", strtotime($strDate)) + 543;
  $strMonth = date("n", strtotime($strDate));
  $strDay = date("j", strtotime($strDate));
  $strHour = date("H", strtotime($strDate));
  $strMinute = date("i", strtotime($strDate));
  if ($strDay < 10) {
    $strDay = "0" . $strDay;
  }
  if ($strMonth < 10) {
    $strMonth = "0" . $strMonth;
  }
  return "$strDay/$strMonth/$strYear $strHour:$strMinute";
}

if ($type != '0' && $status_e != '2') {
  $sql_emp_re = "SELECT tb_employees.emp_id AS emp_id,emp_name,emp_surname,tb_employees.status_emp AS status_emp,emp_bd
  ,tb_permissions.type_per AS type_per
  ,tb_permissions.status AS status
  FROM tb_employees
  LEFT JOIN tb_permissions ON tb_permissions.emp_id =tb_employees.emp_id
  WHERE type_per = '$type' AND tb_employees.status_emp  = '$status_e'
  ORDER BY emp_id ASC";
  $title = "รายงานพนักงาน";
} else if ($date_emp1 != '' && $date_emp2 != '') {
  $sql_emp_re = "SELECT tb_employees.emp_id AS emp_id,emp_name,emp_surname,tb_employees.status_emp AS status_emp,emp_bd
  ,tb_permissions.type_per AS type_per
  ,tb_permissions.status AS status
  FROM tb_employees
  LEFT JOIN tb_permissions ON tb_permissions.emp_id =tb_employees.emp_id
  WHERE  DATE(emp_bd) BETWEEN '$date_emp1' AND '$date_emp2'
  ORDER BY emp_id ASC";
  $title = "รายงานพนักงานที่เข้าทำงานวันที่ " . DateThai1($date_emp1) . " ถึง " . DateThai1($date_emp2);
} else if ($month_emp != '0' && $year_emp != '0') {
  $sql_emp_re = "SELECT tb_employees.emp_id AS emp_id,emp_name,emp_surname,tb_employees.status_emp AS status_emp,emp_bd
  ,tb_permissions.type_per AS type_per
  ,tb_permissions.status AS status
  FROM tb_employees
  LEFT JOIN tb_permissions ON tb_permissions.emp_id =tb_employees.emp_id
  WHERE   MONTH(emp_bd) ='$month_emp' AND YEAR(emp_bd) ='$year_emp'
  ORDER BY emp_id ASC";
  $convert_date = $year_emp."-01-01";
  $strYear = date("Y", strtotime($convert_date)) + 543;
  $title = 'รายงานพนักงานที่เข้าทำงานเดือน ' . month($month_emp) . " " . "ปี" . " " . yearThai1($year_emp);
} else if ($type != '0') {
  $sql_emp_re = "SELECT tb_employees.emp_id AS emp_id,emp_name,emp_surname,tb_employees.status_emp AS status_emp,emp_bd
  ,tb_permissions.type_per AS type_per
  ,tb_permissions.status AS status
  FROM tb_employees
  LEFT JOIN tb_permissions ON tb_permissions.emp_id =tb_employees.emp_id
  WHERE type_per = '$type' AND tb_employees.status_emp = '1'
  ORDER BY emp_id ASC";
  $title = "รายงานพนักงาน (สิทธิ์การใช้งาน)";
} else if ($status_e != '2') {
  $sql_emp_re = "SELECT tb_employees.emp_id AS emp_id,emp_name,emp_surname,tb_employees.status_emp AS status_emp,emp_bd
  ,tb_permissions.type_per AS type_per
  ,tb_permissions.status AS status
  FROM tb_employees
  LEFT JOIN tb_permissions ON tb_permissions.emp_id =tb_employees.emp_id
  WHERE  tb_employees.status_emp = '$status_e'
  ORDER BY emp_id ASC";
  $title = "รายงานพนักงาน (สถานะการทำงาน)";
} else if ($year_emp != '0') {
  $sql_emp_re = "SELECT tb_employees.emp_id AS emp_id,emp_name,emp_surname,tb_employees.status_emp AS status_emp,emp_bd
  ,tb_permissions.type_per AS type_per
  ,tb_permissions.status AS status
  FROM tb_employees
  LEFT JOIN tb_permissions ON tb_permissions.emp_id =tb_employees.emp_id
  WHERE   YEAR(emp_bd) ='$year_emp'
  ORDER BY emp_id ASC";
$convert_date = $year_emp."-01-01";
$strYear = date("Y", strtotime($convert_date)) + 543;
$title = 'รายงานพนักงานที่เข้าทำงานปี' . " " .$strYear;
} else {
  $sql_emp_re = "SELECT tb_employees.emp_id AS emp_id,emp_name,emp_surname,tb_employees.status_emp AS status_emp,emp_bd
  ,tb_permissions.type_per AS type_per
  ,tb_permissions.status AS status
  FROM tb_employees
  LEFT JOIN tb_permissions ON tb_permissions.emp_id =tb_employees.emp_id
  ORDER BY emp_id ASC";
  $title = "รายงานพนักงานทั้งหมด";
}


?>

<head>
  <title>รายงานพนักงาน</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    table {font-family: Helvetica, Arial, Verdana; font-size: 14pt
    }
    @media print {
        thead {display: table-header-group;}
    }
</style>
</head>


<table style="margin:auto">
  <thead>
    <tr>
      <th>
        <div class="header">
          <div style="float:left">
            <h1>MafearShop</h1>
            <p>บ้านเลขที่ 4/436 ต.ในเมือง ถ.สระหลวง</p>
            <p>อ.เมือง จ.พิจิตร 66000</p>
            <p>เบอร์โทรศัพท์. 094-763-0932</p>
          </div>
          <br>
          <br>
          <br>
          <br>
          <br>
          <div style="float:right">
            <p>
              <width="250px" class="text-right">วันออก :<?= DateThai($d) ?>
            </p>
            <p>
              <width="150px" class="text-right">ผู้ออก :<?= $name . " " . $surname ?>
            </p>

          </div>
        </div>
      </th>
    </tr>
    <thead>
    <tbody>
      <tr>
        <td>
          <h3>
            <center><?= $title ?></center>
          </h3>
          <table class="table" border="1" width="100%">
            <thead>
              <tr>
                <th>
                  <center>ลำดับ</center>
                </th>
                <th>
                  <center>รหัสพนักงาน</center>
                </th>
                <th>
                  <center>ชื่อ-นามสกุล</center>
                </th>
                <th>
                  <center>สถานะ</center>
                </th>
                <th>
                  <center>ระดับสิทธิ์ผู้ใช้งาน</center>
                </th>
                <th>
                  <center>วันที่เข้าทำงาน</center>
                </th>
              </tr>
              </thead>
<tbody>
              <?php

              $result = mysqli_query($conn, $sql_emp_re);
              if ($result->num_rows > 0) {
                $i = 0;
                while ($row = $result->fetch_assoc()) {
                  $empid = $row['emp_id'];
                  $empname = $row['emp_name'];
                  $empsur = $row['emp_surname'];
                  $status_emp = $row['status_emp'];
                  $status_per = $row['emp_bd'];
                  $type_per = $row['type_per'];
                  if ($type_per == '1' && !$status_emp == '0') {
                    $cus_per = 'ผู้ดูแลระบบ';
                  } else if ($type_per == '2' && !$status_emp == '0') {
                    $cus_per = 'ผู้ใช้ระบบ';
                  } else {
                    $cus_per = '-';
                  }

                  if ($status_emp == '1') {
                    $cus_status1 = 'ปกติ';
                  } else if ($status_emp == '0') {
                    $cus_status1 = 'ลาออก';
                  }

                  $i++;



              ?>
                  <tr>

                    <td class="text-center border-bottom">
                      <?php echo $i; ?>
                    </td>
                    <td class="text-center border-bottom">
                      <?php echo $empid; ?>
                    </td>
                    <td>
                      <?php echo $empname . " " . $empsur; ?>
                    </td>
                    <td class="text-center border-bottom">
                      <?php echo $cus_status1; ?>
                    </td>
                    <td class="text-center border-bottom">
                      <?php echo $cus_per; ?>
                    </td>
                    <td class="text-center border-bottom">
                      <?php echo DateThai1($status_per); ?>
                    </td>

                  </tr>



                  </tbody>
<?php
                }
              }


?>
</tbody>