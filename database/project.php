<?php
require "config.php";
$s = 1;
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// 建立 recipes 資料表的 SQL 語句
$sql = "CREATE TABLE IF NOT EXISTS recipes (
    recipe_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    prep_time INT,              -- 準備時間（分鐘）
    cook_time INT,              -- 烹飪時間（分鐘）
    servings INT,               -- 份量
    category VARCHAR(50),       -- 食譜分類，如早餐、午餐等
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// 執行 SQL 語句並檢查是否成功
if ($conn->query($sql) === TRUE) {
    echo "資料表 recipes 建立成功";
} else {
    echo "建立資料表錯誤: " . $conn->error;
}

// 關閉連接
$conn->close();
?>
