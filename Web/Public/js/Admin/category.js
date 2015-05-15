$(function() {

    // 点击LOGO图片等于点击文件选择
    $("#editPicImg").click(function() {
        $("#editPicInput").click();
    });

    $("#editPicInput").bind("change", function() {
        console.log("hello world");
    });

    // 上传表单
    $("#editForm").submit(function() {
        // 获取要上传的东西
        var name = $.trim($("#editNameInput").val());
        var remark = $.trim($("#editRemarkInput").val());
        var files = document.getElementById("editPicInput").files;

        // 校验
        if (!name) {
            return showErr('请填写分类名');
        }

        // TODO

        var formData = new FormData();

        var submitBtn = $(this).find("[type=submit]");
        submitBtn.attr("disabled", "disabled");
        submitBtn.html("提交中。。。");


        submitBtn.removeAttr("disabled");
        submitBtn.html("完成");

        // 禁止submit跳转
        return false;
    });


    $("input").focus(function() {

    });

});

/**
 * 展示错误
 */
function showErr(msg) {
    var $errPanel = $("#errPanel");
    $errPanel.html(msg);
    $errPanel.removeClass("hidden");

    return false;
}
