<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, x-requested-with');


class Withdraw extends Base
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
        if (Request()->isPost()) {
            $this->_param['user_id'] = $this->info['user_id'];
            $this->_param['bank_branch'] = $this->info['pro'] . $this->info['city'] . $this->info['address'];
            $res = model('Withdraw')->saveData($this->_param);
            return json_encode($res);
        }
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $where = [];

        $admin = Env::get('agent.admin_id', '1');
        $admin = explode(',', $admin);
        if (!in_array($this->info['user_id'], $admin)) {
            $where = ["user_id" => $this->info['user_id']];
        }
        $order = "id DESC";
        $data = model('Withdraw')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);

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

    public function setstatus()
    {
        if (Request()->isPost()) {
            $admin = Env::get('agent.admin_id', '1');
            $admin = explode(',', $admin);
            if (!in_array($this->info['user_id'], $admin)) {
                return json_encode(['code' => 1001,'msg' => '无权限管理']);
            }
            $where=[];
            $where = ['id' => $this->_param['id']];
            $col = 'status';
            $val = $this->_param['status'];

            $res = model('Withdraw')->fieldData($where, $col, $val);

            if ($val == 2 && $res['code'] == 1) {
                $col = 'remark';
                $val = $this->_param['remark'];
                model('Withdraw')->fieldData($where, $col, $val);
            }
            return json_encode($res);
        }
    }
}
