<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo ($web_title); ?></title>
	<link rel="shortcut icon" href="/Public/img/favicon.ico" >
	
	<!-- Bootstrap -->
	<link href="/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	  <script src="http://cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="http://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" href="/Public/css/common.css" />
	<link rel="stylesheet" type="text/css" href="/Public/css/Index/index.css" />

	<script type="text/javascript" charset="utf-8">
		var url = {
			keepLoginStatus: "<?php echo U('Home/Index/keepLoginStatus');?>"
		};
	</script>
	
	<script type="text/javascript" src="/Public/js/common.js"></script>
	<script type="text/javascript" src="/Public/js/Index/index.js"></script>

</head>

<body>
	
	<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav">
      	
      	<?php if(false): ?><li><a href="javascript:void(0)" data-toggle="modal" data-target="#login-modal">登陆</a></li>
	        <li><a href="<?php echo U('Index/signUp');?>">注册</a></li>
			<!-- 登陆模拟框 -->
			<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			        <h3 class="modal-title" id="myModalLabel">登陆</h3>
			      </div>
			      <div class="modal-body">
				      <form class="form-signin" role="form" action="#" method="post">
				        <h5 class="form-signin-heading text-danger">用户名(或邮箱、手机)或密码错误</h5>
				        <input type="text" class="form-control" placeholder="用户名/邮箱/手机号" required autofocus>
				        <input type="password" class="form-control" placeholder="密码" required>
				        <div class="checkbox">
				          <label>
				            <input type="checkbox" value="remember-me"> 保持登陆状态十天
				          </label>
				        </div>
				        <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
				      </form>
			      </div>
			      <div class="modal-footer">
			      	其他登陆方式
			      	<a class="icon-link" href=""><img src="/Public/img/weibo.png" alt="weibo"></a>
			      	<a class="icon-link" href=""><img src="/Public/img/qq.png" alt="qq"></a>
			      	<a class="icon-link" href=""><img src="/Public/img/weixin.png" alt="weixin"></a>
			      </div>
			    </div>
			  </div>
			</div>	<!-- /登陆模拟框 -->
        <?php else: ?>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	          	<span class="glyphicon glyphicon-user"></span> Username <span class="caret"></span>
	          </a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="<?php echo U('User/index');?>">个人中心</a></li>
	            <li class="divider"></li>
	            <li><a href="<?php echo U('Sign/signOut');?>">退出</a></li>
	          </ul>
	        </li><?php endif; ?>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
      	<?php if(true): ?><li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">功能大全<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">购物车</a></li>
            <li><a href="#">最近浏览</a></li>
            <li class="divider"></li>
            <li><a href="#">我的订单</a></li>
            <li><a href="#">我的积分</a></li>
            <li><a href="#">我的收藏</a></li>
            <li><a href="#">我的评价</a></li>
          </ul>
        </li><?php endif; ?>
        <li><a href="##">论坛</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>
<div id="navbar-space"></div>
	<header class="container">
	<div class="row" id="header-search">
	  <!-- 首页LOGO -->
	  <div class="col-md-3">
	  	<a href="<?php echo U('Index/index');?>"><img src="/Public/img/logo.png" class="img-responsive" alt="<?php echo ($web_name); ?>"></a>
	  </div>
	  <!-- 搜索 -->
	  <div class="col-md-6" id="header-search-search">
	  	<form action="###" method="get">
		  	<div class="input-group">
		      <input type="text" class="form-control">
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="submit">
		        	<span class="glyphicon glyphicon-search"></span>
		        </button>
		      </span>
		    </div>	<!-- /input-group -->
	    </form>
	  </div>
	  <div class="col-md-3"></div>
	</div>	
</header>
	<header class="container">
		<div class="row" id="category-panel">
			<!-- 全部分类 -->
			<div class="col-md-3">
				<div class="panel panel-default">
				  <div class="panel-heading"><a href="#">全部分类</a></div>
				  <div class="list-group">
				  	<?php $__FOR_START_1310225608__=0;$__FOR_END_1310225608__=9;for($i=$__FOR_START_1310225608__;$i < $__FOR_END_1310225608__;$i+=1){ ?><a href="#" class="list-group-item category-item"> Cras justo odio </a><?php } ?>
					</div>
				</div>
			</div>
			<!-- 轮播 -->
			<div class="col-md-7 thumbnail">
				<div id="carousel-generic" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carousel-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-generic" data-slide-to="1" class=""></li>
						<li data-target="#carousel-generic" data-slide-to="2" class=""></li>
						<li data-target="#carousel-generic" data-slide-to="3" class=""></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<img data-src="holder.js/1140x500/auto/#777:#555/text:First slide" alt="First slide [1140x500]" src="/Public/img/carousel/0.jpg" data-holder-rendered="true">
						</div>
						<div class="item">
							<img data-src="holder.js/1140x500/auto/#777:#555/text:First slide" alt="First slide [1140x500]" src="/Public/img/carousel/1.jpg" data-holder-rendered="true">
						</div>
						<div class="item">
							<img data-src="holder.js/1140x500/auto/#777:#555/text:First slide" alt="First slide [1140x500]" src="/Public/img/carousel/2.jpg" data-holder-rendered="true">
						</div>
						<div class="item">
							<img data-src="holder.js/1140x500/auto/#777:#555/text:First slide" alt="First slide [1140x500]" src="/Public/img/carousel/3.jpg" data-holder-rendered="true">
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a>
					<a class="right carousel-control" href="#carousel-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</header>
	<!-- XXX专区 -->
	<section class="container">
		<div class="row">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" id="recommend-tabs" role="tablist">
			  <li role="presentation" class="active"><a href="#recommend-tab-0" role="tab" data-toggle="tab">今日折扣</a></li>
			  <li role="presentation"><a href="#recommend-tab-1" role="tab" data-toggle="tab">本周最热</a></li>
			  <li role="presentation"><a href="#recommend-tab-2" role="tab" data-toggle="tab">猜你喜欢</a></li>
			  <li role="presentation"><a href="#recommend-tab-3" role="tab" data-toggle="tab">超市推荐</a></li>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content" id="xxx-panels">
			  <?php $__FOR_START_1895906789__=0;$__FOR_END_1895906789__=4;for($i=$__FOR_START_1895906789__;$i < $__FOR_END_1895906789__;$i+=1){ ?><div role="tabpanel" class="container tab-pane <?php echo ($i==0?'active':''); ?>" id="recommend-tab-<?php echo ($i); ?>">
			  	<div class="row">
			  		<?php $__FOR_START_1697424633__=0;$__FOR_END_1697424633__=6;for($j=$__FOR_START_1697424633__;$j < $__FOR_END_1697424633__;$j+=1){ ?><div class="col-md-2 col-xs-4">
						<a class="thumbnail" href="">
							<img src="/Public/upload/goods/2014/12/20/123456.jpg" data-src="holder.js/300x300" alt="商品">
							<div class="caption">
								<h6>老鼠药<?php echo ($i*$j); ?></h6>
								<strong class="text-danger">￥<?php echo ($j*$i*100); ?></strong>
								<small><del>￥<?php echo ($i*$j*1000); ?></del></small>
							</div>
						</a>				  		
				  	</div><?php } ?>
			  	</div>
			  </div><?php } ?>
			</div>
		</div>
	</section>
	<!-- 列举产品 -->
	<section class="container">
		<?php $__FOR_START_1662492609__=0;$__FOR_END_1662492609__=3;for($i=$__FOR_START_1662492609__;$i < $__FOR_END_1662492609__;$i+=1){ ?><div class="row">
			<?php $__FOR_START_1010343499__=0;$__FOR_END_1010343499__=3;for($ii=$__FOR_START_1010343499__;$ii < $__FOR_END_1010343499__;$ii+=1){ ?><div class="col-md-4">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <a href=""><h3 class="panel-title">xxx类</h3></a>
				  </div>
				  <div class="panel-body">
				  	<?php $__FOR_START_1136152126__=0;$__FOR_END_1136152126__=4;for($iii=$__FOR_START_1136152126__;$iii < $__FOR_END_1136152126__;$iii+=1){ ?><div class="col-md-6  col-xs-6">
						    <a href="#" class="thumbnail">
						      <img src="/Public/upload/goods/2014/12/20/123456.jpg" data-src="holder.js/100%x180" alt="...">
						      <h5>老鼠药</h5>
						      <strong class="text-danger">￥<?php echo ($j*$i*100); ?></strong>
						    </a>
						</div><?php } ?>
				  </div>
				</div>
			</div><?php } ?>
		</div><?php } ?>
	</section>
	<footer class="container">
	<hr />
	<p class="text-center">
		<a href="#">关于我们</a> | 
		<a href="#">我们的团队</a> | 
		<a href="#">网站联盟</a> | 
		<a href="#">热门搜索</a> | 
		<a href="#">友情链接</a> | 
		<a href="#">诚征英才</a> | 
		<a href="#">商家登录</a> | 
		<a href="#">供应商登录</a> | 
		<a href="#">放心搜</a> | 
		<a href="#">开放平台
	</p>
</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="/Public/jquery/jquery-1.11.2.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="/Public/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>