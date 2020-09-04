<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント設定</title>
    <link rel="stylesheet" href="css/regist.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header>
        <h1><a href="./index.php">Amazon（仮）</a></h1>
    </header>
    <main>
        <h1>アカウント設定</h1>
        <?php include("./back.php>");?>
        <form action="" method="post">
         <dt>
             <label for="co">企業名</label>
             <input type="text" name="co" id="co">
         </dt>           
         <dt>
             <label for="meado">メールアドレス</label>
             <input type="text" name="meado" id="meado">
         </dt>
         <dt>
             <label for="tel">電話番号</label>
             <input type="tel" name="tel" id="tel">
         </dt>
         <dt>
             <p class="submit-button">
                 <input type="submit" value="保存" id="save">
             </p>
         </dt>
        </form>
    </main>
</body>
</html>