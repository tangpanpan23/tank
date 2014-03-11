<?php
define('ACC','admin');
require('../includes/init.php');
// userdel.php?user_id=N
$user_id = $_GET['user_id'] + 0;
if($user_id <= 0) {
    echo '参数有误';
    exit;
}
// 实例化userModel
$userModel = new userModel();

if($userModel->del($user_id)) {
    echo '删除成功';
    exit;
} else {
    echo '删除失败';
    exit;
}



