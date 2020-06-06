// 1つ前に戻る
$(function(){
    $(".back-button").on("click", function(){
        history.back();
    })
})

// トップに戻る。使いたい時どぞー
// $(function(){
//     $(".back-button").on("click", function(){
//         location.href="./index.php"
//     })
// })