<?php

header("Content-type:text/html;charset=utf-8");
$conn=mysql_connect("w.rdc.sae.sina.com.cn:3307", "13y1nwyj2o", "y23mihlw1hlx0kkmk32wlwzil3yj54kjzy5401ky");
 $db = mysql_select_db("app_tangpanpan",$conn);
 if($conn)
	 {
		 echo "连接mysql数据库成功!";
	 }
	 else{
		 echo "连接失败!";
		 }
 
 $sql =" select * from goods ";
 $res = mysql_query($sql,$conn);
 $i=0;
 $arr = array();
 while($row =mysql_fetch_assoc($res)){
 $arr[$i++] = $row;
 };
  var_dump($res);
 var_dump($arr);

?>