<?php
require "config.php";
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS recipe_details (
    detail_id INT AUTO_INCREMENT PRIMARY KEY,
    recipe_id INT NOT NULL,
    ingredient VARCHAR(255) NOT NULL,
    quantity DECIMAL(10, 2),
    unit VARCHAR(50),
    step_number INT NOT NULL,
    step_description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (recipe_id) REFERENCES recipes(recipe_id) ON DELETE CASCADE
)";

// 執行 SQL 語句並檢查是否成功
if ($conn->query($sql) === TRUE) {
    echo "資料表 recipe_details 建立成功";
} else {
    echo "建立資料表錯誤: " . $conn->error;
}

// 插入範例數據到 recipe_details
$insert_sql = "INSERT INTO recipe_details (recipe_id, ingredient, quantity, unit, step_number, step_description) VALUES 
    -- 牛奶燕麥粥食譜 (recipe_id = 1)
    (1, '燕麥', 50, '克', 1, '將燕麥放入鍋中，用水煮沸。'),
    (1, '牛奶', 200, '毫升', 2, '加入牛奶並攪拌，煮至濃稠。'),
    
    -- 法式吐司食譜 (recipe_id = 2)
    (2, '吐司', 2, '片', 1, '將吐司浸泡在蛋液中。'),
    (2, '雞蛋', 1, '顆', 2, '在平底鍋中煎至兩面金黃。'),

    -- 水煮蛋蔬菜沙拉食譜 (recipe_id = 3)
    (3, '水煮蛋', 2, '顆', 1, '將水煮蛋切半。'),
    (3, '生菜', 100, '克', 2, '將生菜洗淨，瀝乾。'),
    (3, '橄欖油', 1, '湯匙', 3, '將橄欖油淋在生菜和蛋上。'),

    -- 雞肉炒飯食譜 (recipe_id = 4)
    (4, '雞肉', 100, '克', 1, '將雞肉切塊，用油煎熟。'),
    (4, '米飯', 1, '碗', 2, '加入米飯，翻炒均勻。'),
    (4, '鹽', 0.5, '茶匙', 3, '加入鹽調味，即可享用。'),

    -- 三文魚壽司卷 (recipe_id = 5)
    (5, '三文魚', 50, '克', 1, '將三文魚切成薄片。'),
    (5, '壽司飯', 1, '碗', 2, '將飯鋪在海苔上，加入三文魚。'),
    (5, '海苔', 1, '片', 3, '卷起海苔，切成小段。'),

    -- 義大利肉醬麵 (recipe_id = 6)
    (6, '義大利麵', 100, '克', 1, '將義大利麵煮熟並瀝乾。'),
    (6, '牛絞肉', 100, '克', 2, '煎炒牛絞肉，加入番茄醬煮至濃稠。'),
    (6, '番茄醬', 50, '克', 3, '將肉醬淋在義大利麵上，攪拌均勻。')
";

if ($conn->query($insert_sql) === TRUE) {
    echo "範例數據插入成功";
} else {
    echo "插入數據錯誤: " . $conn->error;
}

// 關閉連接
$conn->close();
?>
