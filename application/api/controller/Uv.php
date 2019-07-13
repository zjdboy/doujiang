<?php
namespace app\api\controller;

use think\Controller;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, x-requested-with');


class Uv extends Base
{
    public $_param;
    public $info;

    public function __construct()
    {
        parent::__construct();
        $this->checkToken();
        $this->_param = input();
        $this->info = $this->authinfo();
    }

    public function index()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $where = ["user_id" => $this->info['user_id']];
        $data = model('Uv')->listData(json_encode($where), [], $this->_param['page'], $this->_param['limit']);

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']  = [];

        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $data1['list'][$key] = $value;
            }
            $res['info'] = [
          "page"      => $data['page'],
          "pagecount" => $data['pagecount'],
          "limit"     => $data['limit'],
          "total"     => $data['total'],
          "list"      => $data1['list']
        ];
        }
        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode($res);
    }
}
