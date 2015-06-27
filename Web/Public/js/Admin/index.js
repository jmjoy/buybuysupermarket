$(function() {

    // 登录请求
    $("#signInform").submit(function() {
        // 获取数据
        var args = {
            "name":     $.trim($("#nameInput").val()),
            "password": $("#passwordInput").val(),
            "verify":   $.trim($("#verifyInput").val())
        };

        // 校验
        if (args.name == "") {
            return showErr("管理员账号不能为空");
        }
        if (args.password == "") {
            return showErr("密码不能为空");
        }
        if (args.verify == "") {
            return showErr("验证码不能为空");
        }
        if (args.verify.length != 4) {
            return showErr("验证码不正确");
        }

        // 先禁用
        var submitBtn = $(this).find("[type=submit]");
        submitBtn.attr("disabled");
        submitBtn.html("登陆中。。。");

        // 联网检验
        $.post(g.postSignInUrl, args, function(data) {
            console.log(data);

            // 恢复被禁用
            submitBtn.removeAttr("disabled");
            submitBtn.html("登陆到后台");

            // 登陆失败
            if (data.status != 200) {
                return showErr(data.msg);
            }

            // 登录成功，跳转
            location = g.manageUrl;

        }, "json")

        // 防止submit跳转
        return false;

    });

    // 点击验证码换一张
    $("#verifyImg").click(function() {
        this.src = this.src;
    });

    // 隐藏错误信息
    $("input").focus(function() {
        $("#errPanel").addClass("hidden");
    });

    // iframe自适应高度
    $(".full-iframe").load(function(){
        var mainheight = $(this).contents().find("body").height()+30;
        $(this).height(mainheight);
    });

});

/**
 * 显示错误
 */
function showErr(err) {
    $("#errPanel").html(err)
    $("#errPanel").removeClass("hidden")

    return false;
}
