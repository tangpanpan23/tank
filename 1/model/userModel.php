<?php
defined('ACC')||exit('Access denied');

class userModel extends Model {
    protected $table = 'user';

    public function __construct() {
        parent::__construct();
    }

    // 用户注册的方法
    public function reg($arr) {
		 $arr['pwd'] = $this->encPass($arr['pwd']);
        return $this->db->autoExecute($arr,$this->table);
    }

  //用户登录验证方法
       public function check($u,$p='') {
        if($p) {
            $sql = "select user_id,username,email from user where username = '" . $u . "' and pwd = '" . $this->encPass($p) . "'";
            return $this->db->getRow($sql);
        } else {
            $sql = "select count(*) from user where username = '" . $u ."'";
            return $this->db->getOne($sql);
        }
    }

    // 密码进行MD5加密的方法
    protected function encPass($str) {
        return md5($str);
    }
    // 显示全部会员列表
    public function userList($offset = -1,$N = 0) {
    	$sql = 'select * from user';
    	if($offset >= 0) {
    		$sql .= ' limit ' . $offset .', ' . $N;
    	}
    	$arr = $this->db->getAll($sql);
    	return $arr;
    }
    // 会员删除
    public function del($user_id) {
    	$sql1 = 'delete from user where user_id = ' . $user_id;
    	return $this->db->query($sql1);
    }
    // 返回会员数量
    public function userNum() {
    	$sql = 'select count(*) from ' . $this->table ;
    	return $this->db->getOne($sql);
          }
    
}
