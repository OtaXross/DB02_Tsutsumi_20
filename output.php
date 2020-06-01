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
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $view="";
            $image="";
            if($status==false){
              //execute（SQL実行時にエラーがある場合）
              $error = $stmt->errorInfo();
              exit("ErrorQuery:".$error[2]);
            }else{
              //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
              while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
                $image .= "<p>".$result["image"]."</p>";
                $view .= "<p>".$result["name"]."</p>";
              };
            //   echo $view;    
            //   $DB_PIC = $row['image'];
              $finfo    = finfo_open(FILEINFO_MIME_TYPE);
              $mimeType = finfo_buffer($finfo, $DB_PIC);
              finfo_close($finfo);
              header('Content-Type: ' . $mimeType);
              echo $DB_PIC;
            };

            header('Content-type: image/png');
            // include './output.php';
            ?>