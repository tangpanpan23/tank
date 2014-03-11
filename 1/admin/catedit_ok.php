<?php
define('ACC','admin');
require('../includes/init.php');
// catedit_ok.php

$data = array();

$data['cat_name'] = trim($_POST['cat_name']);

if($data['cat_name'] == '') {
    echo '栏目名不能为空';
    exit;
}

$data['parent_id'] = $_POST['parent_id'] + 0;
if($data['parent_id'] < 0) {
    $data['parent_id'] = 0;
}

$cat_id = $_POST['cat_id'] + 0;

// 实例化model
$cateModel = new cateModel();


// 重要判断,新的父栏目是否为自身或者自身的子孙栏目

// 找新父栏目的家谱树
$list = $cateModel->cateList();
$ftree = $cateModel->familyTree($list,$data['parent_id']);
foreach($ftree as $v) {
    if($v['cat_id'] == $cat_id) {
        echo '不能以子孙栏目或自己做父栏目';
        exit;
    }
}


if($cateModel->catEdit($data,$cat_id)) {
    echo '栏目修改成功';
    exit;
} else {
    echo '栏目修改失败';
    exit;
}





