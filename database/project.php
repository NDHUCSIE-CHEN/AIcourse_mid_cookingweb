<?php
require "config.php";
$s = 1;
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// 檢查連接
if ($conn->connect_error) {
    die("資料庫連接失敗: " . $conn->connect_error);
}

// 建立 recipes 資料表的 SQL 語句
$sql = "CREATE TABLE IF NOT EXISTS recipes (
    recipe_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    prep_time INT,
    cook_time INT,
    servings INT,
    category VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "資料表 recipes 建立成功<br>";
} else {
    echo "建立資料表錯誤: " . $conn->error . "<br>";
}

// 插入範例數據
$insert_sql = "INSERT INTO recipes (name, description, prep_time, cook_time, servings, category) VALUES 
    ('牛奶燕麥粥', '簡單營養的燕麥粥，搭配牛奶提升口感。', 5, 10, 1, '早餐'),
    ('法式吐司', '經典早餐，簡單又美味的法式吐司。', 5, 10, 1, '早餐'),
    ('水煮蛋蔬菜沙拉', '高蛋白水煮蛋配上新鮮蔬菜，健康又低熱量。', 10, 5, 1, '早餐'),
    ('雞肉炒飯', '簡單又豐富的雞肉炒飯，適合忙碌的午餐。', 10, 15, 1, '午餐'),
    ('三文魚壽司卷', '新鮮的三文魚壽司卷，搭配醋飯的絕妙口感。', 20, 0, 2, '午餐'),
    ('義大利肉醬麵', '香濃肉醬配上義大利麵，美味又飽足。', 10, 25, 2, '午餐'),
    ('牛排佐烤馬鈴薯', '多汁牛排搭配烤馬鈴薯，適合週末的晚餐享受。', 10, 20, 1, '晚餐'),
    ('日式豬排蓋飯', '經典日式料理，豬排搭配溫熱米飯。', 10, 15, 1, '晚餐'),
    ('麻辣鍋', '適合多人享用的麻辣鍋，溫暖又有味。', 15, 30, 4, '晚餐'),
    ('巧克力布朗尼', '香濃巧克力布朗尼，口感濕潤、入口即化。', 10, 25, 8, '甜點與點心'),
    ('草莓奶酪', '甜美的草莓奶酪，適合飯後的甜點享受。', 10, 0, 4, '甜點與點心'),
    ('檸檬塔', '酸甜的檸檬塔，清新又解膩。', 20, 15, 6, '甜點與點心')";

if ($conn->query($insert_sql) === TRUE) {
    echo "範例數據插入成功<br>";
} else {
    echo "插入數據錯誤: " . $conn->error . "<br>";
}

// 關閉連接
$conn->close();
?>
