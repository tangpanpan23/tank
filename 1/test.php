<?php

function t ($arr,$table) {
    
    /*    insert into tbname (username,passwd,email) values ('',)
   */
    /// 把所有的键名用','接起来
    // implode(',',array_keys($arr));
    // implode("','",array_values($arr));
    if(!is_array($arr)) {
        return false;
    }

    $sql = 'insert into ' . $table . ' (' . implode(',',array_keys($arr)) . ')';
    $sql .= ' values (\'';
    $sql .= implode("','",array_values($arr));
    $sql .= '\')';

    return $sql;
}


$arr =  array('username'=>'aaaa','pwd'=>'111111','email'=>'aa@a.com');

print_r(t($arr,'dsafd'));
