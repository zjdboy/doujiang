<?php
namespace app\api\controller;

use think\Controller;
use think\Cache;
use think\Env;

class Comment extends Base
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

    //评估
    public function index()
    {
        if (Request()->isPost()) {
            $ip = sprintf('%u', ip2long(request()->ip()));
            if ($ip>2147483647) {
                $ip=0;
            }
            $this->_param['comment_ip'] = $ip;

            $this->_param['comment_name'] = !empty($this->info['user_nick_name']) ? $this->info['user_nick_name'] : $this->info['user_name'];
            $this->_param['user_id'] = $this->info['user_id'];

            // echo "<pre>";
            // print_r($this->_param);
            // exit();
            $res = model('Comment')->saveData($this->_param);

            //评分加1次观影
            $play_key = Cache::get("comment_login_play_".$this->_param['user_id']);
            if (!$play_key) {
                $where=[];
                $where['user_id'] = ['eq',$this->_param['user_id']];
                $data = model('User')->infoData($where);
                $where = [];
                $where['user_id'] = $this->_param['user_id'];
                model('User')->fieldData($where, 'user_play_nums', $data['info']['user_play_nums']+1);
                Cache::set("comment_login_play_".$this->_param['user_id'], 1, 3600*24);
            }

            return json_encode($res);
        }
    }

    //回复
    public function reply()
    {
        if (Request()->isPost()) {
            $this->_param['comment_pid']    = $this->_param['comment_pid'];
            $this->_param['comment_content']    = $this->_param['reply_content'];

            $where = [];
            $where['comment_id'] = ['eq',$this->_param['comment_pid']];
            $data = model('Comment')->infoData($where);

            $this->_param['comment_mid']    = $data['info']['comment_mid'];
            $this->_param['comment_rid']    = $data['info']['comment_rid'];

            $ip = sprintf('%u', ip2long(request()->ip()));
            if ($ip>2147483647) {
                $ip=0;
            }
            $this->_param['comment_ip'] = $ip;

            $this->_param['comment_name'] = !empty($this->info['user_nick_name']) ? $this->info['user_nick_name'] : $this->info['user_name'];
            $this->_param['user_id'] = $this->info['user_id'];

            // echo "<pre>";
            // print_r($data['']);
            // exit();

            $res = model('Comment')->saveData($this->_param);

            if($res['code'] == 1){
              $message = Cache::get("message_".$data['info']['user_id']);
              if($message){
                Cache::set("message_".$data['info']['user_id'], $message+1, 3600*24*30);
              }else{
                Cache::set("message_".$data['info']['user_id'], 1, 3600*24*30);
              }
            }
            return json_encode($res);
        }
    }

    public function digg()
    {
        $id = $this->_param['id'];
        $mid = $this->_param['mid'];
        $type = $this->_param['type'];

        if (empty($id) ||  !in_array($mid, ['1','2','3','4','8','9'])) {
            return json_encode(['code'=>1001,'msg'=>'参数错误']);
        }

        $mids = [1=>'vod',2=>'art',3=>'topic',4=>'comment',8=>'actor',9=>'role'];
        $pre = $mids[$mid];
        $where = [];
        $where[$pre.'_id'] = $id;
        $field = $pre.'_up,'.$pre.'_down';
        $model = model($pre);

        if ($type) {
            if ($type == 'up') {
                $model->where($where)->setInc($pre.'_up');
            } elseif ($type == 'down') {
                $model->where($where)->setInc($pre.'_down');
            }
        }

        $res = $model->infoData($where, $field);
        if ($res['code']>1) {
            return json_encode($res);
        }
        $info = $res['info'];
        if ($info) {
            $data['up'] = $info[$pre.'_up'];
            $data['down'] = $info[$pre.'_down'];
        } else {
            $data['up'] = 0;
            $data['down'] = 0;
        }

        Cache::set("digg_".$this->info['user_id'].'_'.$id.'_'.$mid, 1, 3600*24*30);

        if ($type == 'up') {
            $data1 = [];
            $data1['ulog_mid']   = intval($mid);
            $data1['ulog_rid']   = intval($id);
            $data1['ulog_type']  = 2;
            $data1['ulog_sid']   = 0;
            $data1['ulog_nid']   = 0;
            $data1['user_id']    = $this->info['user_id'];
            $is_ulog = model('Ulog')->infoData($data1);
            $is_ulog['code'] != 1 && model('Ulog')->saveData($data1);
        } else {
            $where = [];
            $where['ulog_mid'] = intval($mid);
            $where['ulog_rid'] = intval($id);
            $where['user_id'] = $this->info['user_id'];
            model('Ulog')->delData($where);
        }

        return json_encode(['code'=>1,'msg'=>'操作成功！','info'=>$data]);
    }
}
