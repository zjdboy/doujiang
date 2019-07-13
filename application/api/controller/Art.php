<?php
namespace app\api\controller;

use think\Controller;

class Art extends Base
{
    public $_param;
    public $info;

    public function __construct()
    {
        parent::__construct();
        //$this->checkToken();
        $this->_param = input();
        //$this->info = $this->authinfo();
    }

    //我的消息
    public function index()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $where = [];
        $data = model('Art')->listData(json_encode($where), [], $this->_param['page'], $this->_param['limit']);

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']  = [];

        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $data1['list'][$key]['art_id'] = $value['art_id'];
                $data1['list'][$key]['art_name'] = $value['art_name'];
                $data1['list'][$key]['art_content'] = strip_tags($value['art_content']);
                $data1['list'][$key]['art_time_add'] = $value['art_time_add'];
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

    public function detail()
    {
        $this->_param['id'] = intval($this->_param['id']);
        return json_encode(['code' => 1, 'msg' => '获取信息成功', 'info' => []]);
    }
}
