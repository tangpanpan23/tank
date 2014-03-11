<?php
defined('ACC')||exit('Access Denied');

// 分页类
class page {
    public $total;  // 全部条目
    public $perpage = 1;  //每页条目

    protected $curr = 1; //当前页码

    public function __construct($total,$perpage='') {
        $this->total = $total;  // 把总条目信息放在total属性
        if($perpage > 0) {
            $this->perpage = $perpage;  // 把每页数量放在perpage属性
        }

        // 计算当前页码
        if(isset($_GET['page']) && ($_GET['page'] + 0) > 0) {
            $this->curr = $_GET['page'] + 0;
        }
    }

    // 返回当前页码
    public function curr() {
        return $this->curr;
    }
       
    // 主体函数,
    public function show($yeshu='5') {
        if($this->total <=0 ) { // 不是检验合法,检验因为疏忽带来的可能错误.
             return '';   // 如果总条目<=0, 直接返回空字符串
        }
    
        $cnt = ceil($this->total / $this->perpage); // 算总页数,进一取整

        // 最终生成的url里必然有page=N
        $url = $_SERVER['REQUEST_URI'];
        $parse = parse_url($url); // 把uri的分析结果放数组里
       // 测试语句 var_dump($parse);
       // 保证参数里有page=N
        if(!isset($parse['query'])) {
            $parse['query'] = 'page=' . $this->curr;
        }

        // 把query字符串分析成数组,再次确保数组里有page选项

        parse_str($parse['query'],$parms);

        if(!array_key_exists('page',$parms)) {
            $parms['page'] = $this->curr;
        }

        //测试语句 print_r($parms);
        
        // 判断除了page之外,还有没有其他参数
        if(count($parms) == 1) {
            $url = $parse['path'] . '?';
        } else {
            unset($parms['page']);
            $url = $parse['path'] . '?' . http_build_query($parms) . '&';
        }
        
        // echo $url;
        $prev = $this->curr - 1;
        $next = $this->curr + 1;

        if($prev < 1) {
            $prevLink = '';
        } else {
            $prevLink = '<a href="' . $url . 'page=' . $prev . '">上一页</a>';
        }

        if($next > $cnt) {
            $nextLink = '';
        } else {
            $nextLink = '<a href="' . $url . 'page=' . $next . '">下一页</a>';
        }

        //测试语句 echo $prevLink,'&nbsp;',$nextLink;
        
        
        // 首页 上一页 ... -1 0 1 2 3 4 5 ... 下一页 尾页
        

        $start = $this->curr - ceil(($yeshu-1)/2); // 计算左侧开始的页码
        $end = $this->curr + ceil(($yeshu-1)/2);   // 计算右侧开始的页码
        
        $start = $start < 1 ? 1: $start;
        $end = ($start + $yeshu - 1) > $cnt ? $cnt : ($start + $yeshu- 1);

        // 把右侧超出的部分,补到左边去
        $end = $end > $cnt ? $cnt :  $end;
        $start = ($end - $yeshu + 1) < 1 ? 1 : $end - $yeshu + 1;
        
    
        //echo $start,$end;
        $pageStr = '';
        
        for($i = $start;$i <= $end;$i++) {
            if($i == $this->curr) {
                $pageStr .= $i;
                continue;
            }
            $pageStr .= '<a href="' . $url . 'page=' . $i . '">' . $i . '</a>';
        }
         
		  // 加一个首页,尾页的效果 
		  $shouye = '';
		  $weiye = '';
		  $shouye .= '<a href="' . $url . 'page=' . 1 . '">' . '首页' . '</a>';
		  $weiye  .= '<a href="' . $url . 'page=' . $cnt . '">' . '尾页' . '</a>';
        
		return  $shouye . $prevLink . $pageStr . $nextLink .$weiye ;
        
    }

}





//$page = new page(6,3);
//echo $page->curr();
//echo $page->show(4);



