<?

header("Content-type:text/html;charset=utf-8");

echo "用户名   :".SAE_MYSQL_USER."/n/r";

echo "密码     :".SAE_MYSQL_PASS."/r/n";

echo "主库域名:".SAE_MYSQL_HOST_M."/r/n";

               echo "从库域名:".SAE_MYSQL_HOST_S;

               echo "端口     :".SAE_MYSQL_PORT;

               echo "数据库名:".SAE_MYSQL_DB;

  ?>