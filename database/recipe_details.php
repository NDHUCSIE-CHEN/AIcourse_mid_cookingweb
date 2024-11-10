<?php
require "config.php";
$s = 1;
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// 建立 recipe_details 資料表
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

if ($conn->query($sql) === TRUE) {
    echo "資料表 recipe_details 建立成功<br>";
} else {
    echo "建立資料表錯誤: " . $conn->error;
}

// 插入範例數據到 recipe_details
while ($s < 6) {
    $base_id = $s * 11; // 每次增加的 recipe_id 基數
    $insert_sql = "INSERT INTO recipe_details (recipe_id, ingredient, quantity, unit, step_number, step_description) VALUES 
        ($base_id + 1, '燕麥', 50, '克', 1, '將燕麥放入鍋中，用水煮沸。'),
        ($base_id + 1, '牛奶', 200, '毫升', 2, '加入牛奶並攪拌，煮至濃稠。'),

        ($base_id + 2, '吐司', 2, '片', 1, '將吐司浸泡在蛋液中。'),
        ($base_id + 2, '雞蛋', 1, '顆', 2, '在平底鍋中煎至兩面金黃。'),

        ($base_id + 3, '水煮蛋', 2, '顆', 1, '將水煮蛋切半。'),
        ($base_id + 3, '生菜', 100, '克', 2, '將生菜洗淨，瀝乾。'),
        ($base_id + 3, '橄欖油', 1, '湯匙', 3, '將橄欖油淋在生菜和蛋上。'),

        ($base_id + 4, '雞肉', 100, '克', 1, '將雞肉切塊，用油煎熟。'),
        ($base_id + 4, '米飯', 1, '碗', 2, '加入米飯，翻炒均勻。'),
        ($base_id + 4, '鹽', 0.5, '茶匙', 3, '加入鹽調味，即可享用。'),

        ($base_id + 5, '三文魚', 50, '克', 1, '將三文魚切成薄片。'),
        ($base_id + 5, '壽司飯', 1, '碗', 2, '將飯鋪在海苔上，加入三文魚。'),
        ($base_id + 5, '海苔', 1, '片', 3, '卷起海苔，切成小段。'),

        ($base_id + 6, '義大利麵', 100, '克', 1, '將義大利麵煮熟並瀝乾。'),
        ($base_id + 6, '牛絞肉', 100, '克', 2, '煎炒牛絞肉，加入番茄醬煮至濃稠。'),
        ($base_id + 6, '番茄醬', 50, '克', 3, '將肉醬淋在義大利麵上，攪拌均勻。'),

        ($base_id + 7, '豬排', 1, '片', 1, '將豬排煎至金黃色，瀝乾多餘的油。'),
        ($base_id + 7, '米飯', 1, '碗', 2, '將米飯鋪於碗底。'),
        ($base_id + 7, '洋蔥', 50, '克', 3, '切洋蔥絲並稍微炒軟。'),
        ($base_id + 7, '蛋', 1, '顆', 4, '將蛋打散並倒入豬排旁，稍微攪拌。'),
        ($base_id + 7, '醬油', 1, '湯匙', 5, '加醬油調味，倒入碗中。'),

        ($base_id + 8, '麻辣鍋底', 1, '包', 1, '將麻辣鍋底放入鍋中，加水煮沸。'),
        ($base_id + 8, '牛肉片', 200, '克', 2, '將牛肉片加入鍋中煮熟。'),
        ($base_id + 8, '蔬菜', 200, '克', 3, '加入各種蔬菜如白菜、金針菇。'),
        ($base_id + 8, '豆腐', 100, '克', 4, '加入豆腐煮熟。'),
        ($base_id + 8, '鴨血', 100, '克', 5, '最後放入鴨血，煮熟即可享用。'),

        ($base_id + 9, '黑巧克力', 100, '克', 1, '將黑巧克力隔水加熱融化。'),
        ($base_id + 9, '奶油', 50, '克', 2, '加入奶油攪拌均勻。'),
        ($base_id + 9, '雞蛋', 2, '顆', 3, '將雞蛋打入攪拌盆中並攪拌。'),
        ($base_id + 9, '糖', 100, '克', 4, '加入糖攪拌至均勻。'),
        ($base_id + 9, '麵粉', 50, '克', 5, '篩入麵粉並輕輕拌勻，倒入烤模中。'),
        ($base_id + 9, '烘烤', NULL, NULL, 6, '在180度烤箱中烤20-25分鐘，至熟。'),

        ($base_id + 10, '草莓', 100, '克', 1, '將草莓切片，放在一旁備用。'),
        ($base_id + 10, '鮮奶油', 100, '毫升', 2, '將鮮奶油打發至濃稠。'),
        ($base_id + 10, '奶油乳酪', 100, '克', 3, '將奶油乳酪與糖打發至順滑。'),
        ($base_id + 10, '糖', 30, '克', 4, '加入糖調味。'),
        ($base_id + 10, '將奶酪組合', NULL, NULL, 5, '將奶油乳酪與鮮奶油混合，加入草莓即完成。'),

        ($base_id + 11, '塔皮', 1, '片', 1, '準備好的塔皮，放入烤箱稍微烤至酥脆。'),
        ($base_id + 11, '檸檬汁', 50, '毫升', 2, '將檸檬汁倒入攪拌盆中。'),
        ($base_id + 11, '蛋黃', 2, '顆', 3, '將蛋黃加入檸檬汁中攪拌均勻。'),
        ($base_id + 11, '糖', 50, '克', 4, '加入糖拌勻，放入小火煮至濃稠。'),
        ($base_id + 11, '奶油', 30, '克', 5, '關火後加入奶油拌勻，倒入塔皮中。'),
        ($base_id + 11, '冷卻', NULL, NULL, 6, '將檸檬塔冷藏至凝固後食用。')
    ";

    if ($conn->query($insert_sql) === TRUE) {
        echo "第 $s 組範例數據插入成功<br>";
    } else {
        echo "插入數據錯誤: " . $conn->error;
    }
    $s++;
}

// 關閉連接
$conn->close();
?>

