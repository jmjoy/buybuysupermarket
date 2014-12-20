// 保持登陆状态
window.setInterval(function(){
	$.get(url.keepLoginStatus, function(data){
		console.log(data);
	});
}, 1000000);
