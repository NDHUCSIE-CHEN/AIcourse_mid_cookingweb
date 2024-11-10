<?php
require "config.php";
$s = 1;
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// 建立 inventory 資料表的 SQL 語句
$sql = "CREATE TABLE IF NOT EXISTS inventory (
    ingredient_id INT AUTO_INCREMENT PRIMARY KEY,
    ingredient_name VARCHAR(255) NOT NULL,
    quantity DECIMAL(10, 2) NOT NULL DEFAULT 0,
    unit VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// 執行 SQL 語句並檢查是否成功
if ($conn->query($sql) === TRUE) {
    echo "資料表 inventory 建立成功";
} else {
    echo "建立資料表錯誤: " . $conn->error;
}

// 插入範例數據到 inventory
$insert_sql = "INSERT INTO inventory (ingredient_name, quantity, unit) VALUES 
    ('牛奶', 1000, '毫升'),
    ('雞蛋', 12, '顆'),
    ('麵粉', 500, '克'),
    ('糖', 300, '克'),
    ('鹽', 200, '克'),
    ('橄欖油', 250, '毫升'),
    ('牛肉片', 500, '克'),
    ('豬排', 5, '片'),
    ('生菜', 300, '克'),
    ('三文魚', 200, '克'),
    ('壽司飯', 500, '克'),
    ('海苔', 10, '片'),
    ('義大利麵', 400, '克'),
    ('牛絞肉', 300, '克'),
    ('番茄醬', 150, '克'),
    ('麻辣鍋底', 1, '包'),
    ('豆腐', 200, '克'),
    ('鴨血', 100, '克'),
    ('黑巧克力', 100, '克'),
    ('奶油', 200, '克'),
    ('鮮奶油', 200, '毫升'),
    ('奶油乳酪', 100, '克'),
    ('草莓', 100, '克'),
    ('檸檬汁', 50, '毫升'),
    ('塔皮', 1, '片')";

if ($conn->query($insert_sql) === TRUE) {
    echo "範例數據插入成功";
} else {
    echo "插入數據錯誤: " . $conn->error;
}

// 關閉連接
$conn->close();
?>
