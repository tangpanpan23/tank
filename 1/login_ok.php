<?php
define('ACC',true);
require('./includes/init.php');

// 用户登陆的表单处理页面


/*

"登陆" 转化为PHP+mysql的知识

登陆,就是验证用户名/密码,加上, 记住该用户名

mysql: select
PHP:  session操作


思路:
收集POST数据, 检验合法性
userModel->相应方法,

如果返回真,则说明,用户名密码正确
并,把用户名记录在session


如果为假,则提示用户名密码错误
*/

/*
要用加密方式存储密码.
1: abc ===加密===> def
2: 123 ===加密==> def

要求1: 碰撞性低

要求2: 不可以逆运算
111111===>'sdsafdafdsafu3985425'

MD5 可以很好的满足以上两条


MD5对于任何字符串,计算出的结果,都是定长32位

PHP计算MD5值,不需要引入第3方,内建支持 ,用md5()函数就可以 

*/


$u = trim($_POST['username']);
$p = trim($_POST['pwd']);

if(!$u || !$p) {
    echo '用户名/密码请填写完整';
    header("Location: user_login.html");
    exit;
}

$userModel = new userModel();

if($user = $userModel->check($u,$p)) {
    $_SESSION['user'] = $user;
    $login = true;

} else {
    $login = false;
}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="Generator" content="手机网" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="" />
<meta name="Description" content="" />
<title>GSM手机_手机类型_ECSHOP演示站 - Powered by ECShop</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" href="animated_favicon.gif" type="image/gif" />
<link href="view/css/message.css" rel="stylesheet" type="text/css" media="screen" />
<link href="view/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header">	
	<div class="header_top">
	<div class="header_top_l"></div>
		<div class="header_top_m" >
						<div style='float:left' id="ECS_MEMBERZONE">
				欢迎光临本店　　　　         <?php if(empty($_SESSION['user'])) { ?>
                    <a href="user_login.html">
                        会员登录
                    </a>
                    |
                    <a href="user_login.html">
                        免费注册
                    </a>
                    <?php } else { ?>
                        <?php echo $_SESSION['user']['username']; ?> 欢迎你!
                        <a href="logout.php">退出</a>
                    <?php } ?>
                    <label id="myaccount">
                        <a href="./user_orderlist.html">
                            个人中心
                        </a>
                    </label>
				<label id="helpcenter"><a href="#">帮助中心</a></label>
			</div>
			<div style='float:right'>
				<label id="collect"><a href="#" >加入收藏</a></label>
				<label id="sethome"><a href="#"  onclick="SetHome(this,window.location)">设为首页</a></label>
			</div>

			<div class='clear'></div>
		</div>  
		<div class="header_top_r"></div>
		<div class="clear"></div>
	</div>
	<div class="logo"><a href="#"><img src="view/images/logo.gif"></a></div>
	<div class="header_intro"><img src="view/images/by_top.gif"></div>
	<div class="headerdg">
		<em>抢购热线（全天24小时）</em>

		<p><img src="view/images/tel1.gif"></p>
	</div>
</div>
<div id="nav">
	<div class="nav_m">
		<ul>
			<li><a href="#" >首页</a></li>
						<li><a href="#"   id="navbg">GSM手机</a></li>
						<li><a href="#"  >双模手机</a></li>

						<li><a href="#"  >手机配件</a></li>
						<li><a href="#"  >留言板</a></li>
					</ul>
	</div>
	<DIV class="navr_recent" >
		<SPAN class="navr_recent_l1">　</SPAN> 
		<A onmousedown="bubble(event);" href="javascript:void(0);" name="myliulan">
		<a href="#" title="查看购物车"><a href="#" title="查看购物车">您的购物车中有 0 件商品，总计金额 ￥0.00元。</a></a></A>

		<EM>&nbsp;&nbsp;&nbsp;&nbsp;</EM> 
	</DIV>
	<div class="clear"></div>
</div>

<div class="nav_min_div" id="min_div" >
<img src="view/images/top_min.jpg"></div>

<div id="body">
	<div class="position">当前位置: <span><a href=".">首页</a> <code>&gt;</code> 系统提示</span></div>

	<div class="ldjerror">
        <?php if($login) { ?>
		<p class="ldjerror_m"><img src="view/images/succ.gif">登陆成功</p>
        <p><a href="index.php">去首页</a></p>
        <p><a href="user_orderlist.html">去个人中心</a></p>
        <?php } else { ?>
                                    
		<p class="ldjerror_m"><img src="view/images/error.gif">用户名或密码错误</p>
		<p><a href="user_login.html">重新登录</a></p>
        <?php } ?>
	</div>
</div>

<div class="footert">
	<div class="footertl">
		<div class="footert_1"><img src="view/images/logo21.gif"></div>
		<div class="footert_2"> 抢购热线（9:00-18:00）
		  <p><img src="view/images/tel2.gif"></p>
		</div>
	</div>
	<div class="footertr">
		<div class="footertr_t">好趣购是货真价实的网络直销商城，好趣购所售手机全部都是厂家直接供货，没有任何中间批发
和分销环节，让您以最低价格，购买到性价比最高的手机。</div>

		<div class="footertr_b">
			<dl class="footertr_d1">
				<dt></dt>
				<dd>会员积分计划</dd>
			</dl>
			<dl>
				<dt></dt>
				<dd>免费订购热线</dd>

			</dl>
			<dl class="footertr_d3">
				<dt></dt>
				<dd>3000城市送货上门</dd>
			</dl>
			<dl class="footertr_d4">
				<dt></dt>
				<dd>品牌厂商直接供货</dd>

			</dl>
			<dl class="footertr_d5">
				<dt></dt>
				<dd>中国人保承保</dd>
			</dl>
		</div>
		<div class="clear"></div>
	</div>

	<div class="clear"></div>
</div>
<div class="footer">
        <div class="foottop">
<dl>
  <dt>新手上路 </dt>
    <dd><a href="#" title="售后流程">售后流程</a></dd>
    <dd><a href="#" title="购物流程">购物流程</a></dd>
    <dd><a href="#" title="订购方式">订购方式</a></dd>

  </dl>
<dl>
  <dt>手机常识 </dt>
    <dd><a href="#" title="如何分辨原装电池">如何分辨原装电池</a></dd>
    <dd><a href="#" title="如何分辨水货手机 ">如何分辨水货手机</a></dd>
    <dd><a href="#" title="如何享受全国联保">如何享受全国联保</a></dd>
  </dl>

<dl>
  <dt>配送与支付 </dt>
    <dd><a href="#" title="货到付款区域">货到付款区域</a></dd>
    <dd><a href="#" title="配送支付智能查询 ">配送支付智能查询</a></dd>
    <dd><a href="#" title="支付方式说明">支付方式说明</a></dd>
  </dl>
<dl>
  <dt>会员中心</dt>

    <dd><a href="#" title="资金管理">资金管理</a></dd>
    <dd><a href="#" title="我的收藏">我的收藏</a></dd>
    <dd><a href="#" title="我的订单">我的订单</a></dd>
  </dl>
<dl>
  <dt>服务保证 </dt>
    <dd><a href="#" title="退换货原则">退换货原则</a></dd>

    <dd><a href="#" title="售后服务保证 ">售后服务保证</a></dd>
    <dd><a href="#" title="产品质量保证 ">产品质量保证</a></dd>
  </dl>
<dl>
  <dt>联系我们 </dt>
    <dd><a href="#" title="网站故障报告">网站故障报告</a></dd>
    <dd><a href="#" title="选机咨询 ">选机咨询</a></dd>

    <dd><a href="#" title="投诉与建议 ">投诉与建议</a></dd>
  </dl>
<div class="foottop_r" onClick="window.location.href = '#'"></div>
<div class="clear"></div>
</div>    
	
<div class="footbot">
              <a href="#" >免责条款</a>
                   |
                      <a href="#" >隐私保护</a>

                   |
                      <a href="#" >咨询热点</a>
                   |
                      <a href="#" >联系我们</a>
                   |
                      <a href="#" >公司简介</a>
                   |
                      <a href="#" >批发方案</a>
                   |
                      <a href="#" >配送方式</a>

                  <p>&copy; 2005-2011 ECSHOP 版权所有，并保留所有权利。</p>
  <div class="clear"></div>
</div>
<div class="clear"></div></div>
</body>
</html>



