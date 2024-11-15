<?php
        require "database/config.php";

        $conn = mysqli_init();
        mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
        if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
            die('Failed to connect to MySQL: ' . mysqli_connect_error());
        }

        // 新增食譜
        if (isset($_POST['add_recipe'])) {
            $recipe_name = $_POST['recipe_name'];
            $ingredients = $_POST['ingredients'];

            // 新增食譜至 recipes 表
            $sql = "INSERT INTO recipes (name) VALUES ('$recipe_name')";
            if (mysqli_query($conn, $sql)) {
                $recipe_id = mysqli_insert_id($conn);
                // 新增食材細節至 recipe_details 表
                foreach ($ingredients as $ingredient) {
                    $ingredient_name = $ingredient['name'];
                    $quantity = $ingredient['quantity'];
                    $unit = $ingredient['unit'];

                    // 檢查材料是否已存在於 ingredients 表
                    $check_sql = "SELECT ingredient_id FROM ingredients WHERE name = '$ingredient_name' AND unit = '$unit'";
                    $check_result = mysqli_query($conn, $check_sql);

                    if (mysqli_num_rows($check_result) > 0) {
                        $row = mysqli_fetch_assoc($check_result);
                        $ingredient_id = $row['ingredient_id'];
                        $update_sql = "UPDATE ingredients SET quantity = quantity + $quantity WHERE ingredient_id = $ingredient_id";
                        mysqli_query($conn, $update_sql);
                    } else {
                        // 新增新材料到 ingredients 表
                        $insert_sql = "INSERT INTO ingredients (name, quantity, unit) VALUES ('$ingredient_name', $quantity, '$unit')";
                        mysqli_query($conn, $insert_sql);
                        $ingredient_id = mysqli_insert_id($conn);
                    }

                    // 新增食譜和材料的關聯到 recipe_details 表
                    $recipe_ingredient_sql = "INSERT INTO recipe_details (recipe_id, ingredient, quantity) VALUES ($recipe_id, '$ingredient_name', $quantity)";
                    mysqli_query($conn, $recipe_ingredient_sql);
                }
                echo "<div class='alert alert-success'>食譜新增成功</div>";
            } else {
                echo "<div class='alert alert-danger'>新增失敗: " . mysqli_error($conn) . "</div>";
            }
        }

        // 新增材料
        if (isset($_POST['add_ingredient'])) {
            $ingredient_name = $_POST['ingredient_name'];
            $quantity = $_POST['quantity'];
            $unit = $_POST['unit'];

            $check_sql = "SELECT ingredient_id FROM ingredients WHERE name = '$ingredient_name' AND unit = '$unit'";
            $check_result = mysqli_query($conn, $check_sql);

            if (mysqli_num_rows($check_result) > 0) {
                $row = mysqli_fetch_assoc($check_result);
                $ingredient_id = $row['ingredient_id'];
                $update_sql = "UPDATE ingredients SET quantity = quantity + $quantity WHERE ingredient_id = $ingredient_id";
                mysqli_query($conn, $update_sql);
                echo "<div class='alert alert-success'>材料已存在，數量已更新</div>";
            } else {
                $insert_sql = "INSERT INTO ingredients (name, quantity, unit) VALUES ('$ingredient_name', $quantity, '$unit')";
                if (mysqli_query($conn, $insert_sql)) {
                    echo "<div class='alert alert-success'>材料新增成功</div>";
                } else {
                    echo "<div class='alert alert-danger'>新增材料失敗: " . mysqli_error($conn) . "</div>";
                }
            }
        }

        // 刪除食譜及相關細節
        if (isset($_POST['delete_recipe'])) {
            $recipe_id = $_POST['recipe_id'];
            $delete_sql = "DELETE FROM recipes WHERE recipe_id = $recipe_id";
            if (mysqli_query($conn, $delete_sql)) {
                echo "<div class='alert alert-success'>食譜及其相關細節刪除成功</div>";
            } else {
                echo "<div class='alert alert-danger'>刪除失敗: " . mysqli_error($conn) . "</div>";
            }
        }

        // 刪除材料
        if (isset($_POST['delete_ingredient'])) {
            $ingredient_id = $_POST['ingredient_id'];
            $delete_sql = "DELETE FROM ingredients WHERE ingredient_id = $ingredient_id";
            if (mysqli_query($conn, $delete_sql)) {
                echo "<div class='alert alert-success'>材料刪除成功</div>";
            } else {
                echo "<div class='alert alert-danger'>刪除失敗: " . mysqli_error($conn) . "</div>";
            }
        }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>使用者介面</title>
    <link rel="shortcut icon" href="images/Cookicon.png" type="image/x-icon">
    <!-- 引入 Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<!-- 導覽列 -->
<section class="menu menu2">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="images/Cookicon.png" alt="Logo" style="height: 4.3rem;">
                食譜
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">分類檢索</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ingredient.php">食材庫存</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="btn btn-primary" href="user.php">個人帳戶</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</section>

<section data-bs-version="5.1" class="list03 cid-utFOYEnw9D" id="list03-8">
    <div class="container mt-5">
        <h1 class="text-center mb-4">食譜管理介面</h1>

        <!-- 標籤選單 -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link " id="add-recipe-tab" data-bs-toggle="tab" data-bs-target="#add-recipe" type="button" role="tab" aria-controls="add-recipe" aria-selected="true">新增 / 刪除食譜</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="add-ingredient-tab" data-bs-toggle="tab" data-bs-target="#add-ingredient" type="button" role="tab" aria-controls="add-ingredient" aria-selected="false">新增 / 刪除材料</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="available-recipes-tab" data-bs-toggle="tab" data-bs-target="#available-recipes" type="button" role="tab" aria-controls="available-recipes" aria-selected="false">可製作食譜</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <!-- 可製作食譜 -->
            <div class="tab-pane fade show active" id="available-recipes" role="tabpanel" aria-labelledby="available-recipes-tab">
                <h3>可製作的食譜</h3>
                <?php
                $recipe_sql = "
                    SELECT r.recipe_id, r.name 
                    FROM recipes r 
                    JOIN recipe_details rd ON r.recipe_id = rd.recipe_id 
                    JOIN ingredients i ON rd.ingredient = i.name 
                    WHERE i.quantity >= rd.quantity
                    GROUP BY r.recipe_id 
                    HAVING COUNT(DISTINCT rd.ingredient) = 
                    (SELECT COUNT(*) FROM recipe_details WHERE recipe_details.recipe_id = r.recipe_id)
                ";

                $recipe_result = mysqli_query($conn, $recipe_sql);

                if (mysqli_num_rows($recipe_result) > 0) {
                    echo "<ul class='list-group'>";
                    while ($recipe = mysqli_fetch_assoc($recipe_result)) {
                        echo "<li class='list-group-item'>{$recipe['name']}</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p class='text-muted'>目前沒有足夠的食材製作任何食譜。</p>";
                }
                ?>
            </div>
        </div>
    </div>

    <script>
        let ingredientIndex = 1;
        function addIngredient() {
            const ingredientDiv = document.createElement("div");
            ingredientDiv.classList.add("ingredient", "mb-3");
            ingredientDiv.innerHTML = `
                <input type="text" class="form-control mb-2" name="ingredients[${ingredientIndex}][name]" placeholder="材料名稱" required>
                <input type="number" step="0.01" class="form-control mb-2" name="ingredients[${ingredientIndex}][quantity]" placeholder="數量" required>
                <input type="text" class="form-control mb-2" name="ingredients[${ingredientIndex}][unit]" placeholder="單位" required>
            `;
            document.getElementById("ingredients").appendChild(ingredientDiv);
            ingredientIndex++;
        }
    </script>
</section>
<!-- 引入 Popper.js 和 Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 

</body>
</html>
<?php
// 關閉資料庫連接
mysqli_close($conn);
?>
