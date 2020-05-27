<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品登録</title>
</head>
<body>
    <header>
     <h1>商品を登録する</h1>
    </header>
    <main>
    <form>
     <label for="name">商品名</label>
     <input type="text" name="name" id="name">
     <label for="image">商品の画像</label>
     <input type="file" name="image" id="image">
     <label for="desc">商品説明</label>
     <textarea name="desc" id="desc" cols="30" rows="10"></textarea>
     <label for="price">価格</label>
     <input type="text" name="price" id="price">
     <label for="count">在庫</label>
     <input type="text" name="count" id="count">
     </form>
    </main>
    <footer>
    </footer>
</body>
</html>