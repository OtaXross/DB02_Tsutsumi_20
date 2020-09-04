var w = $(window).width();
var item_w = $(".item").width();
var t =$(".item").css("width");
console.log(t);
$(function(){
    $(window).resize(function(){
        if(w < 860){
            $(".item").css("width", "100%");
            console.log(w);
            t =$(".item").css("width");
        }else if(w >= 860){
            $(".item").css("width", "50%");
            console.log(t);
        }
    });
})