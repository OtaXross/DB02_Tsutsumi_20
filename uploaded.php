<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品確認</title>
    <link rel="stylesheet" href="CSS/edit.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<header><h1><a href="./index.php">Amazon（仮）</a></h1></header>
    <main>
        <h1>商品確認</h1>
        <div>
            <!-- サムネイル -->
            <?php 
            include('./output.php');
            ?>
        <div>
            <button class="edit-menu">編集</button>
            <ul class="menu">
                <li><a href="公開設定" id="option">公開設定</a></li>
                <li><a href="削除">削除</a></li>
            </ul>
        </div>
    </main>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="JS/edit.js"></script>
</body>
</html>