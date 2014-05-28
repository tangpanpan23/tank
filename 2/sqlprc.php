<?php

header("Content-type:text/html;charset=utf-8");
 $conn=mysql_connect("w.rdc.sae.sina.com.cn:3307", "app_tangpanpan", "tangpanpan314");
 $db = mysql_select_db("pan_pan",$conn);
 if($conn)
	 {
		 echo "连接mysql数据库成功!";
	 }
	 else{
		 echo "连接失败!";
		 }
 
 $sql ="explain select * from t_mem ";
 $res = mysql_query($sql,$conn);
 $i=0;
 $arr = array();
 while($row =mysql_fetch_assoc($res)){
 $arr[$i++] = $row;
 };

 var_dump($arr);

?>