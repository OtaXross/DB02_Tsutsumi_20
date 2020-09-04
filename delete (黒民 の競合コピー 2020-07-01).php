<?php
    //1.  DB接続します xxxにDB名を入れます
    try {
        // mampの場合は注意です！違います！別途後ほど確認します！
        $pdo = new PDO('mysql:dbname=db02_project1;charset=utf8;host=localhost','root','');
        } catch (PDOException $e) {
         exit('データベースに接続できませんでした。'.$e->getMessage());
        };
    $test =$_GET["id"];
    // echo $_GET["id"];
    // echo $test;
    $stmt = $pdo->prepare("DELETE FROM add_item WHERE ID = ${test}");
    $status = $stmt->execute();
    header("Location:./uploaded.php?deleted=true");
?>