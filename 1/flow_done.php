<?php
define('ACC',true);
//引入初始化文件
require('includes/init.php')
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
<link href="view/css/member.css" rel="stylesheet" type="text/css" media="screen" />
<link href="view/css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header">	
	<div class="header_top">
	<div class="header_top_l"></div>
		<div class="header_top_m" >
						<div style='float:left' id="ECS_MEMBERZONE">
				欢迎光临本店　　   <?php if(empty($_SESSION['user'])) { ?>
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
				<label id="myaccount"><a href="#" >我的帐户</a></label>
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
	<div class="navr_recent" >
		<span class="navr_recent_l1">　</span> 
		<a onmousedown="bubble(event);" href="javascript:void(0);" name="myliulan">
		<a href="#" title="查看购物车"><a href="#" title="查看购物车">您的购物车中有 0 件商品，总计金额 ￥0.00元。</a></a></a>

		<em>&nbsp;&nbsp;&nbsp;&nbsp;</em> 
	</div>
	<div class="clear"></div>
</div>

<div class="nav_min_div" id="min_div" >
<img src="view/images/top_min.jpg"></div>

<div class="content">
	<div class="user">
		<div class="menu">当前位置: <span><a href=".">首页</a> <code>&gt;</code> 购物流程</span></div>
		
		
		
		
					<div class="shop">
			<div class="shopend">
				<div class="shopendsuc">
					<h1>感谢您在本店购物！您的订单已提交成功，请记住您的订单号2011122598391</h1>
					<h2></h2>
				</div>
				<div class="shopend_bg" style="padding-left:40px">
					您选定的配送方式为: <strong>申通快递</strong>，					您选定的支付方式为: <strong>银行汇款/转帐</strong><br />					
					您的应付款金额为: <strong style="color:#ff0000">￥3025.00元</strong><br>
					银行名称
收款人信息：全称 ××× ；帐号或地址 ××× ；开户行 ×××。
注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。<br />
									</div>
					<div class="shopend_bg" style="padding-left:0px"><p style="text-align:center; margin-bottom:20px;">
						您可以 <a href="index.php">返回首页</a> 或去 <a href="user.php">用户中心</a></p>
					</div>
				</div>
			</div>
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