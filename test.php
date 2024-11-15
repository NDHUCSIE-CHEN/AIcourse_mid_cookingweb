<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>標籤切換測試</title>
    <!-- 引入 Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">標籤切換測試</h1>

    <h1 class="text-center mb-4">食譜管理介面</h1>

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

    <!-- 標籤選單 -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">標籤 1</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false">標籤 2</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="tab3-tab" data-bs-toggle="tab" data-bs-target="#tab3" type="button" role="tab" aria-controls="tab3" aria-selected="false">標籤 3</button>
        </li>
    </ul>

    <!-- 標籤內容 -->
    <div class="tab-content mt-4" id="myTabContent">
        <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
            <h3>新增食譜</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="recipeName" class="form-label">食譜名稱</label>
                        <input type="text" class="form-control" name="recipe_name" id="recipeName" required>
                    </div>
                    <div id="ingredients">
                        <h4>食材</h4>
                        <div class="ingredient mb-3">
                            <input type="text" class="form-control mb-2" name="ingredients[0][name]" placeholder="材料名稱" required>
                            <input type="number" step="0.01" class="form-control mb-2" name="ingredients[0][quantity]" placeholder="數量" required>
                            <input type="text" class="form-control mb-2" name="ingredients[0][unit]" placeholder="單位" required>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary mb-3" onclick="addIngredient()">添加食材</button>
                    <button type="submit" name="add_recipe" class="btn btn-primary">新增食譜</button>
                </form>

                <hr class="my-4">
                
                <h3>刪除食譜</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="recipeSelect" class="form-label">選擇要刪除的食譜</label>
                        <select class="form-select" name="recipe_id" id="recipeSelect" required>
                            <option selected disabled>選擇食譜...</option>
                            <?php
                            $recipe_result = mysqli_query($conn, "SELECT recipe_id, name FROM recipes");
                            while ($recipe = mysqli_fetch_assoc($recipe_result)) {
                                echo "<option value='{$recipe['recipe_id']}'>{$recipe['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="delete_recipe" class="btn btn-danger">刪除食譜</button>
                </form>
        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <h3>新增材料</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="ingredientName" class="form-label">材料名稱</label>
                        <input type="text" class="form-control" name="ingredient_name" id="ingredientName" required>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">數量</label>
                        <input type="number" step="0.01" class="form-control" name="quantity" id="quantity" required>
                    </div>
                    <div class="mb-3">
                        <label for="unit" class="form-label">單位</label>
                        <input type="text" class="form-control" name="unit" id="unit" required>
                    </div>
                    <button type="submit" name="add_ingredient" class="btn btn-primary">新增材料</button>
                </form>

                <hr class="my-4">

                <h3>刪除材料</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="ingredientSelect" class="form-label">選擇要刪除的材料</label>
                        <select class="form-select" name="ingredient_id" id="ingredientSelect" required>
                            <option selected disabled>選擇材料...</option>
                            <?php
                            $ingredient_result = mysqli_query($conn, "SELECT ingredient_id, name FROM ingredients");
                            while ($ingredient = mysqli_fetch_assoc($ingredient_result)) {
                                echo "<option value='{$ingredient['ingredient_id']}'>{$ingredient['name']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" name="delete_ingredient" class="btn btn-danger">刪除材料</button>
                </form>
        </div>
        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
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

<!-- 引入 Popper.js 和 Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
