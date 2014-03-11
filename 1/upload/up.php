<meta http-equiv="content" content-type="html/text"; charset="utf-8">
<?php

/*

1:提交后,文件自动发到服务器上,形成一个临时文件
2:在服务器上,只需要把临时文件移动到
自己想要的位置就可以完成上传操作

*/


/*
上传文件 注意事项
1:表单类型必须是POST方式提交
2:表单须要加一个选项 enctype="multipart/form-data"
3:上传的临时文件,接收的.php文件一运行完毕,临时文件立即就消失
4: 用专门的move_uploaded_file来移动临时文件
*/


print_r($_FILES);

/*
sleep(5);
*/



// 把上传的临时文件的路径读出来,
// 移动新的路径,上传就完成了.



if(move_uploaded_file($_FILES['photo']['tmp_name'],ROOT.'date/' . $_FILES['photo']['name'])) {
    echo '上传完成';
} else {
    echo '上传失败';
}






/*
上传文件相关的配置选项
file_upload
*/







