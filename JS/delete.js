// ポップアップ作成。
$(function(){
    $(".delete-button").on("click", function(){
        // delete-buttonのidを取得して、変数に代入
        let id = $(this).attr("id");
        console.log(id);
        $(".delete-message1").dialog({
            modal: true, //他の場所クリックできない
            title: "確認",
            draggable: true, //動かせる
            closeText:"", //右上の閉じるボタンのテキスト。デフォで背景に「×」が入ってるので空欄
            buttons: {
                "はい": function(){
                    $(this).dialog("close")
                    $(".delete-message2").dialog({
                        // はいを押すと2つ目のウィンドウが表示
                        modal: true,
                        title: "hontoni?",
                        draggable: true,
                        closeText:"",
                        buttons: {
                            // ボタン名：クリックアクション
                            "はい": function(){
                                $(this).dialog("close"),
                                $(".delete-message3").dialog({
                                    // はいを押すと3つ目のウィンドウが表示。
                                    modal: true,
                                    title: "最終警告",
                                    draggable: true,
                                    closeText:"",
                                    buttons: {
                                        "はい": function(){
                                            $(this).dialog("close"),
                                            // 削除用php実行。このとき、URLのパラメータとして、さきほど宣言したid変数を代入
                                            location.href="./delete.php?id="+id
                                        },
                                        "いいえ": function(){
                                            $(this).dialog("close")
                                        }
                                    }
                                })
                            },
                            "いいえ": function(){
                                $(this).dialog("close")
                            }
                        }
                    })
                },
                "いいえ": function(){
                    $(this).dialog("close")
                }
            }
        });
    });
    return false;
});

// 戻ってきたときに実行。削除が終わったことを通知。
$(function(){
    const param = location.search.slice(1);
    if(param == "deleted=true"){
        $(".delete-message4").dialog({
            modal: true,
            draggable: true,
            title: "完了",
            buttons: {
                "OK": function(){
                    $(this).dialog("close");
                    // 商品確認画面に戻る。パラメータはなし。
                    location.href="./uploaded.php"
                }
            },
        });
        $(".ui-dialog-titlebar-close").addClass("ui-button-icon ui-icon ui-icon-closethick")
        console.log(param);
        $(".ui-dialog-buttonset").css("margin", "0px 40%");
    }
});