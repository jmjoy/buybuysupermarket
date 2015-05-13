$(function() {

    // 登陆请求
    $("#signInBtn").bind("click", handleSignIn);

});

function handleSignIn() {
    // 获取输入的参数
    var phone = $.trim($("#phoneInput").val());
    var password = $("#passwordInput").val();
    var autoSignIn = $("#autoSignInInput").is(":checked");

    // 检测
    var phoneReg = /^1\d{10}$/;
    var passwordReg = /^.{6,32}$/;

    if (!phoneReg.test(phone)) {
        return showErr("手机号码不正确");
    }

    if (!passwordReg.test(password)) {
        return showErr("密码不正确");
    }

    // 联网检验
    var signInBtn = $("signInBtn");
    signInBtn.unbind("click", handleSignIn);
    signInBtn.html("登陆中。。。");

    // 组装上传参数
    var args = {
        "phone":        phone,
        "password":     password,
        "autoSignIn":   autoSignIn
    };

    $.post(g.signInUrl, args, function(data) {
        // 登录失败
        if (data.status != 200) {
            SignInBtn.bind("click", handleSignIn);
            signInBtn.html("登陆");
            return alert(data.msg);
        }

        // 登陆成功，刷新
        location = location.href;

    }, "json");

}
