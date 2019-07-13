<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class Domain extends Base
{
    public $_param;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
    }

    public function index()
    {
        $domain = Env::get('domain.url');
        $domain = explode(",",$domain);
        $res['code']  = 1;
        $res['msg']   = "数据列表";
        $res['info']  = ['domain'=>$domain[rand(0,count($domain)-1)]];

        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode($res);
    }
}
