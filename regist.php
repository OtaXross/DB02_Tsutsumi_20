<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
    <link rel="stylesheet" href="css/regist.css">
</head>
<body>
    <header>
     <h1>商品を登録する</h1>
    </header>
    <main>
    <form action="" method="post">
        <dt>
            <label for="name">商品名</label>
            <input type="text" name="name" id="name">
        </dt>
        <dt>
            <label for="image">商品の画像</label>
            <input type="file" name="image" id="image">
        </dt>
        <dt>
         <label for="desc">商品説明</label>
         <textarea name="desc" id="desc" cols="30" rows="10"></textarea>            
        </dt>
        <dt>
            <label for="price">価格</label>
            <input type="number" name="price" id="price" max="1000000">
        </dt>
        <dt>
            <label for="count">在庫</label>
            <input type="number" name="count" id="count" max="1000">
        </dt>
        <dt>
            <p class="submit-button"><input type="submit" value="登録"></p>
        </dt>
     </form>
    </main>
    <footer>
    </footer>
</body>
</html>