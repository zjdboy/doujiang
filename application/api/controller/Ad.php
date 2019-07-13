<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class Ad extends Base
{
    public $_param;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
    }

    //广告管理
    public function index()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $this->_param['t'] = intval($this->_param['t']);

        $res['code']  = 1;
        $res['msg']   = '广告数据';

        //启动页
        $where = [];
        $where['ad_type'] = 1;
        $order = 'ad_id DESC';
        $data = model('Ad')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);
        !empty($data['list'][0]['ad_img']) && $data['list'][0]['ad_img'] = Env::get('upload.upload_domain').$data['list'][0]['ad_img'];
        //!empty($data['list'][0]['ad_img']) && $data['list'][0]['ad_url'] = 'https://api.youtiao.live/ret?url='.$data['list'][0]['ad_url'];
        $res['info']['startup']  = count($data['list'])>0 ? $data['list'][0] : [];

        //启动页
        $where = [];
        $where['ad_type'] = 2;
        $order = 'ad_id DESC';
        $data = model('Ad')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);
        !empty($data['list'][0]['ad_img']) && $data['list'][0]['ad_img'] = Env::get('upload.upload_domain').$data['list'][0]['ad_img'];
        //!empty($data['list'][0]['ad_img']) && $data['list'][0]['ad_url'] = 'https://api.youtiao.live/ret?url='.$data['list'][0]['ad_url'];
        $res['info']['hot']  = count($data['list'])>0 ? $data['list'][0] : [];

        //启动页
        $where = [];
        $where['ad_type'] = 13;
        $order = 'ad_id DESC';
        $data = model('Ad')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);
        !empty($data['list'][0]['ad_img']) && $data['list'][0]['ad_img'] = Env::get('upload.upload_domain').$data['list'][0]['ad_img'];
        //!empty($data['list'][0]['ad_img']) && $data['list'][0]['ad_url'] = 'https://api.youtiao.live/ret?url='.$data['list'][0]['ad_url'];
        $res['info']['vod']  = count($data['list'])>0 ? $data['list'][0] : [];

        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode($res);
    }

    public function test()
    {
        model('Ad')->delTable();
    }

    public function test1(){
      $where=[];
      $id = '69de7d5d878f8917';
      $where['id'] = ['eq',$id];
      $data = model('Id')->infoData($where);
      echo "<pre>";
      print_r($data);
      exit();
    }
}
