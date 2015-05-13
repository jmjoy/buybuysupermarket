$(function() {
    $("#submitBtn").click(function() {
        // 先禁用
        $("#submitBtn").attr("disabled", "disabled")
        $("#submitBtn").html("登陆中。。。")

        // 获取数据
        var args = {
            "name":		$("#name").val(),
            "password":	$("#password").val(),
        }

        // 校验
        if (args.name == "") {
            return showErr("管理员账号不能为空")
        }
        if (args.password == "") {
            return showErr("密码不能为空")
        }

        // 联网检验
        $.post("{:U('Api/AdminSign/postSignIn')}", args, function(data) {
            console.log(data)

            // 登陆失败
            if (data.status != 200) {
                return showErr(data.msg)
            }

            // 登陆成功
            localStorage.setItem("SESSID", data.sessId)
            localStorage.setItem("adminName", args.name)
            location = "{:U('Admin/main')}"

        }, "json")

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
}
