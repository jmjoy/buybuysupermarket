$(function() {

    // 点击LOGO图片等于点击文件选择
    $("#editPicImg").click(function() {
        $("#editPicInput").click();
    });

    $("#editPicInput").bind("change", function() {
        if (!this.files.length) {
            $(this).val("");
            alert("请选择图片");
            return showErr("请选择图片");
        }

        var file = this.files[0];
        var mimeTypes = [
            'image/jpeg',
            'image/png',
            'image/nbmp',
            'application/x-MS-bmp',
            'image/vnd.wap.wbmp'
        ];
        if ($.inArray(file.type, mimeTypes) == -1) {
            $(this).val("");
            alert("不支持的图片格式或不是图片");
            return showErr("不支持的图片格式或不是图片");
        }
        if (file.size > 2*1024*1024) {
            $(this).val("");
            alert("图片不能大于2M");
            return showErr("图片不能大于2M");
        }

        var src = URL.createObjectURL(this.files[0]);
        $("#editPicImg").attr("src", src);
    });

    // 上传表单
    $("#editForm").submit(function() {
        // 获取要上传的东西
        var id = $("#editIdInput").val();
        var name = $.trim($("#editNameInput").val());
        var remark = $.trim($("#editRemarkInput").val());
        var files = document.getElementById("editPicInput").files;

        // 校验
        if (!name) {
            return showErr('请填写分类名');
        }
        // 新增分类才必须添加logo图片
        if (!id) {
            if (!files.length) {
                return showErr('请上传分类LOGO图片');
            }
        }

        // 组装上传数据
        var formData = new FormData();
        formData.append('name', name);
        formData.append('remark', remark);
        if (files.length) {
            formData.append('logo', files[0]);
        }

        var submitBtn = $(this).find("[type=submit]");
        submitBtn.attr("disabled", "disabled");
        submitBtn.html("提交中。。。");

        // ajax上传表单
        $.ajax({
            url: g.editOneLevelCategoryUrl,
            type: 'POST',
            data: formData,
            cache: false,
            dataType: 'json',
            processData: false, // Don't process the files
            contentType: false, // Set content type to false as jQuery will tell the server its a query string request
            success: function(data, textStatus, jqXHR) {
                console.log(data);

                // 恢复被禁用
                submitBtn.removeAttr("disabled");
                submitBtn.html("完成");

                // 不成功
                if (data.status != 200) {
                    return showErr(data.msg);
                }

                // 成功了
                showSuccess("操作成功");
                $("input,textarea").val("");
                $("#editPicImg").attr("src", g.defaultFrameIcon);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                // 恢复被禁用
                submitBtn.removeAttr("disabled");
                submitBtn.html("完成");
                alert("上传错误，请刷新浏览器后再重试 " + textStatus);
                console.log("upload error", errorThrown);
            }
        });

        // 禁止submit跳转
        return false;
    });

    // 隐藏报错信息
    // $("input,textarea").focus(function() {
    //     $("#errPanel").addClass("hidden");
    // });

});

/**
 * 展示错误
 */
function showErr(msg) {
    var $errPanel = $("#errPanel");
    $errPanel.removeClass("alert-success");
    $errPanel.addClass("alert-danger");
    $errPanel.html(msg);
    $errPanel.removeClass("hidden");

    return false;
}

/**
 * 展示成功
 */
function showSuccess(msg) {
    var $errPanel = $("#errPanel");
    $errPanel.removeClass("alert-danger");
    $errPanel.addClass("alert-success");
    $errPanel.html(msg);
    $errPanel.removeClass("hidden");

    return false;
}
