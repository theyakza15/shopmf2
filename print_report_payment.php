<?php
require_once 'connect.php';
require 'fpdf181/fpdf.php';

date_default_timezone_set('Asia/Bangkok');

$date = $_POST['date_payment'];
$month = $_POST['month_payment'];
$year = $_POST['month_year_payment'];

function DateThai($start)
{
    $strYear = date("Y", strtotime($start)) + 543;
    $strMonth = date("m", strtotime($start));
    $strDay = date("d", strtotime($start));
    $show = $strDay . "/" . $strMonth . "/" . $strYear;
    return $show;
}
function month($strDate)
{
    $strMonth = $strDate;
    $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
    $strMonthThai = $strMonthCut[$strMonth];
    return " $strMonthThai";
}

function year($start)
{
    $strYear = date("Y", strtotime($start)) + 543;
    return $strYear;
}

$date2 = date("Y-m-d");
$stdate = DateThai($date2);
$time_report = date("H:i");

$sql = '';
class PDF extends FPDF
{
    //กำหนด header
    public function Header()
    {
        global $title, $list, $i, $s_date, $time_report, $stdate;
        $w = $this->GetStringWidth($title) + 8;
        //$this->SetX((210 - $w) / 2); //จัดกึ่งกลางห
        global $total_name;
        $this->SetLineWidth(1); //เส้นขอบ
        $this->AddFont('angsa', '', 'angsa.php');
        $this->SetFont('angsa', '', 14);
        //$this->Image('../image/logo.png', 10, 10, -300);
        //$this->Ln(15);
        /*  $this->Cell(10, 5, iconv('UTF-8', 'TIS-620', 'สนามยิงปืน บีบี กัน 273 แพรกษา บีบีแคมป์'), 0, 1);
        $this->Cell($w, 5, iconv('UTF-8', 'TIS-620', '273 ตำบลแพรกษา'), 0, 1, "");
        $this->Cell($w, 5, iconv('UTF-8', 'TIS-620', 'อำเภอเมืองเทศบาลนครสมุทรปราการ จังหวัดสมุทรปราการ 10280'), 0, 1, "");
        $this->Cell(10, 5, iconv('UTF-8', 'TIS-620', 'โทร. 081-3718323 '), 0, 1);
         */
        $this->Cell(300, 10, iconv('UTF-8', 'cp874', $title), 0, 0, 'C');
        $this->SetFillColor(180, 180, 255);
        $this->SetDrawColor(1, 1, 1);
        $this->Ln();
        $this->Cell(40, 5, iconv('UTF-8', 'cp874', 'วันที่ : ' . $stdate . " เวลา : " . $time_report), 0, 0, "C");
        $this->Ln(6);
        $this->Cell(10, 10, iconv('UTF-8', 'cp874', 'ลำดับ'), 1, 0, 'C', true);
        $this->Cell(120, 10, iconv('UTF-8', 'cp874', 'ชื่อสินค้า'), 1, 0, 'C', true);
        $this->Cell(40, 10, iconv('UTF-8', 'cp874', 'ผู้จำหน่าย'), 1, 0, 'C', true);
        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'จำนวน'), 1, 0, 'C', true);
        $this->Cell(30, 10, iconv('UTF-8', 'cp874', 'เงินรวม'), 1, 0, 'C', true);

        if ($i != 0) {
            if ($i % 20 == 1) {
                $this->Ln();
            }
        }
    }
    public function footer()
    {
        $this->AddFont('angsa', '', 'angsa.php');
        $this->SetY(-15); //ตำแหน่ง 1.5 ซม จากด้านล่าง
        $this->SetFont('angsa', '', 14);
        $this->Cell(0, 10, iconv('UTF-8', 'TIS-620', 'หน้า ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');

    }
}
//--------------------------------------------query-----------------------------------------
if ($date != "") {
    $title = "รายงานข้อมูลการชำระเงินวันที่ " . DateThai($date);
    $sql = "SELECT tbl_product.pro_name as pro_name,tbl_dealer.deal_name as del_name,SUM(tbl_sale_detail.sd_amount) as sum_amount,SUM(tbl_sale_detail.sd_total) as sum_total
FROM tbl_product
INNER JOIN tbl_dealer ON tbl_dealer.deal_id=tbl_product.deal_id
INNER JOIN tbl_sale_detail ON tbl_sale_detail.pro_id=tbl_product.pro_id
INNER JOIN tbl_sale ON tbl_sale.sal_id=tbl_sale_detail.sal_id
INNER JOIN tbl_payment ON tbl_payment.pay_id=tbl_sale.pay_id
WHERE tbl_payment.pay_status='1'AND tbl_sale.sal_date='$date'
GROUP BY tbl_product.pro_id";
} else if ($month != 0 && $year != 0) {
    $title = "รายงานข้อมูลการชำระเงิน เดือน " . month($month) . ' ปี ' . year($year);
$sql = "SELECT tbl_product.pro_name as pro_name,tbl_dealer.deal_name as del_name,SUM(tbl_sale_detail.sd_amount) as sum_amount,SUM(tbl_sale_detail.sd_total) as sum_total
FROM tbl_product
INNER JOIN tbl_dealer ON tbl_dealer.deal_id=tbl_product.deal_id
INNER JOIN tbl_sale_detail ON tbl_sale_detail.pro_id=tbl_product.pro_id
INNER JOIN tbl_sale ON tbl_sale.sal_id=tbl_sale_detail.sal_id
INNER JOIN tbl_payment ON tbl_payment.pay_id=tbl_sale.pay_id
WHERE tbl_payment.pay_status='1' AND MONTH(tbl_sale.sal_date)='$month' AND  YEAR(tbl_sale.sal_date) = '$year'
GROUP BY tbl_product.pro_id";

} else if ($year != 0) {
    $title = "รายงานข้อมูลการชำระเงิน ประจำปี " . year($year);

$sql = "SELECT tbl_product.pro_name as pro_name,tbl_dealer.deal_name as del_name,SUM(tbl_sale_detail.sd_amount) as sum_amount,SUM(tbl_sale_detail.sd_total) as sum_total
FROM tbl_product
INNER JOIN tbl_dealer ON tbl_dealer.deal_id=tbl_product.deal_id
INNER JOIN tbl_sale_detail ON tbl_sale_detail.pro_id=tbl_product.pro_id
INNER JOIN tbl_sale ON tbl_sale.sal_id=tbl_sale_detail.sal_id
INNER JOIN tbl_payment ON tbl_payment.pay_id=tbl_sale.pay_id
WHERE tbl_payment.pay_status='1' AND YEAR(tbl_sale.sal_date) = '$year'
GROUP BY tbl_product.pro_id";

} else {
    $title = "รายงานข้อมูลการชำระเงินทั้งหมด ";

    $sql = "SELECT tbl_product.pro_name as pro_name,tbl_dealer.deal_name as del_name,SUM(tbl_sale_detail.sd_amount) as sum_amount,SUM(tbl_sale_detail.sd_total) as sum_total
FROM tbl_product
INNER JOIN tbl_dealer ON tbl_dealer.deal_id=tbl_product.deal_id
INNER JOIN tbl_sale_detail ON tbl_sale_detail.pro_id=tbl_product.pro_id
INNER JOIN tbl_sale ON tbl_sale.sal_id=tbl_sale_detail.sal_id
INNER JOIN tbl_payment ON tbl_payment.pay_id=tbl_sale.pay_id
WHERE tbl_payment.pay_status='1'
GROUP BY tbl_product.pro_id";

}
$result = mysqli_query($conn, $sql);
//-------------------------------------------end query--------------------------------------
ob_end_clean();
ob_start();

$pdf = new PDF(); //สร้าง object pdf จากคลาส PDF
//กำหนดชื่อรายงาน
$pdf->AliasNbPages();
$pdf->SetTitle($title, true);

$pdf->AddPage('L');

//เพิ่ม font
$pdf->AddFont('angsa', '', 'angsa.php');
$pdf->SetFont('angsa', '', 14);

//เติมสี
$pdf->SetFillColor(180, 180, 255);
$pdf->SetDrawColor(50, 50, 100);

$pdf->Ln();

//run คำสั่ง sql

//แสดงค่า
$i = 0;
$sum=0;
$sum_amount=0;
while ($array = mysqli_fetch_assoc($result)) {
    $i++;
    $pro_name = $array['pro_name'];
    $del_name = $array['del_name'];
    $total = $array['sum_total'];
    $amount = $array['sum_amount'];
//แสดงค่าในไฟล์ PDF
    $pdf->Cell(10, 10, iconv('UTF-8', 'cp874', $i), 1, 0, "C");
    $pdf->Cell(120, 10, iconv('UTF-8', 'cp874', $pro_name), 1, 0, "C");
    $pdf->Cell(40, 10, iconv('UTF-8', 'cp874', $del_name), 1, 0, "C");
    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $amount), 1, 0, "C");
    $pdf->Cell(30, 10, iconv('UTF-8', 'cp874', number_format($total, 2)), 1, 0, "R");
    $pdf->Ln();
    $sum+=$total;
    $sum_amount+=$amount;
} //end while */
$pdf->Cell(170, 10, iconv('UTF-8', 'cp874', "รวม"), 1, 0, "C");
$pdf->Cell(30, 10, iconv('UTF-8', 'cp874', $sum_amount), 1, 0, "C");
$pdf->Cell(30, 10, iconv('UTF-8', 'cp874',number_format($sum, 2)), 1, 0, "R");

$pdf->Ln();

$pdf->Output(); //คำสั่งแสดงผลลัพธ์
ob_end_flush(); //ปิด obj