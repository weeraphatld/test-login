<?php
// login.php
$username = $_POST['username'];
$password = $_POST['password'];

// แทนที่ด้วย URL ของ API ที่ Sheety ให้คุณ
$api_url = 'https://api.sheety.co/f42cd6efeb33849230069d25276e089e/loginWeeraphatWebsite/sheet1';

// ดึงข้อมูลจาก Google Sheets
$data = file_get_contents($api_url);
$json = json_decode($data, true);

$login_success = false;

foreach ($json['Sheet1'] as $row) { // แทนที่ 'sheetName' ด้วยชื่อของแผ่นงานของคุณ
    if ($row['username'] == $username && password_verify($password, $row['password'])) {
        $login_success = true;
        break;
    }
}

if ($login_success) {
    echo "Login successful!";
    // โค้ดเพิ่มเติมสำหรับหลังจากการล็อกอินสำเร็จ
} else {
    echo "Invalid username or password!";
}
?>
