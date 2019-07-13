<?php
namespace app\api\controller;

use think\Controller;
use think\Env;
use think\Cache;

class Message extends Base
{
    public $_param;
    public $info;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
        $this->checkToken();
        $this->info = $this->authinfo();
    }

    public function index(){
      $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
      $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);

      //评论
      $where = [];
      $where['user_id'] = ['eq',$this->info['user_id']];
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
                  $data1[] = $value1;
              }
          }
      }

      $res['code'] = $data['code'];
      $res['msg'] = $data['msg'];

      $res['info']['page']      = 1;
      $res['info']['pagecount'] = 1;
      $res['info']['limit']     = 20;
      $res['info']['total']     = count($data1);

      $res['info']['list'] = $data1;

      //Cache::set("message_".$data['info']['user_id'], 0, 3600*24*30);

      // echo "<pre>";
      // print_r($res);
      // exit();
      return json_encode($res);
    }

    //我的消息
    // public function index()
    // {
    //     if (Request()->isPost()) {
    //         $res = model('Gbook')->saveData($this->_param);
    //         return json_encode($res);
    //     }
    //     $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
    //     $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
    //     $where = [];
    //     $data = model('Gbook')->listData(json_encode($where), [], $this->_param['page'], $this->_param['limit']);
    //
    //     $res['code']  = $data['code'];
    //     $res['msg']   = $data['msg'];
    //     $res['info']  = [];
    //
    //     if (count($data['list'])>0) {
    //         foreach ($data['list'] as $key => $value) {
    //             $value['user_portrait'] = Env::get('upload.upload_domain').$value['user_portrait'];
    //             $data1['list'][$key] = $value;
    //         }
    //         $res['info'] = [
    //         "page"      => $data['page'],
    //         "pagecount" => $data['pagecount'],
    //         "limit"     => $data['limit'],
    //         "total"     => $data['total'],
    //         "list"      => $data1['list']
    //       ];
    //     }
    //     // echo "<pre>";
    //     // print_r($res);
    //     // exit();
    //     return json_encode($res);
    // }
}
