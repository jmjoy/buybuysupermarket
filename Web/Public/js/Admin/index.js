$(function() {

    // 点击验证码换一张
    $("#verifyImg").click(function() {
        this.src = this.src;
    });

    // 登录请求
    $("#submitBtn").click(function() {
        // 先禁用
        $("#submitBtn").attr("disabled", "disabled");
        $("#submitBtn").html("登陆中。。。");

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

        // 联网检验
        $.post(g.postSignInUrl, args, function(data) {
            console.log(data);

            // 登陆失败
            if (data.status != 200) {
                return showErr(data.msg);
            }

            // 登录成功，跳转
            location = g.manageUrl;

        }, "json")

    });

    $("input").focus(function() {
        $("#errPanel").addClass("hidden");
    });

});

/**
 * 显示错误
 */
function showErr(err) {
    $("#errPanel").html(err)
    $("#errPanel").removeClass("hidden")

    // 恢复被禁用
    $("#submitBtn").removeAttr("disabled")
    $("#submitBtn").html("登陆到后台")

    return false;
}
