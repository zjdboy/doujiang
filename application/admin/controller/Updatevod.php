<?php
namespace app\admin\controller;
use think\Db;
use think\Cache;

class Updatevod extends Base
{
    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
    }

    public function index()
    {
      echo "vod更新";
      exit();
    }

    public function vod($pp=[])
    {
      $where = [];
      $order = "vod_id DESC";
      $res = model('Vod')->listData($where,$order);
      $max_vod_id = $res['list'][0]['vod_id'];

      for ($i=$max_vod_id+1; $i < $max_vod_id+1+20; $i++) {
        $ret = $this->get_vod($i);
        $ret['info']['vod_id'] = 0;
        if($ret['info']['vod_id'] > 0){
          $data = [];
          $data['vod_id'] = $ret['info']['vod_id'];
          $data['type_id'] = $ret['info']['type_id'];
          $data['vod_name'] = $ret['info']['vod_name'];
          $data['vod_en'] = $ret['info']['vod_en'];
          $data['vod_status'] = $ret['info']['vod_status'];
          $data['vod_letter'] = $ret['info']['vod_letter'];
          $data['vod_tag'] = $ret['info']['vod_tag'];
          $data['vod_pic'] = $ret['info']['vod_pic'];
          $data['vod_pic_thumb'] = $ret['info']['vod_pic_thumb'];
          $data['vod_pic_slide'] = $ret['info']['vod_pic_slide'];
          $data['vod_blurb'] = $ret['info']['vod_blurb'];
          $data['vod_area'] = $ret['info']['vod_area'];
          $data['vod_lang'] = $ret['info']['vod_lang'];
          $data['vod_year'] = $ret['info']['vod_year'];
          $data['vod_version'] = $ret['info']['vod_version'];
          $data['vod_state'] = $ret['info']['vod_state'];
          $data['vod_isend'] = $ret['info']['vod_isend'];
          $data['vod_content'] = $ret['info']['vod_content'];
          $data['vod_play_url'] = $ret['info']['vod_play_url'];
          model('Vod')->saveData($data);  
        }
      }


      echo "<pre>";
      print_r($max_vod_id);
      exit();
    }

    public function get_vod($vod_id){
      $ch = curl_init();
      $url = "https://api.youtiao.live/vod/info?vod_id=".$vod_id; //调用接口地址
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
      curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
      curl_setopt($ch, CURLOPT_HEADER, FALSE);
      $res = curl_exec($ch);
      curl_close($ch);
      $res_decode = json_decode($res,true);
      return $res_decode;
    }
}
