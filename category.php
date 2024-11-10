<!DOCTYPE html>
<html >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <style>
  body{
  background-image: url("images/_2865eef2-ab2f-4285-b32b-7d9d9178836e.jpg");
  background-size: cover;
  }
  </style>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="description" content="">
  <title>食譜分類檢索</title>
  <link rel="shortcut icon" href="images/Cookicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/web/assets/mobirise-icons2/mobirise2.css?rnd=1731185557076">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/bootstrap/css/bootstrap.min.css?rnd=1731185557076">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/bootstrap/css/bootstrap-grid.min.css?rnd=1731185557076">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/bootstrap/css/bootstrap-reboot.min.css?rnd=1731185557076">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/parallax/jarallax.css?rnd=1731185557076">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/dropdown/css/style.css?rnd=1731185557076">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/socicon/css/styles.css?rnd=1731185557076">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/theme/css/style.css?rnd=1731185557076">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/recaptcha.css?rnd=1731185557076">
  
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/css/mbr-additional.css?rnd=1731185557076" type="text/css">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/web/assets/mobirise-icons2/mobirise2.css?rnd=1731193637664">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/bootstrap/css/bootstrap.min.css?rnd=1731193637664">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/bootstrap/css/bootstrap-grid.min.css?rnd=1731193637664">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/bootstrap/css/bootstrap-reboot.min.css?rnd=1731193637664">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/dropdown/css/style.css?rnd=1731193637664">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/socicon/css/styles.css?rnd=1731193637664">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/theme/css/style.css?rnd=1731193637664">
  <link rel="stylesheet" href="https://r.mobirisesite.com/882873/assets/css/mbr-additional.css?rnd=1731193637664" type="text/css">
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Source+Serif+4:wght@400;700&display=swap&display=swap"></noscript>
  <link rel="stylesheet" href="CSS/mobirise_web.css" type="text/css">
  
  
  
  


<style>
	/* 設置背景圖片 */
.background-section {
    background-image: url('images/_2865eef2-ab2f-4285-b32b-7d9d9178836e.jpg'); /* 替換為您的圖片路徑 */
    background-size: cover; /* 確保圖片在各種設備上填滿容器 */
    background-position: center; /* 圖片在容器中居中顯示 */
    background-repeat: no-repeat; /* 防止背景圖片重複 */
    height: 100vh; /* 使區域高度佔滿瀏覽器視窗 */
    display: flex;
    align-items: center;
    justify-content: center;
    color: white; /* 設置內容文字顏色 */
}

/* 將內容設置為自適應 */
.background-section .content {
    padding: 20px;
    max-width: 800px; /* 避免內容過寬 */
    text-align: center; /* 文字居中 */
    background: rgba(0, 0, 0, 0.5); /* 添加半透明背景，增強文字可讀性 */
    border-radius: 10px;
}
.navbar-fixed-top {
  top: auto;
}
#mobiriseBanner.container-banner {
  height: 8rem;
  opacity: 1;
  -webkit-animation: 4s linear animationHeight;
  -moz-animation: 4s linear animationHeight;
    -o-animation: 4s linear animationHeight;
       animation: 4s linear animationHeight;
       transition: all  0.5s;
}
#mobiriseBanner.container-banner.container-banner-closing {
  pointer-events: none;
  height: 0;
  opacity: 0;
  -webkit-animation: 0.5s linear animationClosing;
  -moz-animation:  0.5s linear animationClosing;
    -o-animation:  0.5s linear animationClosing;
       animation:  0.5s linear animationClosing;
}
#mobiriseBanner .banner {
  min-height: 8rem;
  position:fixed;
  top: 0;
  left: 0;
  right: 0;
  background: #fff;
  padding: 10px;
  opacity:1;
  -webkit-animation: 4s linear animationBanner;
  -moz-animation: 4s linear animationBanner;
    -o-animation: 4s linear animationBanner;
       animation: 4s linear animationBanner;
  z-index: 1031;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
#mobiriseBanner .banner p {
  overflow: hidden;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  animation: none;
  visibility: visible;
}
#mobiriseBanner .buy-license {
  text-decoration: underline;
}
#mobiriseBanner .banner .btn {
  margin: 0.3rem 0.5rem;
  animation: none;
  visibility: visible;
}
.navbar.opened {
    z-index: 1032;
}
@-webkit-keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 75% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
@-moz-keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 75% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
@-o-keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 75% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
   @keyframes animationBanner { 0% { opacity: 0; top: -8rem; } 75% { opacity: 0; top: -8rem; } 100% { opacity: 1; top: 0; } }
@-webkit-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 8rem; } }
@-moz-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 8rem; } }
@-o-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 8rem; } }
   @keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 8rem; } }
   
@-webkit-keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
@-moz-keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
@-o-keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
@keyframes animationClosing { 0% { height: 8rem; opacity: 1; } 30% { height: 8rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }

@media(max-width: 767px) {
  #mobiriseBanner.container-banner {
    height: 12rem;
  }
  #mobiriseBanner .banner {
    min-height: 12rem;
  }
  @-webkit-keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 75% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
  @-moz-keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 75% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
  @-o-keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 75% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
    @keyframes animationBanner { 0% { opacity: 0; top: -12rem; } 75% { opacity: 0; top: -12rem; } 100% { opacity: 1; top: 0; } }
  @-webkit-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 12rem; } }
  @-moz-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 12rem; } }
  @-o-keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 12rem; } }
    @keyframes animationHeight { 0% { height: 0; } 75% { height: 0; } 100% { height: 12rem; } }

  @-webkit-keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
  @-moz-keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
  @-o-keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
  @keyframes animationClosing { 0% { height: 12rem; opacity: 1; } 30% { height: 12rem; opacity: 0.5;} 100% { height: 0; opacity: 0;} }
}
</style>
</head>
<body>
 <section class="background-section">

<!--導覽列-->
<section data-bs-version="5.1" class="menu menu2 cid-utFk60XNeX" once="menu" id="menu-5-utFk60XNeX">
	<nav class="navbar navbar-dropdown navbar-fixed-top navbar-expand-lg">
		<div class="container">
			<div class="navbar-brand">
				<span class="navbar-logo">
					<a href="index.php">
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


<!--category.php-->
<section data-bs-version="5.1" class="tabs content18 cid-utFNhZgaKF" id="tabs1-4">
<?php
require "database/config.php";
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}

// 查詢所有食譜資料
$sql = "SELECT recipe_id, name, description, category FROM recipes";
$result = $conn->query($sql);

$recipes = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $recipes[] = $row;
    }
}
$conn->close();
?>

<div class="container">
    <div class="row justify-content-center mb-5">
        <span class="blank" style="height: 50px;"></span> 
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-md-8">
            <div class="item-wrapper">
                <ul class="nav nav-tabs mb-4" role="tablist">
                    <li class="nav-item first mbr-fonts-style">
                        <a class="nav-link display-7 active" role="tab" onclick="filterRecipes('all', this)" href="#">
                            <strong>所有</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link display-7" role="tab" onclick="filterRecipes('早餐', this)" href="#">
                            <strong>早餐</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link display-7" role="tab" onclick="filterRecipes('午餐', this)" href="#">
                            <strong>午餐</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link display-7" role="tab" onclick="filterRecipes('晚餐', this)" href="#">
                            <strong>晚餐</strong>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link display-7" role="tab" onclick="filterRecipes('甜點與點心', this)" href="#">
                            <strong>點心</strong>
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="recipe-content">
                    <?php foreach ($recipes as $recipe): ?>
                        <div class="recipe-item" data-category="<?php echo htmlspecialchars($recipe['category']); ?>">
                            <h5><strong>
                                <a color="#888" href="recipe.php?id=<?php echo $recipe['recipe_id']; ?>">
                                    <?php echo htmlspecialchars($recipe['name']); ?>
                                </a>
                            </strong></h5>
                            <p><?php echo htmlspecialchars($recipe['description']); ?></p>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// JavaScript 來篩選顯示食譜並更新選定標籤的樣式
function filterRecipes(category, element) {
    let recipes = document.querySelectorAll('.recipe-item');
    recipes.forEach(function(recipe) {
        if (category === 'all' || recipe.getAttribute('data-category') === category) {
            recipe.style.display = 'block';
        } else {
            recipe.style.display = 'none';
        }
    });

    // 移除其他標籤的 active 樣式，並為當前標籤添加 active 樣式
    let tabs = document.querySelectorAll('.nav-link');
    tabs.forEach(function(tab) {
        tab.classList.remove('active');
    });
    element.classList.add('active');
}
</script>

<style>
/* 底色樣式 */
.nav-link.active {
    background-color: #007bff;
    color: #fff !important;
}
</style>
</section>


<!--頁尾-->
<section data-bs-version="5.1" class="footer3 cid-utFk6130Mz" once="footers" id="footer-6-utFk6130Mz">  
    <div class="container">
        <div class="row">            
            <div class="col-12 mt-4">
                <p class="mbr-fonts-style copyright display-7">© 2024 食譜網站. 拜託網站跑起來.</p>
            </div>
        </div>
    </div>
</section>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
  
  
  

</body>
</html>
