window.onload = function() {
	// 载入个人中心主要内容
	var url = args.url.replace(/REPLACE/, args.mod);
	$.get(url, function(data){
		$("#main").html(data);
	});
}