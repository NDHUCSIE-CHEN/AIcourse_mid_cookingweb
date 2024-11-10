<?php
require "database/config.php";
include 'database/recipe_details.php';
$conn = mysqli_init();
mysqli_ssl_set($conn, NULL, NULL, $sslcert, NULL, NULL);
if (!mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306, MYSQLI_CLIENT_SSL)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
}
  date_default_timezone_set('Asia/Taipei');
  session_start();
  if (empty($_GET['recipe_id'])) {
    header('Location: index.php');
  }
  $recipe_id = $_GET['recipe_id'];
?>

<!DOCTYPE html>
<html >
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <meta name="description" content="探索簡單的食譜，讓烹飪變得輕鬆有趣！無論是新手還是專業廚師，這裡都有適合你的食譜。">
  <title>材料庫存</title>
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
						<h4><a class="nav-link link text-black display-4" href="category.php">分類</a></h4>
					</li>
					<li class="nav-item">
						<a class="nav-link link text-black display-4" href="ingredient.php" aria-expanded="false">庫存</a>
					</li>	
				</ul>
				
				<div class="navbar-buttons mbr-section-btn">
					<a class="btn btn-primary display-4" href="user.php">個人帳戶</a>
				</div>
			</div>
		</div>
	</nav>
</section>

  <?php
    $sql = "SELECT * FROM recipe_details WHERE id = '$recipe_id'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_row($result);
    if (empty($row)) {
        header('Location: index.php');
    }
    echo '<h1>'.$row[2].'</h1>';
    echo "<h2>材料：</h2>";
    echo nl2br($row[3])."<br>";
    echo "<h2>步驟：</h2>";
    echo nl2br($row[4])."<br>";
    echo "參考網址：";
    if($row[5]==NULL) echo '無';
    else echo '<a href="'. $row[5] .'">'.$row[5].'</a><br>';
  ?>

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
