$(function(){
    $(".edit-menu").on("click", function(){
        $(this).next("ul").slideToggle(100);
        $(this).next("ul").css("visibility", "visible");
    });
});

$(function(){
    $(document).on("click", function(e){
        if(!$(e.target).is(".menu,.edit-menu") && $(".edit-menu").next("ul").css("visibility", "hidden")){
            $(".edit-menu").next("ul").slideToggle(100);
            $(".edit-menu").next("ul").hide()
        };
    });
});