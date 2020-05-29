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
            //1.  DB接続します xxxにDB名を入れます
            try {
                // mampの場合は注意です！違います！別途後ほど確認します！
                $pdo = new PDO('mysql:dbname=db02_project1;charset=utf8;host=localhost','root','');
                } catch (PDOException $e) {
                exit('データベースに接続できませんでした。'.$e->getMessage());
                };
    //２．データ登録SQL作成
    //作ったテーブル名を書く場所  xxxにテーブル名を入れます
    $stmt = $pdo->prepare("SELECT * FROM add_item");
    $status = $stmt->execute();
            $view="";
            if($status==false){
              //execute（SQL実行時にエラーがある場合）
              $error = $stmt->errorInfo();
              exit("ErrorQuery:".$error[2]);
            }else{
              //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
              while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $view .= "<p>".$result["name"]."</p>";
              };
              echo $view;
            }
            ?>
        </div>
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