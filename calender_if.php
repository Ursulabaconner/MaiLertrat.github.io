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

include "connect.php"; // เชื่อมต่อฐานข้อมูล

// ดึงข้อมูลวันที่ที่มีการสอนพร้อมชื่อคอร์สจากฐานข้อมูล
$sql = "--You Code SQL--";
$result = $conn->query($sql);

// สร้างอาร์เรย์เก็บวันที่และชื่อคอร์สที่มีการสอน
$teachingDays = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // ใช้ class_date เก็บวันที่ และ sc_name เก็บชื่อคอร์ส
        $day = date('j', strtotime($row['--table_date--']));
        $teachingDays[$day] = $row['--Table to set conditions--'];
    }
}

// สร้างตารางปฏิทิน


echo "<table class='table table-bordered'>";
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
        // ถ้าเป็นวันปัจจุบัน และมีการสอน
        if (array_key_exists($day, $teachingDays)) {
            echo "<td style='background-color: lightblue;'>
                    <strong>$day</strong><br><br>วันนี้<br><br>" . $teachingDays[$day] . "<br><br>" . $teachingstate[$day] . 
                  "</td>";
        } else {
            // ถ้าเป็นวันปัจจุบัน แต่ไม่มีการสอน
            echo "<td style='background-color: lightblue;'><strong>$day</strong><br><br>วันนี้</td>";
        }
    } elseif (array_key_exists($day, $teachingDays)) {
        // ถ้าเป็นวันที่มีการสอน
        echo "<td style='background-color: lightgreen;'>
                <strong>$day</strong><br><br>" . $teachingDays[$day] . "<br><br>" . $teachingstate[$day] . 
              "</td>";
    } else {
        // ถ้าไม่ใช่วันปัจจุบันและไม่มีการสอน
        echo "<td>$day</td>";
    }
    
}

// เติมช่องว่างหลังจากวันสุดท้ายของเดือน
while (($startDayOfWeek + $day - 1) % 7 != 0) {
    echo "<td></td>";
    $day++;
}

echo "</tr></table>";

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
