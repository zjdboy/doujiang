<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class love extends Base
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

        //喜欢
        $where=[];
        //$where['vod_level'] = ['eq',9];
        //$order = 'vod_time_add desc';
        $data = model('vod')->listData1(json_encode($where));
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => &$value) {
                $data1[$key]['id'] = $value['vod_id'];
                $data1[$key]['type'] = 0;
                $data1[$key]['name'] = $value['vod_name'];
                $data1[$key]['score'] = $value['vod_score'];
                $data1[$key]['pic'] = Env::get('upload.upload_domain').$value['vod_pic'];
                $data1[$key]['hits'] = $value['vod_hits'];
                $data1[$key]['love'] = $value['vod_up'];
                if($data1[$key]['id'] <= 0){
                  unset($data1[$key]);
                }
            }
        }

        $data_list = array_chunk($data1,4);

        foreach ($data_list as $key => &$value) {
          $where = [];
          $where['ad_type'] = 15 + $key;
          $order = 'ad_id DESC';
          $data = model('Ad')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);
          !empty($data['list'][0]['ad_img']) && $data['list'][0]['ad_img'] = Env::get('upload.upload_domain').$data['list'][0]['ad_img'];
          count($data['list'])>0 && $data['list'][0]['type'] = 1;
          count($data['list'])>0 && array_push($value,$data['list'][0]);
        }

        foreach ($data_list as $value1) {
          foreach ($value1 as $value2) {
            $topic[] = $value2;
          }
        }

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info'] = [
          "page"      => $data['page'],
          "pagecount" => $data['pagecount'],
          "limit"     => $data['limit'],
          "total"     => $data['total'],
          "list"      => $topic
        ];

        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode($res);
    }
}
