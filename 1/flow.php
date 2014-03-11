<?php
define('ACC',true);
require('./includes/init.php');

// 购物主程序
// flow.php

// 把商品加到购物车
// 确认订单
// 填写地址

$act = isset($_GET['act'])?$_GET['act']:'cart'; //获取地址栏的act参数


$cart = cart::getCart(); // 获得购物车实例

if($act == 'cart') {
    $id = isset($_GET['id'])?$_GET['id'] + 0 : 0;
    if($id > 0) { // 准备这个id对应的商品加到购物车
        $goodsModel = new goodsModel();
        $goods = $goodsModel->goodsCart($id);
        if(empty($goods)) {
            header('location: index.php');
            exit;
        }
        /*
            应该判断商品是否已下架
            判断商品的库存是否 > 1
        */
		//测试图片语句 echo $goods['thumb_img'];exit;
        $cart->addItem($id,$goods['goods_name'],$goods['shop_price'],1,$goods['thumb_img']);
    }

    $cartlist = $cart->listItem();
    $total = $cart->getMoney();
    include(ROOT . '/view/flow_cart.html');
}


if($act == 'drop') { // 从购物车删除一个商品
    $id = $_GET['id'] + 0;
    $cart->delItem($id);  
    
    $cartlist = $cart->listItem();
    $total = $cart->getMoney();
    include(ROOT . '/view/flow_cart.html');
    
}


if($act == 'checkout') {
    // 要求登陆后才能购买
    // 必须有商品,才能购买
    // 如果以上都满足,提供一个表单供选择

    if(empty($_SESSION['user'])) {
        header('location: user_login.html');
        exit;
    }

    if($cart->getCount() == 0) {
        header('location: index.php');
        exit;
    }

    $cartlist = $cart->listItem(); // 获取购物车里的商品列表
    $total = $cart->getMoney();
    include(ROOT . '/view/flow_checkout.html');

}


if($act == 'done') {
    // 如果没登陆, 则转向登陆
    // 如果购物车为空,则转向首页
    if(empty($_SESSION['user'])) {
        header('location: user_login.html');
        exit;
    }

    $cartlist = $cart->listItem();
    if(empty($cartlist)) {  // empty只能用来判断变量
        header('location: index.php');
        exit;
    }



    // 完成订单入库操作(牵涉到2张表)
    // 触发器修改库存

    // 第一步,

    $orderModel = new orderModel();

    $data = array();
    $data['xingm'] = trim($_POST['xingm']);
    $data['tel'] = trim($_POST['tel']);
    $data['zipcode'] = trim($_POST['zipcode']);
    $data['mobile'] = trim($_POST['mobile']);
    $data['address'] = trim($_POST['address']);
    $data['email'] = trim($_POST['email']);  // 应该正则判断是否为email 
    $data['best_time'] = trim($_POST['best_time']);
    $data['shipping'] = $_POST['shipping'] + 0;
    $data['payment'] = $_POST['payment'] + 0;
    $data['tips'] = $_POST['tips'];
    $data['amount'] = $cart->getMoney();
    $data['ordertime'] = time();
    $data['order_sn'] = $orderModel->order_sn();

    $order_id = $orderModel->addOrder($data);
    if(!$order_id) {
        echo '失败';
        exit;
    }

    // order_info插入成功,下一步,循环插入order_goods
    // 从购物车取所有商品来,
    // 循环所有商品, 逐个插入order_goos表
    $orderinfo['amount'] = $data['amount'];
    $orderinfo['order_sn'] = $data['order_sn'];

    $data = array();
    $res = array(); //用来存储order_goods生成的主键

    $data['order_id'] = $order_id;
    foreach($cartlist as $k=>$v) {
        $data['goods_id'] = $k;
        $data['goods_name'] = $v['name'];
        $data['num'] = $v['num'];
        $data['price'] = $v['price'];
        $data['subtotal'] = $v['num'] * $v['price'];

        if($rec_id = $orderModel->addGoods($data)) {
            $res[] = $rec_id; // 如果每一次foreach都成功了, 那么 $res的单元个数等于$cartlist的单元数
        }
    }

    if(count($cartlist) !== count($res)) {
        // 如果某一个商品插入失败,先删除成功的order_goods中的条目
        // 再删除 order_info
        if($orderModel->del($order_id)) {
            echo '下订单失败';
            exit;
        } else {
            // 记录日志,通知管理员,有异常
            echo '下订单失败,请联第管理员';
            exit;
        }
    }

    ///// == 到这里,说明下订单成功了 ======// 
    
    // 清空购物车
    $cart->clearItem();

    //订单支付获取提交过来的信息
    $p0_Cmd="Buy";
    $p1_MerId="10001126856";
    $p2_Order=$orderinfo['order_sn'];
    $p3_Amt=$data['price'];
    $p4_Cur="CNY";
    //商品名称
    $p5_Pid="";
    //种类
    $p6_Pcat="";
    //商品介绍
    $p7_Pdesc="";
    //易宝支付成功后,给url返回信息
    $p8_Url="http://localhost/shop/view/res.php";
    //送货地址
    $p9_SAF="0";
    //易宝保存地址,默认为0.不保存
    $pa_MP="0";
    $pd_FrpId=$_REQUEST['pd_FrpId'];
    //应答机制
    $pr_NeedResponse="1";
    
    //请求参数拼接
    $data="";
    $data=$data.$p0_Cmd;
    $data=$data.$p1_MerId;
    $data=$data.$p2_Order;
    $data=$data.$p3_Amt;
    $data=$data.$p4_Cur;
    $data=$data.$p5_Pid;
    $data=$data.$p6_Pcat;
    $data=$data.$p7_Pdesc;
    $data=$data.$p8_Url;
    $data=$data.$p9_SAF;
    $data=$data.$pa_MP;
    $data=$data.$pd_FrpId;
    $data=$data.$pr_NeedResponse;
    //商家密钥
    $merchantKey	= "69cl522AV6q613Ii4W6u8K6XuW8vM1N6bFgyv769220IuYe9u37N4y7rI4Pl";
    function HmacMd5($data,$key)
    {
    	// RFC 2104 HMAC implementation for php.
    	// Creates an md5 HMAC.
    	// Eliminates the need to install mhash to compute a HMAC
    	// Hacked by Lance Rushing(NOTE: Hacked means written)
    
    	//需要配置环境支持iconv，否则中文参数不能正常处理
    	$key = iconv("GB2312","UTF-8",$key);
    	$data = iconv("GB2312","UTF-8",$data);
    
    	$b = 64; // byte length for md5
    	if (strlen($key) > $b) {
    		$key = pack("H*",md5($key));
    	}
    	$key = str_pad($key, $b, chr(0x00));
    	$ipad = str_pad('', $b, chr(0x36));
    	$opad = str_pad('', $b, chr(0x5c));
    	$k_ipad = $key ^ $ipad ;
    	$k_opad = $key ^ $opad;
    
    	return md5($k_opad . pack("H*",md5($k_ipad . $data)));
    }
    //hmac是签名串,用于易宝和商家相互确认
    $hmac=HmacMd5($data,$merchantKey);
    include(ROOT . '/view/flow_done.html');

}







