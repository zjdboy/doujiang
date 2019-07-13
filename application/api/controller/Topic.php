<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class Topic extends Base
{
    public $_param;
    public $info;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
        // $this->checkToken();
        // $this->info = $this->authinfo();
    }

    //专题
    public function index()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $this->_param['by']   = $this->_param['by'];

        $where=[];
        $where['type_id'] = ['eq',0];

        if ($this->_param['by'] == 'new') {
            $order='topic_time_add desc';
        } elseif ($this->_param['by'] == 'hit') {
            $order='topic_hits desc';
        } elseif ($this->_param['by'] == 'play') {
            $order='topic_score desc';
        } else {
            $order='topic_time_add desc';
        }

        $data = model('Topic')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']  = [];

        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $data1['topic_id']        = $value['topic_id'];
                $data1['topic_name']      = $value['topic_name'];
                $data1['topic_content']   = strip_tags($value['topic_content']);
                $data1['topic_pic']       = Env::get('upload.upload_domain').$value['topic_pic'];
                $data1['topic_pic_thumb'] = Env::get('upload.upload_domain').$value['topic_pic_thumb'];
                $data1['topic_vod_total'] = count(explode(",", $value['topic_rel_vod']));
                $list[] = $data1;
            }
            $res['info'] = [
            "page"      => $data['page'],
            "pagecount" => $data['pagecount'],
            "limit"     => $data['limit'],
            "total"     => $data['total'],
            "list"      => $list
          ];
        }

        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode($res);
    }

    public function detail()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $this->_param['topic_id'] = intval($this->_param['topic_id']);

        $where = [];
        $where['topic_id'] = ['eq',$this->_param['topic_id']];
        $data = model('Topic')->infoData($where, '*', 1);

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']['topic_id']         = $data['info']['topic_id'];
        $res['info']['topic_name']       = $data['info']['topic_name'];
        $res['info']['topic_content']    = strip_tags($data['info']['topic_content']);
        $res['info']['topic_blurb']    = strip_tags($data['info']['topic_blurb']);
        $res['info']['topic_pic'][]        = Env::get('upload.upload_domain').$data['info']['topic_pic'];
        $res['info']['topic_pic_thumb']  = Env::get('upload.upload_domain').$data['info']['topic_pic_thumb'];

        $data1 = [];
        if (count($data['info']['vod_list'])>0) {
            foreach ($data['info']['vod_list'] as $key => &$value) {
                $data1['vod_id'] = $value['vod_id'];
                $data1['vod_name'] = $value['vod_name'];
                $data1['vod_pic'] = Env::get('upload.upload_domain').$value['vod_pic'];
                $res['info']['topic_pic'][] = Env::get('upload.upload_domain').$value['vod_pic'];
                $data1['vod_pic_thumb'] = Env::get('upload.upload_domain').$value['vod_pic_thumb'];
                $data1['vod_score'] = $value['vod_score'];
                $data1['vod_hits'] = $value['vod_hits'];
                $data1['vod_time_add'] = $value['vod_time_add'];
                $list[] = $data1;
            }
        }
        $res['info']['page']             = $this->_param['page'];
        $res['info']['pagecount']        = $this->_param['page'];
        $res['info']['limit']            = $this->_param['limit'];
        $res['info']['total']            = count($list);
        $res['info']['list']             = $list;

        // echo "<pre>";
        // print_r($res);
        // exit();

        return json_encode($res);
    }
}
