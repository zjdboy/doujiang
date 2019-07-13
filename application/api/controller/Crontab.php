<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class Crontab extends Base
{
    public $_param;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
    }

    public function index()
    {
      $res = model('User')->updateUser();
      return json_encode($res);
    }
}
