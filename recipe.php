<?php
// 檢查是否傳遞了 id 參數
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $recipe_id = $_GET['id'];
    
    require "database/config.php";
    //include 'database/project.php';
    //include 'database/recipe_details.php';
	
    $conn = mysqli_init();
    mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
    if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
        die('Failed to connect to MySQL: ' . mysqli_connect_error());
    }
    // 查詢食譜的基本資訊
    $sql = "SELECT name, description FROM recipes WHERE recipe_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $recipe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $recipe = $result->fetch_assoc();
    } else {
        echo "找不到指定的食譜。";
        exit();
    }
    $stmt->close();

    // 查詢食譜的詳細資訊（食材和步驟）
    $sql_details = "SELECT ingredient, quantity, unit, step_number, step_description FROM recipe_details WHERE recipe_id = ? ORDER BY step_number";
    $stmt_details = $conn->prepare($sql_details);
    $stmt_details->bind_param("i", $recipe_id);
    $stmt_details->execute();
    $details_result = $stmt_details->get_result();

    // 儲存詳細資訊
    $ingredients = [];
    $steps = [];
    while ($row = $details_result->fetch_assoc()) {
        // 將每個食材加入到 $ingredients 陣列中
        $ingredients[] = [
            'ingredient' => $row['ingredient'],
            'quantity' => $row['quantity'],
            'unit' => $row['unit']
        ];
        // 將每個步驟加入到 $steps 陣列中
        $steps[] = [
            'step_number' => $row['step_number'],
            'step_description' => $row['step_description']
        ];
    }

    $stmt_details->close();
    $conn->close();
} else {
    echo "無效的食譜 ID。";
    exit();
}
?>

<!DOCTYPE html>
<html >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="description" content="探索簡單的食譜，讓烹飪變得輕鬆有趣！無論是新手還是專業廚師，這裡都有適合你的食譜。">
  <title><?php echo htmlspecialchars($recipe['name']); ?></title>
  <link rel="shortcut icon" href="images/Cookicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/web/assets/mobirise-icons2/mobirise2.css?rnd=1731193637761">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/bootstrap/css/bootstrap.min.css?rnd=1731193637761">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/bootstrap/css/bootstrap-grid.min.css?rnd=1731193637761">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/bootstrap/css/bootstrap-reboot.min.css?rnd=1731193637761">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/dropdown/css/style.css?rnd=1731193637761">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/socicon/css/styles.css?rnd=1731193637761">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/theme/css/style.css?rnd=1731193637761">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap"></noscript>
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/css/mbr-additional.css?rnd=1731193637761" type="text/css">
  <link rel="stylesheet" href="CSS/mobirise_web.css" type="text/css">

</head>
<body>

  <section data-bs-version="5.1" class="menu menu2 cid-utFk60XNeX" once="menu" id="menu-5-utFk60XNeX">
	

	<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
		<div class="container">
			<div class="navbar-brand">
				<span class="navbar-logo">
					<a href="#">
          <img src="images/Cookicon.png" alt="" style="height: 4.3rem;">
					</a>
				</span>
				<span class="navbar-caption-wrap"><a class="navbar-caption text-black display-4" href="index.php">食譜</a></span>
			</div>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarSupportedContent" data-bs-target="#navbarSupportedContent" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<div class="hamburger">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
					<li class="nav-item">
						<h4><a class="nav-link link text-black display-4" href="category.php">分類檢索</a></h4>
					</li>
					<li class="nav-item">
						<a class="nav-link link text-black display-4" href="ingredient.php" aria-expanded="false">食材庫存</a>
					</li>	
				</ul>
				
				<div class="navbar-buttons mbr-section-btn">
					<a class="btn btn-primary display-4" href="user.php">個人帳戶</a>
				</div>
			</div>
		</div>
	</nav>
</section>
	
<section data-bs-version="5.1" class="features38 cid-utFk611Cny" id="features-65-utFk611Cny">
    
<span class="blank" style="height: 200px;"></span>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center"><?php echo htmlspecialchars($recipe['name']); ?></h1>
            <p class="text-center"><?php echo htmlspecialchars($recipe['description']); ?></p>

            <h2 class="mt-4">食材</h2>
            <ul class="list-unstyled">
                <?php foreach ($ingredients as $ingredient): ?>
                    <li><?php echo htmlspecialchars($ingredient['ingredient']) . ': ' . htmlspecialchars($ingredient['quantity']) . ' ' . htmlspecialchars($ingredient['unit']); ?></li>
                <?php endforeach; ?>
            </ul>

            <h2 class="mt-4">步驟</h2>
            <ol>
                <?php foreach ($steps as $step): ?>
                    <li><?php echo htmlspecialchars($step['step_description']); ?></li>
                <?php endforeach; ?>
            </ol>
        </div>
    </div>
</div>
</section>

<section data-bs-version="5.1" class="footer3 cid-utFk6130Mz" once="footers" id="footer-6-utFk6130Mz">  
    <div class="container">
        <div class="row">            
            <div class="col-12 mt-4">
                <p class="mbr-fonts-style copyright display-7">© 2024 食譜網站. 拜託網站跑起來.</p>
            </div>
        </div>
    </div>
</section>


  <script src="https://r.mobirisesite.com/882873/assets/web/assets/jquery/jquery.min.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/bootstrap/js/bootstrap.bundle.min.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/parallax/jarallax.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/smoothscroll/smooth-scroll.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/ytplayer/index.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/dropdown/js/navbar-dropdown.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/vimeoplayer/player.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/mbr-switch-arrow/mbr-switch-arrow.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/scrollgallery/scroll-gallery.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/theme/js/script.js?rnd=1731185557076"></script>
  <script src="https://r.mobirisesite.com/882873/assets/formoid.min.js?rnd=1731185557076"></script>
  
  
  

</body>
</html>
