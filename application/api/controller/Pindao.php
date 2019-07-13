<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class Pindao extends Base
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


    public function index()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);


        $where = [];
        $where['type_id'] = ['eq',0];
        $data = model('Topic')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']  = [];

        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $data1['topic_id']        = $value['topic_id'];
                $data1['topic_name']      = $value['topic_name'];
                $data1['topic_content']   = $value['topic_content'];
                $data1['topic_pic']       = Env::get('upload.upload_domain').$value['topic_pic'];
                $data1['topic_pic_thumb'] = Env::get('upload.upload_domain').$value['topic_pic_thumb'];
                $data1['topic_vod_total'] = count(explode(",", $value['topic_rel_vod']));
                empty($value['topic_rel_vod']) && $data1['topic_vod_total'] = 0;
                $list[] = $data1;
            }
        }

        $res['info']['topic']             = $list;


        //专题
        $where = [];
        $where['type_id'] = ['in',"1,2,3,4,5,6,7"];
        $data1 = [];
        $data2 = [];
        $order = "topic_hits DESC";
        $type_class = ['A罩杯','B罩杯','C罩杯','D罩杯','E罩杯','F罩杯'];

        $data = model('Topic')->listData(json_encode($where), $order, 1, 20);
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $where = [];
                $where['topic_id'] = ['eq',$value['topic_id']];
                $res1 = model('Topic')->infoData($where, '*', 1);
                unset($res1['info']['topic_extend']);
                unset($res1['info']['art_list']);

                $data1['topic_id'] = $res1['info']['topic_id'];
                $data1['topic_name'] = $res1['info']['topic_name'];
                $data1['topic_pic'] = Env::get('upload.upload_domain').$res1['info']['topic_pic'];
                $data1['topic_pic_thumb'] = Env::get('upload.upload_domain').$res1['info']['topic_pic_thumb'];
                $data1['type_class'] = $type_class[$res1['info']['type_id']];

                if (count($res1['info']['vod_list'])>0) {
                    foreach ($res1['info']['vod_list'] as $key1 => $value1) {
                        $data2[$key1]['vod_id'] = $value1['vod_id'];
                        $data2[$key1]['vod_name'] = $value1['vod_name'];
                        $data2[$key1]['vod_pic'] = Env::get('upload.upload_domain').$value1['vod_pic'];
                        $data2[$key1]['vod_pic_thumb'] = Env::get('upload.upload_domain').$value1['vod_pic_thumb'];
                        $data2[$key1]['vod_score'] = $value1['vod_score'];
                        $data2[$key1]['vod_hits'] = $value1['vod_hits'];
                        $data2[$key1]['vod_time_add'] = $value1['vod_time_add'];
                    }
                }
                $data1['topic_vod_total'] = count($data2);
                $data1['list'] = $data2;
                $data2 = [];
                $data9[] = $data1;
            }
        }

        $res['info']['nuyou']             = $data9;

        // echo "<pre>";
        // print_r($res);
        // exit();

        return json_encode($res);
    }
}
