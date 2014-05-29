<?php
defined('ACC') || exit('access denied');
/*
网站的初始化文件
负责计算当前网站的根目录
负责 引入所有页面都需要的引入的公共文件.

*/

// ROOT 代表网站的根路径
//define('ROOT',str_replace('\\','/',str_replace('includes\init.php','',__FILE__)));
define('ROOT',str_replace('includes/init.php','',__FILE__));
//echo "nihao";
//echo ROOT;
//exit ;
include(ROOT . 'includes/conf.class.php');
include(ROOT . 'includes/mysql.class.php');
include(ROOT . 'includes/lib_base.php');

function __autoload($class) { // $class是 new 类名(),是类名
    if((stripos($class,'model')) !== false) {
        include(ROOT . 'model/' . $class . '.php');
    } else {
        include(ROOT . 'helper/' . $class . '.php');
    }
}

//echo "nihao";echo ROOT;exit;
/*
注意,此处应加上$_GET,$_POST,$_COOKIE的字符转义
具体: 判断魔术引号是否开启,
如果未开启,则把$_GET,$_POST,$_COOKIE
递归的转义一遍
*/

if(!get_magic_quotes_gpc()) {
    array_walk_recursive($_GET,'addslashes_real');
    array_walk_recursive($_POST,'addslashes_real');
    array_walk_recursive($_COOKIE,'addslashes_real');
}

//初始化session
session_start();







