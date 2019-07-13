<?php
namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Cache;
use think\Env;

class Reward extends Base
{
    public $_param;
    public $info;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
    }

    public function index()
    {
      $header = Request::instance()->header();
      $token = $this->_param['token'];
      $header['authorization'] = !empty($token) ? $token : $header['authorization'];

      if (!empty($header['authorization'])) {
          $this->checkToken();
          $this->info = $this->authinfo();

        $where=[];
        $where['user_id'] = ['eq',$this->info['user_id']];
        $info = model('User')->infoData($where);

        if($info['info']['user_play_update'] != date("Y-m-d",time())){
          $where=[];
          $where['user_id'] = ['eq',$this->info['user_id']];
          model('User')->fieldData($where, 'user_play_nums', $info['info']['user_play_nums']);
          model('User')->fieldData($where, 'user_cahce_nums', $info['info']['user_cahce_num']);
          model('User')->fieldData($where, 'user_play_update', date("Y-m-d",time()));
          $data = model('User')->infoData($where);
        }

        $where=[];
        $where['user_pid'] = ['eq',$this->info['user_id']];
        $reward_count = model('User')->countData($where);
        if($this->check_phone($info['info']['user_name'])){
          $name_task = 0;
          $phone_task = 1;
        }else{
          $name_task = 1;
          $phone_task = 0;
        }

        $res = [
        'user_reward' => $info['info']['user_reward'],
        'user_play_num' => $info['info']['user_play_num'],
        'user_play_nums' => $info['info']['user_play_nums'],
        'user_cahce_num' => $info['info']['user_cahce_num'],
        'user_cahce_nums' => $info['info']['user_cahce_nums'],
        'ads_task' => (int)Cache::get("ad_login_play_".date("Y-m-d",time()).'_'.$this->info['user_id']),
        'score_task' => (int)Cache::get("play_".date("Y-m-d",time()).'_'.$this->info['user_id']),
        'qr_task' => (int)Cache::get("qr_login_play_".$this->info['user_id']),
        'reward_task' => (int)$reward_count,
        'name_task' =>$name_task,
        'phone_task'=> $phone_task,
        'reward_code_task'=> $info['info']['user_pid']>0 ? 1 :0,
      ];
    }else{
        $id = $this->_param['id'];
        if (empty($id)) {
            return json_encode(['code' => 1001,'msg' => '设备ID不存在']);
        }
        $where=[];
        $where['id'] = ['eq',$id];
        $info = model('Id')->infoData($where);
        $res = [
        'user_reward' => $info['info']['user_reward'],
        'user_play_num' => $info['info']['play_num'],
        'user_play_nums' => $info['info']['play_nums'],
        'user_cahce_num' => $info['info']['cahce_num'],
        'user_cahce_nums' => $info['info']['cahce_nums'],
        'ads_task' => (int)Cache::get("ad_login_play_".date("Y-m-d",time()).'_'.$id),
        'score_task' => (int)Cache::get("play_".date("Y-m-d",time()).'_'.$id),
        'qr_task' => (int)Cache::get("qr_login_play_".$id),
        'reward_task' => 0,
        'name_task' => 0,
        'phone_task'=> 0,
        'reward_code_task'=> 0,
      ];
    }
      // echo "<pre>";
      // print_r($res);
      // exit();
        return json_encode(['code' => 1,'msg' => '我的推广告信息','info' => $res]);
    }

    public function qr()
    {
        $this->checkToken();
        $this->info = $this->authinfo();
        $where=[];
        $where['user_id'] = ['eq',$this->info['user_id']];
        $info = model('User')->infoData($where);

        $_save_path = Env::get('upload.upload_dir') . '/qr/';
        if (!file_exists($_save_path)) {
            mac_mkdirss($_save_path);
        }
        \PHPQRCode\QRcode::png($info['info']['user_reward'], $_save_path.$this->info['user_id'].'.jpg', 'L', 4, 2);

        $res = [
        'user_reward' => $info['info']['user_reward'],
        'user_reward_qr' => Env::get('upload.upload_domain'). '/qr/' .$this->info['user_id'].'.jpg',
      ];


        return json_encode(['code' => 1,'msg' => '推广二维码','info' => $res]);
    }

    //我的推广
    public function list()
    {
        $this->checkToken();
        $this->info = $this->authinfo();
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);

        $where = [];
        if ($this->_param['level']=='2') {
            $where['user_pid_2'] = ['eq',$this->info['user_id']];
        } elseif ($this->_param['level']=='3') {
            $where['user_pid_3'] = ['eq',$this->info['user_id']];
        } else {
            $where['user_pid'] = ['eq',$this->info['user_id']];
        }

        $order = 'user_id desc';
        $data = model('User')->listData($where, $order, $this->_param['page'], $this->_param['limit']);

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']  = [];

        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $value1['user_name'] = $value['user_name'];
                $value1['user_reg_time'] = $value['user_reg_time'];
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
    function check_phone($phone){
        $check = '/^(1(([35789][0-9])|(47)))\d{8}$/';
        if (preg_match($check, $phone)) {
            return true;
        } else {
            return false;
        }
    }
}
