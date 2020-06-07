<?php
    //1.  DB接続
    try {
        $pdo = new PDO('mysql:dbname=db02_project1;charset=utf8;host=localhost','root','');
        } catch (PDOException $e) {
         exit('データベースに接続できませんでした。'.$e->getMessage());
        };
    //　delete.jsから渡されたidを取得。 
    $target_id =$_GET["id"];
    // データ削除SQL
    $stmt = $pdo->prepare("DELETE FROM add_item WHERE ID = ${target_id}");
    $status = $stmt->execute();
    // 商品確認ページに戻る。戻ってきたことを識別するためにパラメータ付与
    header("Location:./uploaded.php?deleted=true");
?>