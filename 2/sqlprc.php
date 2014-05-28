<?php

header("Content-type:text/html;charset=utf-8");
$conn=mysql_connect("w.rdc.sae.sina.com.cn:3307", "tangpanpan23@sina.com", "tangpanpan314");
 $db = mysql_select_db("app_tangpanpan",$conn);
 if($conn)
	 {
		 echo "连接mysql数据库成功!";
	 }
	 else{
		 echo "连接失败!";
		 }
 
 $sql ="explain select * from pan_pan ";
 $res = mysql_query($sql,$conn);
 $i=0;
 $arr = array();
 while($row =mysql_fetch_assoc($res)){
 $arr[$i++] = $row;
 };

 var_dump($arr);

?>