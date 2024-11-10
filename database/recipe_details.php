<?php
require "config.php";
$s=1;
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// 執行 SQL 語句並檢查是否成功

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
    echo "資料表 recipe_details 建立成功";
} else {
    echo "建立資料表錯誤: " . $conn->error;
}
// 插入範例數據到 recipe_details
while($s<6){
$insert_sql = "INSERT INTO recipe_details (recipe_id, ingredient, quantity, unit, step_number, step_description) VALUES 
    -- 牛奶燕麥粥食譜 (recipe_id = 1)
    (1+$s*11, '燕麥', 50, '克', 1, '將燕麥放入鍋中，用水煮沸。'),
    (1+$s*11, '牛奶', 200, '毫升', 2, '加入牛奶並攪拌，煮至濃稠。'),

    -- 法式吐司食譜 (recipe_id = 2)
    (2+$s*11, '吐司', 2, '片', 1, '將吐司浸泡在蛋液中。'),
    (2+$s*11, '雞蛋', 1, '顆', 2, '在平底鍋中煎至兩面金黃。'),

    -- 水煮蛋蔬菜沙拉食譜 (recipe_id = 3)
    (3+$s*11, '水煮蛋', 2, '顆', 1, '將水煮蛋切半。'),
    (3+$s*11, '生菜', 100, '克', 2, '將生菜洗淨，瀝乾。'),
    (3+$s*11, '橄欖油', 1, '湯匙', 3, '將橄欖油淋在生菜和蛋上。'),

    -- 雞肉炒飯食譜 (recipe_id = 4)
    (4+$s*11, '雞肉', 100, '克', 1, '將雞肉切塊，用油煎熟。'),
    (4+$s*11, '米飯', 1, '碗', 2, '加入米飯，翻炒均勻。'),
    (4+$s*11, '鹽', 0.5, '茶匙', 3, '加入鹽調味，即可享用。'),

    -- 三文魚壽司卷 (recipe_id = 5)
    (5+$s*11, '三文魚', 50, '克', 1, '將三文魚切成薄片。'),
    (5+$s*11, '壽司飯', 1, '碗', 2, '將飯鋪在海苔上，加入三文魚。'),
    (5+$s*11, '海苔', 1, '片', 3, '卷起海苔，切成小段。'),

    -- 義大利肉醬麵 (recipe_id = 6)
    (6+$s*11, '義大利麵', 100, '克', 1, '將義大利麵煮熟並瀝乾。'),
    (6+$s*11, '牛絞肉', 100, '克', 2, '煎炒牛絞肉，加入番茄醬煮至濃稠。'),
    (6+$s*11, '番茄醬', 50, '克', 3, '將肉醬淋在義大利麵上，攪拌均勻。')

        -- 日式豬排蓋飯 (recipe_id = 7)
    (7+$s*11, '豬排', 1, '片', 1, '將豬排煎至金黃色，瀝乾多餘的油。'),
    (7+$s*11, '米飯', 1, '碗', 2, '將米飯鋪於碗底。'),
    (7+$s*11, '洋蔥', 50, '克', 3, '切洋蔥絲並稍微炒軟。'),
    (7+$s*11, '蛋', 1, '顆', 4, '將蛋打散並倒入豬排旁，稍微攪拌。'),
    (7+$s*11, '醬油', 1, '湯匙', 5, '加醬油調味，倒入碗中。'),

    -- 麻辣鍋 (recipe_id = 8)
    (8+$s*11, '麻辣鍋底', 1, '包', 1, '將麻辣鍋底放入鍋中，加水煮沸。'),
    (8+$s*11, '牛肉片', 200, '克', 2, '將牛肉片加入鍋中煮熟。'),
    (8+$s*11, '蔬菜', 200, '克', 3, '加入各種蔬菜如白菜、金針菇。'),
    (8+$s*11, '豆腐', 100, '克', 4, '加入豆腐煮熟。'),
    (8+$s*11, '鴨血', 100, '克', 5, '最後放入鴨血，煮熟即可享用。'),

    -- 巧克力布朗尼 (recipe_id = 9)
    (9+$s*11, '黑巧克力', 100, '克', 1, '將黑巧克力隔水加熱融化。'),
    (9+$s*11, '奶油', 50, '克', 2, '加入奶油攪拌均勻。'),
    (9+$s*11, '雞蛋', 2, '顆', 3, '將雞蛋打入攪拌盆中並攪拌。'),
    (9+$s*11, '糖', 100, '克', 4, '加入糖攪拌至均勻。'),
    (9+$s*11, '麵粉', 50, '克', 5, '篩入麵粉並輕輕拌勻，倒入烤模中。'),
    (9+$s*11, '烘烤', NULL, NULL, 6, '在180度烤箱中烤20-25分鐘，至熟。'),

    -- 草莓奶酪 (recipe_id = 10)
    (10+$s*11, '草莓', 100, '克', 1, '將草莓切片，放在一旁備用。'),
    (10+$s*11, '鮮奶油', 100, '毫升', 2, '將鮮奶油打發至濃稠。'),
    (10+$s*11, '奶油乳酪', 100, '克', 3, '將奶油乳酪與糖打發至順滑。'),
    (10+$s*11, '糖', 30, '克', 4, '加入糖調味。'),
    (10+$s*11, '將奶酪組合', NULL, NULL, 5, '將奶油乳酪與鮮奶油混合，加入草莓即完成。'),

    -- 檸檬塔 (recipe_id = 11)
    (11+$s*11, '塔皮', 1, '片', 1, '準備好的塔皮，放入烤箱稍微烤至酥脆。'),
    (11+$s*11, '檸檬汁', 50, '毫升', 2, '將檸檬汁倒入攪拌盆中。'),
    (11+$s*11, '蛋黃', 2, '顆', 3, '將蛋黃加入檸檬汁中攪拌均勻。'),
    (11+$s*11, '糖', 5+$s*110, '克', 4, '加入糖拌勻，放入小火煮至濃稠。'),
    (11+$s*11, '奶油', 30, '克', 5, '關火後加入奶油拌勻，倒入塔皮中。'),
    (11+$s*11, '冷卻', NULL, NULL, 6, '將檸檬塔冷藏至凝固後食用。')
$s = $s+1;
";

if ($conn->query($insert_sql) === TRUE) {
    echo "範例數據插入成功";
} else {
    echo "插入數據錯誤: " . $conn->error;
}
}
// 關閉連接
$conn->close();
?>
