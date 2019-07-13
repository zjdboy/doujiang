<?php
namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Cache;
use think\Env;

class Vod extends Base
{
    public $_param;
    public $info;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
    }

    //视频列表
    public function index()
    {
        $this->_param['page']   = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit']  = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $this->_param['type_id']   = intval($this->_param['type_id']);
        $this->_param['by']   = $this->_param['by'];

        $where=[];
        if ($this->_param['type_id'] > 0) {
            $where = ['type_id' => $this->_param['type_id']];
        }

        if ($this->_param['by'] == 'new') {
            $order='vod_time_add desc';
        } elseif ($this->_param['by'] == 'hit') {
            $order='vod_hits desc';
        } elseif ($this->_param['by'] == 'play') {
            $order='vod_up desc';
        } else {
            $order='vod_hits,vod_up,vod_time_add desc';
        }

        $list = model('Vod')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);

        $res['code']  = $list['code'];
        $res['msg']   = $list['msg'];
        $res['info']  = [];

        $data1=[];
        $data2=[];

        if (count($list['list'])>0) {
            foreach ($list['list'] as $key => $value) {
                $data1['vod_id']    = $value['vod_id'];
                $data1['vod_name']  = $value['vod_name'];
                $data1['vod_score'] = $value['vod_score'];
                $data1['vod_hits']  = $value['vod_hits'];
                $data1['vod_up']    = $value['vod_up'];
                $data1['vod_pic']   = Env::get('upload.upload_domain').$value['vod_pic'];
                $data1['vod_pic_thumb'] = Env::get('upload.upload_domain').$value['vod_pic_thumb'];

                $data2[$key] = $data1;
            }

            //分类
            $where=[];

            $data3=[];
            $data4=[];

            $where['type_mid'] = ['eq','1'];
            $where['type_pid'] = ['eq','0'];
            $order='type_sort asc';

            $class = model('Type')->listData($where, $order);

            if (count($class['list'])>0) {
                foreach ($class['list'] as $key => $value) {
                    $data3['type_id']   = $value['type_id'];
                    $data3['type_name'] = $value['type_name'];
                    $data3['type_pic']  = Env::get('upload.upload_domain').$value['type_pic'];
                    $data4[] = $data3;
                }
            }

            $class = $data1;

            $res['info'] = [
            "page"      => $list['page'],
            "pagecount" => $list['pagecount'],
            "limit"     => $list['limit'],
            "total"     => $list['total'],
            "list"      => $data2,
            "class"     => $data4
          ];
        }
        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode($res);
    }

    //视频详情
    public function detail()
    {

        $header = Request::instance()->header();
        $token = $this->_param['token'];
        $header['authorization'] = !empty($token) ? $token : $header['authorization'];

        if(!empty($header['authorization'])){
          $this->checkToken();
          $this->info = $this->authinfo();

          $where=[];
          $where['user_id'] = ['eq',$this->info['user_id']];
          $data = model('User')->infoData($where);

          if($data['info']['user_play_update'] != date("Y-m-d",time())){
            $where=[];
            $where['user_id'] = ['eq',$this->info['user_id']];
            model('User')->fieldData($where, 'user_play_nums', $data['info']['user_play_num']);
            model('User')->fieldData($where, 'user_cahce_nums', $data['info']['user_cahce_num']);
            model('User')->fieldData($where, 'user_play_update', date("Y-m-d",time()));
            $data = model('User')->infoData($where);
          }
        }

        $this->_param['vod_id']   = intval($this->_param['vod_id']);

        $where = [];

        if (is_numeric($this->_param['vod_id'])) {
            $where['vod_id'] = ['eq',$this->_param['vod_id']];
        }

        $where['vod_status'] = ['eq',1];

        $data = model('Vod')->infoData($where, '*', 1);
        $detail['vod_id'] = $data['info']['vod_id'];
        $detail['vod_name'] = $data['info']['vod_name'];

        $detail['vod_content'] = strip_tags($data['info']['vod_content']);
        $detail['vod_blurb'] = strip_tags($data['info']['vod_blurb']);

        $detail['vod_sub'] = $data['info']['vod_sub'];
        $detail['vod_pic'] = Env::get('upload.upload_domain').$data['info']['vod_pic'];
        $detail['vod_pic_thumb'] = Env::get('upload.upload_domain').$data['info']['vod_pic_thumb'];
        $detail['vod_hits'] = $data['info']['vod_hits'];
        $detail['vod_score'] = $data['info']['vod_score'];
        $detail['vod_up'] = $data['info']['vod_up'];
        $detail['vod_tag'] = $data['info']['vod_tag'];
        $detail['vod_play_url'] = $data['info']['vod_play_url'];

        $is_score = Cache::get("score_".$this->info['user_id'].'_'.$detail['vod_id']);
        $detail['is_score'] = intval($is_score) > 0 ? $is_score : 0;
        $is_digg = Cache::get("digg_".$this->info['user_id'].'_'.$detail['vod_id'].'_1');
        $detail['is_digg'] = intval($is_digg) > 0 ? $is_digg : 0;

        $cache_key_user_play_nums = "cache_key_user_play_nums_".$detail['vod_id'].'_'.$this->info['user_id'].'_'.date("Y-m-d",time());
        $key_user_play_nums = Cache::get($cache_key_user_play_nums);
        if(!$key_user_play_nums){
          if($this->info['user_id'] > 0){
            $where=[];
            $where['user_id'] = ['eq',$this->info['user_id']];
            $data = model('User')->infoData($where);

            $where=[];
            $where['user_id'] = ['eq',$this->info['user_id']];
            $play_nums = $data['info']['user_play_nums'] - 1;
            $play_nums < 0 && $play_nums = 0;
            $res = model('User')->fieldData($where,'user_play_nums',$play_nums);
          }
          Cache::set($cache_key_user_play_nums, 1, 3600*24);
        }


        if ($data['code'] == 1) {
            $res['code']    = $data['code'];
            $res['msg']     = $data['msg'];
            $res['info']['detail']    = $detail;
        }

        //喜欢
        $where=[];
        //$where['type_id'] = ['eq',$data['info']['type_id']];
        $order = 'vod_time_add desc';
        $data = model('vod')->listData(json_encode($where), $order, 1, 20);
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => &$value) {
                $data1[$key]['vod_id'] = $value['vod_id'];
                $data1[$key]['vod_name'] = $value['vod_name'];
                $data1[$key]['vod_score'] = $value['vod_score'];
                $data1[$key]['vod_hits'] = $value['vod_hits'];
                $data1[$key]['vod_pic'] = Env::get('upload.upload_domain').$value['vod_pic'];
                $data1[$key]['vod_pic_thumb'] = Env::get('upload.upload_domain').$value['vod_pic_thumb'];
                $data1[$key]['vod_time_add'] = $value['vod_time_add'];
            }
        }
        shuffle($data1);
        $res['info']['love'] = $data1;

        //评论
        $where = [];
        $where['comment_rid'] = ['eq',$this->_param['vod_id']];
        $where['comment_pid'] = ['eq',0];
        $order = 'comment_time desc';
        $data = model('comment')->listData(json_encode($where), $order, 1, 20);
        $data1 = [];
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => &$value) {
                unset($value['data']);
                $value['user_portrait'] = Env::get('upload.upload_domain').$value['user_portrait'];
                foreach ($value['sub'] as $key1 => &$value1) {
                    $value1['user_portrait'] = Env::get('upload.upload_domain').$value1['user_portrait'];
                }
            }
        }
        $res['info']['comment'] = $data['list'];

        //广告位
        $where = [];
        $where['ad_type'] = 13;
        $order = 'ad_id DESC';
        $data = model('Ad')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);
        !empty($data['list'][0]['ad_img']) && $data['list'][0]['ad_img'] = Env::get('upload.upload_domain').$data['list'][0]['ad_img'];
        $res['info']['ad']  = count($data['list'])>0 ? $data['list'][0] : [];


        // echo "<pre>";
        // print_r($res);
        // exit();

        //备用
        $where = [];
        $where['ulog_mid']  = 1;
        $where['ulog_rid']  = intval($this->_param['vod_id']);
        $where['user_id']   = $this->info['user_id'];
        $is_ulog = model('Ulog')->infoData($where);

        if($is_ulog['code'] != 1){
          $data1 = [];
          $data1['ulog_mid']   = 1;
          $data1['ulog_rid']   = intval($this->_param['vod_id']);
          $data1['ulog_type']  = 4;
          $data1['ulog_sid']   = 0;
          $data1['ulog_nid']   = 0;
          $data1['user_id']    = $this->info['user_id'];
          model('Ulog')->saveData($data1);
        }

        $id = $this->_param['id'];

        //设备 ID
        if(!empty($id)){
          $where=[];
          $where['id'] = ['eq',$id];
          $data = model('Id')->infoData($where);

          $where=[];
          $where['id'] = ['eq',$id];
          $play_nums = intval($data['info']['play_nums']);
          $play_nums <= 0 && $play_nums = 0;
          $play_nums > 0 && model('Id')->fieldData($where,'play_nums',$play_nums-1);
        }

        return json_encode($res);
    }

    public function score()
    {
        $this->checkToken();
        $this->info = $this->authinfo();

        $id = $this->_param['id'];
        $mid = $this->_param['mid'];
        $score = $this->_param['score'];

        if($score > 10){
          return json(['code'=>1002,'msg'=>'评分不能大于10']);
        }

        if (empty($id) ||  !in_array($mid, ['1','2','3','8','9'])) {
            return json(['code'=>1001,'msg'=>'参数错误']);
        }

        $mids = [1=>'vod',2=>'art',3=>'topic',8=>'actor',9=>'role'];
        $pre = $mids[$mid];
        $where = [];
        $where[$pre.'_id'] = $id;
        $field = $pre.'_score,'.$pre.'_score_num,'.$pre.'_score_all';
        $model = model($pre);

        $res = $model->infoData($where, $field);
        if ($res['code']>1) {
            return json($res);
        }
        $info = $res['info'];

        if ($info) {
            if ($score) {
                $update=[];
                $update[$pre.'_score_num'] = $info[$pre.'_score_num']+1;
                $update[$pre.'_score_all'] = $info[$pre.'_score_all']+$score;
                $update[$pre.'_score'] = number_format($update[$pre.'_score_all'] / $update[$pre.'_score_num'], 1, '.', '');
                $update[$pre.'_score'] > 10 && $update[$pre.'_score'] = 9.1;
                $model->where($where)->update($update);

                $data['score'] = $update[$pre.'_score'];
                $data['score_num'] = $update[$pre.'_score_num'];
                $data['score_all'] = $update[$pre.'_score_all'];
            } else {
                $data['score'] = $info[$pre.'_score'];
                $data['score_num'] = $info[$pre.'_score_num'];
                $data['score_all'] = $info[$pre.'_score_all'];
            }
        } else {
            $data['score'] = 0.0;
            $data['score_num'] = 0;
            $data['score_all'] = 0;
        }

        Cache::set("score_".$this->info['user_id'].'_'.$id, 1, 3600*24*30);

        //评分加1次观影
        $play_key = Cache::get("play_".date("Y-m-d",time()).'_'.$this->info['user_id']);
        if(!$play_key){
          $where=[];
          $where['user_id'] = ['eq',$this->info['user_id']];
          $data_info = model('User')->infoData($where);
          $where = [];
          $where['user_id'] = $this->info['user_id'];
          model('User')->fieldData($where, 'user_play_nums', $data_info['info']['user_play_nums']+1);
          Cache::set("play_".date("Y-m-d",time()).'_'.$this->info['user_id'], 1, 3600*24);
        }

        return json_encode(['code'=>1,'msg'=>'感谢您的参与，评分成功！','info'=>$data]);
    }

    public function info(){
      $where = [];
      $where['vod_id'] = $this->_param['vod_id'];
      $ret = model('Vod')->infoData($where, '*', 1);
      return json_encode($ret);
    }
}
