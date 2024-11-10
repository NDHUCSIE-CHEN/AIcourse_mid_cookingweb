<!DOCTYPE html>
<html >
<head>
<style>
  body{
  background-image: url("images/_2865eef2-ab2f-4285-b32b-7d9d9178836e.jpg");
  background-size: cover;
  }
</style>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="images/Cookicon.png" type="image/x-icon">
  <meta name="description" content="探索簡單的食譜，讓烹飪變得輕鬆有趣！無論是新手還是專業廚師，這裡都有適合你的食譜。">
  <title>個人帳戶</title>
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

<section data-bs-version="5.1" class="tabs content18 cid-utFNhZgaKF" id="tabs1-4">
<div class="container mt-5">
        <h1 class="text-center mb-4">食譜管理介面</h1>
        
        <!-- 標籤選單 -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="add-delete-recipe-tab" data-bs-toggle="tab" data-bs-target="#add-delete-recipe" type="button" role="tab" aria-controls="add-delete-recipe" aria-selected="true">新增 / 刪除食譜</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="add-delete-ingredient-tab" data-bs-toggle="tab" data-bs-target="#add-delete-ingredient" type="button" role="tab" aria-controls="add-delete-ingredient" aria-selected="false">新增 / 刪除材料</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="check-recipes-tab" data-bs-toggle="tab" data-bs-target="#check-recipes" type="button" role="tab" aria-controls="check-recipes" aria-selected="false">確認可製作食譜</button>
            </li>
        </ul>
        
        <div class="tab-content mt-4" id="myTabContent">
            
            <!-- 新增 / 刪除食譜 -->
            <div class="tab-pane fade show active" id="add-delete-recipe" role="tabpanel" aria-labelledby="add-delete-recipe-tab">
                <h3>新增食譜</h3>
                <form>
                    <div class="mb-3">
                        <label for="recipeName" class="form-label">食譜名稱</label>
                        <input type="text" class="form-control" id="recipeName" placeholder="輸入食譜名稱">
                    </div>
                    <button type="submit" class="btn btn-primary">新增食譜</button>
                </form>
                
                <hr class="my-4">
                
                <h3>刪除食譜</h3>
                <form>
                    <div class="mb-3">
                        <label for="recipeSelect" class="form-label">選擇要刪除的食譜</label>
                        <select class="form-select" id="recipeSelect">
                            <option selected>選擇食譜...</option>
                            <option value="1">食譜 1</option>
                            <option value="2">食譜 2</option>
                            <option value="3">食譜 3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">刪除食譜</button>
                </form>
            </div>
            
            <!-- 新增 / 刪除材料 -->
            <div class="tab-pane fade" id="add-delete-ingredient" role="tabpanel" aria-labelledby="add-delete-ingredient-tab">
                <h3>新增材料</h3>
                <form>
                    <div class="mb-3">
                        <label for="ingredientName" class="form-label">材料名稱</label>
                        <input type="text" class="form-control" id="ingredientName" placeholder="輸入材料名稱">
                    </div>
                    <button type="submit" class="btn btn-primary">新增材料</button>
                </form>
                
                <hr class="my-4">
                
                <h3>刪除材料</h3>
                <form>
                    <div class="mb-3">
                        <label for="ingredientSelect" class="form-label">選擇要刪除的材料</label>
                        <select class="form-select" id="ingredientSelect">
                            <option selected>選擇材料...</option>
                            <option value="1">材料 1</option>
                            <option value="2">材料 2</option>
                            <option value="3">材料 3</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-danger">刪除材料</button>
                </form>
            </div>
            
            <!-- 確認可製作食譜 -->
            <div class="tab-pane fade" id="check-recipes" role="tabpanel" aria-labelledby="check-recipes-tab">
                <h3>可製作的食譜</h3>
                <p>根據庫存的材料，以下是您目前可以製作的食譜：</p>
                <ul class="list-group">
                    <li class="list-group-item">食譜 1</li>
                    <li class="list-group-item">食譜 2</li>
                    <li class="list-group-item">食譜 3</li>
                </ul>
            </div>
            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
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
