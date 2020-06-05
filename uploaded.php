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
        <div class="items">
            <?php
            //1.  DB接続します xxxにDB名を入れます
            try {
                // mampの場合は注意です！違います！別途後ほど確認します！
                $pdo = new PDO('mysql:dbname=db02_project1;charset=utf8;host=localhost','root','');
                } catch (PDOException $e) {
                exit('データベースに接続できませんでした。'.$e->getMessage());
                };
    //２．データ登録SQL作成
    //作ったテーブル名を書く場所  xxxにテーブル名を入れます
    $stmt = $pdo->prepare("SELECT * FROM add_item WHERE id");
    $status = $stmt->execute();

            $view="";
            $gazou="";
            if($status==false){
              //execute（SQL実行時にエラーがある場合）
              $error = $stmt->errorInfo();
              exit("ErrorQuery:".$error[2]);
            }else{
              //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
              while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
                // DBから画像ファイル(bin)を取り出す
                $gazou = $result["image"];
                // 文字化けしてるやつを変換する
                $gazou2 = base64_encode($gazou);
                $price = $result["cost"];
                $view = "<p class='desc'>".$result["name"]."</p>";
                $comment = $result["come"];
                // 商品項目を出力
                // サムネ
                // 名前
                // 編集ボタン
                echo
                  '<div class="item">
                    <p class="thumb"><img src="data:image/png;base64,'.$gazou2.'"></p>
                    <p class="cost">￥'.$price.'</p>'
                    .$view
                    .$comment.
                      '<div class="edit-button">
                        <button class="edit-menu">編集</button>
                          <ul class="menu">
                            <li><a href="公開設定" id="option">公開設定</a></li>
                            <li><a href="削除">削除</a></li>
                          </ul>
                      </div>
                  </div>';
              };
            };        
            ?>
    </main>
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
  <script src="js/edit.js"></script>
</body>
</html>