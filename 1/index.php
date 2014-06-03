<?php
// 首页 index.php
define('ACC',true);
require('./includes/init.php');

// 实例化cateModel,并取出栏目列表
$cateModel = new cateModel();
$cateList = $cateModel->cateList();
//print_r($cateList);exit;

// 实例化goodsModel
$goodsModel = new goodsModel();

// 取出3条精品
$best = $goodsModel->getTop('best',3);

// 取出3条新品
$new = $goodsModel->getTop('new',3);

// 取出3条热销
$hot = $goodsModel->getTop('hot',3);

//取出热销排行
$hotlist = $goodsModel->getTop('hot',6);


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    
<head>
    <meta name="Generator" content="手机网" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="Keywords" content="" />
    <meta name="Description" content="" />
    <title>
        GSM手机_手机类型_ECSHOP演示站 - Powered by ECShop
    </title>
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="icon" href="animated_favicon.gif" type="image/gif" />
    <link href="view/css/index.css" rel="stylesheet" type="text/css" media="screen"
    />
    <link href="view/css/style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="view/js/common.js"></script>
</head>
    
<body>
    <div id="header">
        <div class="header_top">
            <div class="header_top_l">
            </div>
            <div class="header_top_m">
                <div style='float:left' id="ECS_MEMBERZONE">
                    欢迎光临本店　　　　
                   <?php if(empty($_SESSION['user'])) { ?>
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
                        <a href="#">
                            我的帐户
                        </a>
                    </label>
                    <label id="helpcenter">
                        <a href="#">
                            帮助中心
                        </a>
                    </label>
                </div>
                <div style='float:right'>
                    <label id="collect">
                        <a href="#">
                            加入收藏
                        </a>
                    </label>
                    <label id="sethome">
                        <a href="#" onclick="SetHome(this,window.location)">
                            设为首页
                        </a>
                    </label>
                </div>
                <div class='clear'>
                </div>
            </div>
            <div class="header_top_r">
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="logo">
            <a href="#">
                <img src="view/images/logo.gif">
            </a>
        </div>
        <div class="header_intro">
            <img src="view/images/by_top.gif">
        </div>
        <div class="headerdg">
            <em>
                抢购热线（全天24小时）
            </em>
            <p>
                <img src="view/images/tel1.gif">
            </p>
        </div>
    </div>
    <div id="nav">
        <div class="nav_m">
            <ul>
                <li>
                    <a href="index.php" id="navbg">
                        首页
                    </a>
                </li>
                <li>
                    <a href="category.php?cat_id=3" >
                        GSM手机
                    </a>
                </li>
                <li>
                    <a href="#">
                        双模手机
                    </a>
                </li>
                <li>
                    <a href="#">
                        手机配件
                    </a>
                </li>
                <li>
                    <a href="#">
                        留言板
                    </a>
                </li>
                <li>
                    <a href="./admin/index.html">
                        进入后台管理
                    </a>
                </li>
            </ul>
        </div>
        <DIV class="navr_recent">
            <SPAN class="navr_recent_l1">
                　
            </SPAN>
            <A onmousedown="bubble(event);" href="#" name="myliulan">
                <a href="#" title="查看购物车">
                   <a href="flow.php?act=cart" title="查看购物车">
                       我的购物车
                    </a>
                </a>
            </A>
            <EM>
                &nbsp;&nbsp;&nbsp;&nbsp;
            </EM>
        </DIV>
        <div class="clear">
        </div>
    </div>
    <div class="nav_min_div" id="min_div">
        <img src="view/images/top_min.jpg">
    </div>
    <div id="body">
        <div class="body_l">
            <div class="subsearch">
                <form id="searchForm" name="searchForm" method="get" action="search.php"
                onSubmit="return checkSearchForm()">
                    <div>
                        <input name="keywords" type="text" id="keyword" value="" class="searchmobile">
                        <button class="menu_button" name="menu_button" onClick="return checkSearchForm()">
                        </button>
                    </div>
                </form>
            </div>
            <script type="text/javascript">
                < !--
                function checkSearchForm() {
                    if (document.getElementById('keyword').value) {
                        document.searchForm.submit();
                        return true;
                    } else {
                        alert("请输入搜索关键词！");
                        return false;
                    }
                }-->
            </script>
            <div class="subnav_header">
            </div>
            <script type="text/javascript">
            function menu_c(o) {
                alert(o.getElementsByTagName('ul').length);
            }
            </script>
            <div class="subnav">
                <?php foreach($cateList as $v) { ?>
                <?php if ($v['lev'] == 0) { ?>
                <div>
                    <span class="left">
                        <?php echo $v['cat_name']; ?>
                    </span>
                    <span class="right subnav_right">
                        <img src="view/images/line.gif" border="0" id="categorie_ico1">
                    </span>
                </div>
                <ul>
                    <?php foreach($cateList as $t) { ?>
                    <?php if($t['parent_id'] == $v['cat_id']) { ?>
                    <li>
                        &nbsp;
                        <a href="category.php?cat_id=<?php echo $t['cat_id']; ?>">
                            <?php echo $t['cat_name']; ?>
                        </a>
                    </li>
                    <?php } ?>
                    <?php } ?>
                </ul>        
                <?php } ?>
                <?php } ?>



            </div>
            <div class="subinfo_header">
                <div class="left subinfo_header_left">
                    <a href="#">
                    </a>
                </div>
                <!--<div class="right subinfo_header_right"><a href="#">更多</a></div>-->
            </div>
            <div class="subinfo_body">
                <ul>
                    <li style="width:175px; overflow:hidden">
                        <a href="#" title="很好，我很喜欢" style="color:#333333">
                            很好，我很喜欢
                        </a>
                        <br />
                        <a style="color:#333333">
                            ecshop
                        </a>
                    </li>
                </ul>
            </div>
            <div class="subinfo_footer">
            </div>
            <div class="subinfo_header">
                <div class="subinfo_header_left_top10">
                    &nbsp;
                    <a href="#">
                    </a>
                </div>
            </div>
            <div class="subinfo_body_top10">
                <ul>
              <?php foreach($hotlist as $v) { ?>
                    <li>
                        <div class="subinfo_body_top10_l">
                            <a href="goods.php?goods_id=<?php echo $v['goods_id']; ?>">
                                <img src="<?php echo $v['thumb_img']; ?>" alt="<?php echo $v['goods_name']; ?>"
                                class="samllimg" />
                            </a>
                        </div>
                        <div class="subinfo_body_top10_r">
                            <p class="subinfo_body_top10_r_1">
                                <a href="goods.php?goods_id=<?php echo $v['goods_id']; ?>" title="<?php echo $v

['goods_name']; ?>"><?php echo $v['goods_name']; ?></a>
                            </p>
                            <p class="subinfo_body_top10_r_3">
                                ￥<?php echo $v['shop_price']; ?>元
                            </p>
                        </div>
                        <div class="clear">
                        </div>
                    </li>
                     <?php } ?>
                </ul>
            </div>
            <div class="subinfo_footer">
            </div>
            <div class="submessage_header">
                &nbsp;
            </div>
            <div class="submessage_body">
                <a href="#" target="_blank">
                    <img src="view/images/message.gif">
                </a>
            </div>
            <div class="subinfo_footer">
            </div>
        </div>
        <div class="body_r" style=" display:inline">
            <div class="mainbig">
                <img src="view/images/banner.jpg" />
            </div>
            <div class="clear">
            </div>
            <div class="mainheader">
                <div class="weekbuy">
                    <a href="search.php?intro=new">
                        更多&gt;&gt;
                    </a>
                </div>
            </div>
            <ul class="productlist">
                <?php foreach($best as $v) { ?>
                <li>
                    <a href="goods.php?goods_id=<?php echo $v['goods_id']; ?>">
                        <img src="<?php echo $v['thumb_img']; ?>" alt="<?php echo $v['goods_name']; ?>" />
                    </a>
                    <p class="pname">
                        <a href="goods.php?goods_id=<?php echo $v['goods_id']; ?>" title="<?php echo $v['goods_name']; ?>">
                            <?php echo $v['goods_name']; ?>
                        </a>
                    </p>
                    <p class="price">
                        ￥<?php echo $v['shop_price']; ?>元
                    </p>
                </li>
                <?php } ?>
            </ul>
            <div class="clear"></div>
            <div class="mainheader">
                <div class="lowerbuy">
                    <a href="search.php?intro=new">
                        更多&gt;&gt;
                    </a>
                </div>
            </div>
            <ul class="productlist">
                <?php foreach($hot as $v) { ?>
                <li>
                    <a href="goods.php?goods_id=<?php echo $v['goods_id']; ?>">
                        <img src="<?php echo $v['thumb_img']; ?>" alt="<?php echo $v['goods_name']; ?>" />
                    </a>
                    <p class="pname">
                        <a href="goods.php?goods_id=<?php echo $v['goods_id']; ?>" title="<?php echo $v['goods_name']; ?>">
                            <?php echo $v['goods_name']; ?>
                        </a>
                    </p>
                    <p class="price">
                        ￥<?php echo $v['shop_price']; ?>元
                    </p>
                </li>
                <?php } ?>
            </ul>
            <div class="clear"></div>
            <div class="mainheader">
                <div class="newproduct">
                    <a href="search.php?intro=new">
                        更多&gt;&gt;
                    </a>
                </div>
            </div>
            <ul class="productlist">
                <?php foreach($new as $v) { ?>
                <li>
                    <a href="goods.php?goods_id=<?php echo $v['goods_id']; ?>">
                        <img src="<?php echo $v['thumb_img']; ?>" alt="<?php echo $v['goods_name']; ?>" />
                    </a>
                    <p class="pname">
                        <a href="goods.php?goods_id=<?php echo $v['goods_id']; ?>" title="<?php echo $v['goods_name']; ?>">
                            <?php echo $v['goods_name']; ?>
                        </a>
                    </p>
                    <p class="price">
                        ￥<?php echo $v['shop_price']; ?>元
                    </p>
                </li>
                <?php } ?>
            </ul>
        </div>
        <div class="clear">
        </div>
    </div>
    </div>
    <div class="footert">
        <div class="footertl">
            <div class="footert_1">
                <img src="view/images/logo21.gif">
            </div>
            <div class="footert_2">
                抢购热线（9:00-18:00）
                <p>
                    <img src="view/images/tel2.gif">
                </p>
            </div>
        </div>
        <div class="footertr">
            <div class="footertr_t">
                好趣购是货真价实的网络直销商城，好趣购所售手机全部都是厂家直接供货，没有任何中间批发 和分销环节，让您以最低价格，购买到性价比最高的手机。
            </div>
            <div class="footertr_b">
                <dl class="footertr_d1">
                    <dt>
                    </dt>
                    <dd>
                        会员积分计划
                    </dd>
                </dl>
                <dl>
                    <dt>
                    </dt>
                    <dd>
                        免费订购热线
                    </dd>
                </dl>
                <dl class="footertr_d3">
                    <dt>
                    </dt>
                    <dd>
                        3000城市送货上门
                    </dd>
                </dl>
                <dl class="footertr_d4">
                    <dt>
                    </dt>
                    <dd>
                        品牌厂商直接供货
                    </dd>
                </dl>
                <dl class="footertr_d5">
                    <dt>
                    </dt>
                    <dd>
                        中国人保承保
                    </dd>
                </dl>
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="footer">
        <div class="foottop">
            <dl>
                <dt>
                    新手上路
                </dt>
                <dd>
                    <a href="#" title="售后流程">
                        售后流程
                    </a>
                </dd>
                <dd>
                    <a href="#" title="购物流程">
                        购物流程
                    </a>
                </dd>
                <dd>
                    <a href="#" title="订购方式">
                        订购方式
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    手机常识
                </dt>
                <dd>
                    <a href="#" title="如何分辨原装电池">
                        如何分辨原装电池
                    </a>
                </dd>
                <dd>
                    <a href="#" title="如何分辨水货手机 ">
                        如何分辨水货手机
                    </a>
                </dd>
                <dd>
                    <a href="#" title="如何享受全国联保">
                        如何享受全国联保
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    配送与支付
                </dt>
                <dd>
                    <a href="#" title="货到付款区域">
                        货到付款区域
                    </a>
                </dd>
                <dd>
                    <a href="#" title="配送支付智能查询 ">
                        配送支付智能查询
                    </a>
                </dd>
                <dd>
                    <a href="#" title="支付方式说明">
                        支付方式说明
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    会员中心
                </dt>
                <dd>
                    <a href="#" title="资金管理">
                        资金管理
                    </a>
                </dd>
                <dd>
                    <a href="#" title="我的收藏">
                        我的收藏
                    </a>
                </dd>
                <dd>
                    <a href="#" title="我的订单">
                        我的订单
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    服务保证
                </dt>
                <dd>
                    <a href="#" title="退换货原则">
                        退换货原则
                    </a>
                </dd>
                <dd>
                    <a href="#" title="售后服务保证 ">
                        售后服务保证
                    </a>
                </dd>
                <dd>
                    <a href="#" title="产品质量保证 ">
                        产品质量保证
                    </a>
                </dd>
            </dl>
            <dl>
                <dt>
                    联系我们
                </dt>
                <dd>
                    <a href="#" title="网站故障报告">
                        网站故障报告
                    </a>
                </dd>
                <dd>
                    <a href="#" title="选机咨询 ">
                        选机咨询
                    </a>
                </dd>
                <dd>
                    <a href="#" title="投诉与建议 ">
                        投诉与建议
                    </a>
                </dd>
            </dl>
            <div class="foottop_r" onClick="window.location.href = '#'">
            </div>
            <div class="clear">
            </div>
        </div>
        <div class="footbot">
            <a href="#">
                免责条款
            </a>
            |
            <a href="#">
                隐私保护
            </a>
            |
            <a href="#">
                咨询热点
            </a>
            |
            <a href="#">
                联系我们
            </a>
            |
            <a href="#">
                公司简介
            </a>
            |
            <a href="#">
                批发方案
            </a>
            |
            <a href="#">
                配送方式
            </a>
            <p>
                &copy; 2005-2011 ECSHOP 版权所有，并保留所有权利。
            </p>
            <div class="clear">
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
</body>

</html>






