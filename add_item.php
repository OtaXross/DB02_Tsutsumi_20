<?php
//1. POSTデータ取得

//前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$name = $_POST["name"];
// $image = $_POST["image"];
$come = $_POST["desc"];
$cost = $_POST["price"];
$zaiko = $_POST["count"];
// rb = バイナリファイルの読み込み
$fp = fopen($_FILES['image']['tmp_name'], "rb");
$image = fread($fp, filesize($_FILES['image']['tmp_name']));
fclose($fp);
// echo $_FILES["name"];

//2. DB接続します xxxにDB名を入力する
//ここから作成したDBに接続をしてデータを登録します xxxxに作成したデータベース名を書きます
try {
  $pdo = new PDO('mysql:dbname=db02_project1;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
};

//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$stmt = $pdo->prepare("INSERT INTO add_item(ID, name, image, come, cost,
zaiko, add_date)VALUES(NULL, :name, :image, :come, :cost, :zaiko, sysdate())");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':image', $image);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':come', $come, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':cost', $cost, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':zaiko', $zaiko, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  $html = true;
  //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
//   header("Location: select.php");
  // exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
     if($html == true){
       echo '<strong>商品のアップロードが完了しました。</strong>';
     };
    //  exit;
    ?>
    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
    <script>
      setTimeout(function(){
        window.location.href = './regist.php';
      }, 1500);
      </script>
</body>
</html>
