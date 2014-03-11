<?php
define('ACC','admin');
require('../includes/init.php');
// orderdel.php?order_id=N
$order_id = $_GET['order_id'] + 0;
if($order_id <= 0) {
    echo '参数有误';
    exit;
}


// 实例化orderModel
$orderModel = new orderModel();

if($orderModel->del($order_id)) {
    echo '删除成功';
    exit;
} else {
    echo '删除失败';
    exit;
}



