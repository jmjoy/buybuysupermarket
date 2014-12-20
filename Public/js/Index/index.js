window.onload = function() {
	// 首页推荐(轮播)栏
	$('#recommend-tabs a').hover(function (e) {
	 	e.preventDefault()
	 	$(this).tab('show')
	});
	
}