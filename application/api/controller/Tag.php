<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class Tag extends Base
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

    //搜搜
    public function index()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $this->_param['tag'] = $this->_param['tag'];
        $this->_param['by'] = $this->_param['by'];

        $where = [];

        if (!empty($this->_param['tag'])) {
            $param['tag'] = urldecode($this->_param['tag']);
            $where['vod_tag'] = ['like','%'.$this->_param['tag'].'%'];
        }

        if (!empty($param['by'])) {
            if ($param['by'] == 'new') {
                $order='vod_time_add desc';
            } elseif ($param['by'] == 'hit') {
                $order='vod_hits desc';
            } elseif ($param['by'] == 'play') {
                $order='vod_score desc';
            }
        }

        $data = model('Vod')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']  = [];

        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $value1['vod_id'] = $value['vod_id'];
                $value1['vod_name'] = $value['vod_name'];
                $value1['vod_pic'] = Env::get('upload.upload_domain').$value['vod_pic'];
                $value1['vod_pic_thumb'] = Env::get('upload.upload_domain').$value['vod_pic_thumb'];
                $value1['vod_hits'] = $value['vod_hits'];
                $value1['vod_up'] = $value['vod_up'];
                $value1['vod_score'] = $value['vod_score'];
                $data1['list'][$key] = $value1;
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
