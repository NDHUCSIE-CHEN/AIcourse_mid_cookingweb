<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>使用者介面</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">食譜管理介面</h1>
        
        <?php
        // 連接資料庫
        require "database/config.php";

        $conn = mysqli_init();
        mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
        if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
            die('Failed to connect to MySQL: ' . mysqli_connect_error());
        }

        // 新增食譜
        if (isset($_POST['add_recipe'])) {
            $recipe_name = $_POST['recipe_name'];
            $sql = "INSERT INTO recipes (name) VALUES ('$recipe_name')";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>食譜新增成功</div>";
            } else {
                echo "<div class='alert alert-danger'>新增失敗: " . mysqli_error($conn) . "</div>";
            }
        }

        // 刪除食譜
        if (isset($_POST['delete_recipe'])) {
            $recipe_id = $_POST['recipe_id'];
            $sql = "DELETE FROM recipes WHERE recipe_id = $recipe_id";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>食譜刪除成功</div>";
            } else {
                echo "<div class='alert alert-danger'>刪除失敗: " . mysqli_error($conn) . "</div>";
            }
        }

        // 新增材料
        if (isset($_POST['add_ingredient'])) {
            $ingredient_name = $_POST['ingredient_name'];
            $sql = "INSERT INTO ingredients (name) VALUES ('$ingredient_name')";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>材料新增成功</div>";
            } else {
                echo "<div class='alert alert-danger'>新增失敗: " . mysqli_error($conn) . "</div>";
            }
        }

        // 刪除材料
        if (isset($_POST['delete_ingredient'])) {
            $ingredient_id = $_POST['ingredient_id'];
            $sql = "DELETE FROM ingredients WHERE ingredient_id = $ingredient_id";
            if (mysqli_query($conn, $sql)) {
                echo "<div class='alert alert-success'>材料刪除成功</div>";
            } else {
                echo "<div class='alert alert-danger'>刪除失敗: " . mysqli_error($conn) . "</div>";
            }
        }
        ?>

        <!-- 標籤選單 -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="add-delete-recipe-tab" data-bs-toggle="tab" data-bs-target="#add-delete-recipe" type="button" role="tab" aria-controls="add-delete-recipe" aria-selected="true">新增 / 刪除食譜</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="add-delete-ingredient-tab" data-bs-toggle="tab" data-bs-target="#add-delete-ingredient" type="button" role="tab" aria-controls="add-delete-ingredient" aria-selected="false">新增 / 刪除材料</button>
            </li>
        </ul>
        
        <div class="tab-content mt-4" id="myTabContent">
            
            <!-- 新增 / 刪除食譜 -->
            <div class="tab-pane fade" id="add-delete-recipe" role="tabpanel" aria-labelledby="add-delete-recipe-tab">
                <h3>新增食譜</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="recipeName" class="form-label">食譜名稱</label>
                        <input type="text" class="form-control" name="recipe_name" id="recipeName" required>
                    </div>
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
                            // 從資料庫中獲取食譜
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
            
            <!-- 新增 / 刪除材料 -->
            <div class="tab-pane fade show active" id="add-delete-ingredient" role="tabpanel" aria-labelledby="add-delete-ingredient-tab">
                <h3>新增材料</h3>
                <form method="POST">
                    <div class="mb-3">
                        <label for="ingredientName" class="form-label">材料名稱</label>
                        <input type="text" class="form-control" name="ingredient_name" id="ingredientName" required>
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
                            // 從資料庫中獲取材料
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
            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
mysqli_close($conn);
?>
