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
            <p>這是標籤 1 的內容。</p>
        </div>
        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
            <p>這是標籤 2 的內容。</p>
        </div>
        <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
            <p>這是標籤 3 的內容。</p>
        </div>
    </div>
</div>

<!-- 引入 Popper.js 和 Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
