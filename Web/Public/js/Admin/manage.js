$(function() {

    // iframe自适应高度
    $(".full-iframe").load(function(){
        var mainheight = $(this).contents().find("body").height()+30;
        $(this).height(mainheight);
    });

});
