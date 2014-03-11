<?php
# 展示栏目信息
define('ACC','admin');
require('../includes/init.php');


// 实例化cateModel
$userModel = new userModel();
$list = $userModel->userList();


if(empty($list)) {
    echo '无数据';
    exit;
}

$total = $userModel->userNum();
$perpage = 1;
$page = isset($_GET['page'])?$_GET['page']+0 : 1;
$page = $page ? $page:1;

$offset = ($page - 1) * $perpage;
$list = $userModel->userList($offset,$perpage);

// 产生分页导航
$page = new page($total,$perpage);
$pagelist = $page->show(2);
//在这里先测试一下.
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 会员列表 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="styles/general.css" rel="stylesheet" type="text/css" />
<link href="styles/main.css" rel="stylesheet" type="text/css" />
<script type = 'text/javascript' src = '/app/view/js/jquery-1.4.2.min.js'></script>
</head>
<body>

<h1>
<span class="action-span1"><a href="index.html">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1"> - 会员列表 </span>
<div style="clear:both"></div>
</h1>
<form method="post" action="" name="listForm">
<div class="list-div" id="listDiv">

<table width="100%" cellspacing="1" cellpadding="2" id="list-table">
  <tr>
    <th>用户id</th>
    <th>用户名</th>
    <th>邮件地址</th>
    <th>操作</th>
  </tr>
    <?php foreach($list as $v) { ?>
    <tr align="center" class="0" id="0_1" id = 'tr_1'>
    <td align="left" class="first-cell" style = 'padding-left="0"'>
            <img src="images/menu_minus.gif" id="icon_0_1" width="9" height="9" border="0" style="margin-left:<?php echo $v['user_id']; ?>" />

            <span><a href="#" ><?php echo $v['user_id']; ?></a></span>
        </td>
    <td width="25%"><?php echo $v['username']; ?></td>
    <td width="25%"><span><?php echo $v['email']; ?></span></td>
    <td width="24%" align="center">
      <a href="useredit.php?user_id=<?php echo $v['user_id']; ?>">编辑</a> |
      <a href="userdel.php?user_id=<?php echo $v['user_id']; ?>" title="移除">移除</a>
    </td>
  </tr>
  <?php } ?>
  </table>
 <p>
<table id="page-table" cellspacing="0">
  <tr>
    <td align="center" nowrap="true">
         <?php echo $pagelist; ?>
    </td>
  </tr>

</table>
</p>
</div>
</form>

<div id="footer">
共执行 1 个查询，用时 0.015927 秒，Gzip 已禁用，内存占用 1.999 MB<br />

版权所有 &copy; 2005-2010 上海商派网络科技有限公司，并保留所有权利
。</div>

</body>
</html>