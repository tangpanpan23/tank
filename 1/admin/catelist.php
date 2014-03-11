<?php
# 展示栏目信息
define('ACC','admin');
require('../includes/init.php');


// 实例化cateModel
$cateModel = new cateModel();
$list = $cateModel->cateList();


if(empty($list)) {
    echo '无数据';
    exit;
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 商品分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
<script type = 'text/javascript' src = '/app/view/js/jquery-1.4.2.min.js'></script>
</head>
<body>

<h1>
<span class="action-span"><a href="cateadd.php">添加分类</a></span>
<span class="action-span1"><a href="index.html">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 商品分类 </span>
<div style="clear:both"></div>
</h1>
<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">

<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
  <tr>
    <th>分类名称</th>
    <th>商品数量</th>
    <th>数量单位</th>
    <th>导航栏</th>
    <th>是否显示</th>

    <th>价格分级</th>
    <th>排序</th>
    <th>操作</th>
  </tr>
    <?php foreach($list as $v) { ?>
    <tr align="center" class="0" id="0_1" id = 'tr_1'>
    <td align="left" class="first-cell" style = 'padding-left="0"'>
            <img src="images/menu_minus.gif" id="icon_0_1" width="9" height="9" border="0" style="margin-left:<?php echo $v['lev']; ?>em" />

            <span><a href="#" ><?php echo $v['cat_name']; ?></a></span>
        </td>
    <td width="10%">0</td>
    <td width="10%"><span>&nbsp;&nbsp;&nbsp;&nbsp;</span></td>
    <td width="10%"><img src="images/no.gif" /></td>
    <td width="10%"><img src="images/yes.gif" /></td>
    <td><span>5</span></td>

    <td width="10%" align="right"><span>50</span></td>
    <td width="24%" align="center">
      <a href="catedit.php?cat_id=<?php echo $v['cat_id']; ?>">编辑</a> |
      <a href="catdel.php?cat_id=<?php echo $v['cat_id']; ?>" title="移除">移除</a>
    </td>
  </tr>
  <?php } ?>
  </table>
</div>
</form>

<div id="footer">
共执行 1 个查询，用时 0.015927 秒，Gzip 已禁用，内存占用 1.999 MB<br />

版权所有 &copy; 2005-2010 上海商派网络科技有限公司，并保留所有权利
。</div>

</body>
</html>