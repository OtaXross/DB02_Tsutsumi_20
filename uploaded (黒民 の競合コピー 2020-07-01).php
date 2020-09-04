<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品確認</title>
    <link rel="stylesheet" href="CSS/reset.css">
    <link rel="stylesheet" href="CSS/dlsite.css">
    <!-- これはポップアップのCSS宣言。ネットのテンプレートを使用 -->
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css" rel="stylesheet" />
</head>
<body>
<header><h1><a href="./index.php">Amazon（仮）</a></h1></header>
    <main>
        <h1>商品確認</h1>
        <?php include("./back.php>");?>
        <div class="items">
          <?php
          //1.  DB接続
          try {
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
                $view = "<p class='name'>".$result["name"]."</p>";
                $comment = $result["come"];
                $id = $result["ID"];
                // 商品項目を出力
                // 1.サムネ
                // 2.名前
                // 3.お値段
                // 4.編集ボタン（アコーディオンメニュー）
                // 5.<script>タグは削除用スクリプト(WIP -> 多分いけてる)
                // 連結をなくした。${var}はテキストの中に変数の中身をぶち込むおまじない（変数展開）。
                // href=javascript:void(0)でジャンプしないように。
                echo
                  "<div class='item'>
                    <p class='thumb'><img src='data:image/png;base64,$gazou2'></p>
                    <dl class='details'>
                      <dt class='title'>$view</dt>
                      <dd class='cost'>${price}円</dd>
                      <dd class='desc'>$comment</dd>
                      <div class='edit-button'>
                          <button class='edit-menu'>編集</button>
                            <ul class='menu'>
                              <li><a href='javascript:void(0)' id='option'>公開設定</a></li>
                              <li><a href='javascript:void(0)' class='delete-button' id=$id>削除</a></li>
                            </ul>
                        </div>
                    </dl>
                  </div>";
              };
            };        
            ?>
            </div>
          <!-- ここから削除用ポップアップのメッセージ -->
          <div class="delete-message1" style="display: none;"><p>この商品データを削除しますか？</p></div>
          <div class="delete-message2" style="display: none;"><p>一度削除したデータは復元できません。<br>それでも削除しますか？</p></div>
          <div class="delete-message3" style="display: none;"><p>こうかいしませんね？</p></div>
          <div class="delete-message4" style="display: none;"><p>削除しました。</p></div>
          <!-- ここまで削除用ポップアップのメッセージ -->
      </main>
    <script
    src="https://code.jquery.com/jquery-3.5.1.js"
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
    crossorigin="anonymous"></script>
    <script
    src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
    integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
    crossorigin="anonymous"></script>
    <script src="js/edit.js"></script>
    <script src="js/delete.js"></script>
</body>
</html>