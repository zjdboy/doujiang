<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class plays extends Base
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

    //我的喜欢
    public function index()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);

        $where = [];
        $where['user_id'] = $this->info['user_id'];
        $where['ulog_mid'] = 1;
        $where['ulog_type'] = 4;
        $order = 'ulog_id desc';
        $data = model('Ulog')->listData($where, $order, $this->_param['page'], $this->_param['limit']);
        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']  = [];
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => &$value) {
                $value['data']['pic'] = Env::get('upload.upload_domain').$value['data']['pic'];
                $data['list'][$key] = $value['data'];
                unset($data['list'][$key]['link']);
                unset($data['list'][$key]['type']);
                if($data['list'][$key]['id'] <= 0){
                  unset($data['list'][$key]);
                }
            }
            $res['info'] = [
            "page"      => $data['page'],
            "pagecount" => $data['pagecount'],
            "limit"     => $data['limit'],
            "total"     => count($data['list']),
            "list"      => $data['list']
          ];
        }

        // echo "<pre>";
        // print_r($data);
        // exit();
        return json_encode($res);
    }

    public function del()
    {
        $param = input();
        $ids = $param['ids'];
        $type = $param['type'];
        $all = $param['all'];

        if (!in_array($type, array('1', '2', '3', '4', '5'))) {
            return json(['code' => 1001, 'msg' => '参数错误']);
        }

        if (empty($ids) && empty($all)) {
            return json(['code' => 1001, 'msg' => '参数错误']);
        }

        $arr = [];
        $ids = explode(',', $ids);
        foreach ($ids as $k => $v) {
            $v = intval(abs($v));
            $arr[$v] = $v;
        }

        $where = [];
        $where['user_id'] = $this->info['user_id'];
        $where['ulog_type'] = $type;
        if ($all != '1') {
            $where['ulog_rid'] = array('in', implode(',', $arr));
        }
        $return = model('Ulog')->delData($where);
        return json($return);
    }
}
