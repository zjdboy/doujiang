<?php
namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Cache;
use think\Env;

class Ret extends Base
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

      $header = Request::instance()->header();
      $token = $this->_param['token'];
      $header['authorization'] = !empty($token) ? $token : $header['authorization'];

      if (!empty($header['authorization'])) {
          $this->checkToken();
          $this->info = $this->authinfo();

          //评分加1次观影
          $play_key = Cache::get("ad_login_play_".date("Y-m-d",time()).'_'.$this->info['user_id']);
          if (!$play_key) {
              $where=[];
              $where['user_id'] = ['eq',$this->info['user_id']];
              $data = model('User')->infoData($where);
              $where = [];
              $where['user_id'] = $this->info['user_id'];
              model('User')->fieldData($where, 'user_play_nums', $data['info']['user_play_nums']+1);
              Cache::set("ad_login_play_".date("Y-m-d",time()).'_'.$this->info['user_id'], 1, 3600*24);
          }

        }else{
          $id = $this->_param['id'];
          if(!empty($id)){
            //评分加1次观影
            $play_key = Cache::get("ad_login_play_".date("Y-m-d",time()).'_'.$id);
            if (!$play_key) {
                $where=[];
                $where['id'] = ['eq',$id];
                $data = model('Id')->infoData($where);
                $where = [];
                $where['id'] = $id;
                model('Id')->fieldData($where, 'play_nums', $data['info']['play_nums']+1);
                Cache::set("ad_login_play_".date("Y-m-d",time()).'_'.$id, 1, 3600*24);
            }
          }
        }
      header("Location: ".$this->_param['url']);
      exit();
    }
}
