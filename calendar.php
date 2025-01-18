<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        width: 14.28%;
        height: 80px;
        text-align: center;
        vertical-align: middle;
        border: 1px solid #ddd;
        font-size: 12px;
    }
    td {
        background-color: white;
    }
    .current-day {
        background-color: lightblue;
    }
    .teaching-day {
        background-color: lightgreen;
        font-size: 10px;
    }
    .teaching-day strong {
        display: block;
        font-size: 14px;
    }
</style>
<?php
// ตั้งค่าโซนเวลา
date_default_timezone_set('Asia/Bangkok');

// กำหนดเดือนและปีปัจจุบัน
$month = isset($_GET['month']) ? $_GET['month'] : date('n');
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');

// รับวันที่ปัจจุบัน
$currentDay = date('j');
$currentMonth = date('n');
$currentYear = date('Y');

// สร้างชื่อเดือนในภาษาไทย
$monthsThai = [
    1 => 'มกราคม', 2 => 'กุมภาพันธ์', 3 => 'มีนาคม', 4 => 'เมษายน',
    5 => 'พฤษภาคม', 6 => 'มิถุนายน', 7 => 'กรกฎาคม', 8 => 'สิงหาคม',
    9 => 'กันยายน', 10 => 'ตุลาคม', 11 => 'พฤศจิกายน', 12 => 'ธันวาคม'
];

// หาวันในสัปดาห์ที่เริ่มต้นของเดือนและจำนวนวันในเดือน
$firstDayOfMonth = mktime(0, 0, 0, $month, 1, $year);
$daysInMonth = date('t', $firstDayOfMonth);
$startDayOfWeek = date('w', $firstDayOfMonth);

// เริ่มสร้างปฏิทิน
echo "<div style='text-align: center;'><h3>ปฏิทิน</h3>";
echo "<h4>เดือน " . $monthsThai[$month] . " ปี " . ($year + 543) . "</h4>";
echo "วันนี้ " . date('d-m-Y') . "</div>";

// สร้างตารางปฏิทิน
echo "<table border='1' style='width:100%; text-align:center;'>";
echo "<tr>
        <th>อา</th>
        <th>จ</th>
        <th>อ</th>
        <th>พ</th>
        <th>พฤ</th>
        <th>ศ</th>
        <th>ส</th>
    </tr><tr>";

// เติมช่องว่างก่อนวันแรกของเดือน
for ($i = 0; $i < $startDayOfWeek; $i++) {
    echo "<td></td>";
}

// เติมวันในปฏิทิน
for ($day = 1; $day <= $daysInMonth; $day++) {
    // หากวันนั้นเป็นวันปัจจุบัน จะเปลี่ยนสี
    if ($day == $currentDay && $month == $currentMonth && $year == $currentYear) {
        echo "<td style='background-color: lightblue;'><strong>$day</strong></td>";
    } else {
        echo "<td>$day</td>";
    }

    // ถ้าครบสัปดาห์ก็ให้เริ่มแถวใหม่
    if (($startDayOfWeek + $day) % 7 == 0 && $day != $daysInMonth) {
        echo "</tr><tr>";
    }
}

// เติมช่องว่างหลังจากวันสุดท้ายของเดือน
while (($startDayOfWeek + $day - 1) % 7 != 0) {
    echo "<td></td>";
    $day++;
}

echo "</tr></table>";
?>
