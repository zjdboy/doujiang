<?php
namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Cache;
use think\Env;

class My extends Base
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
            $data = model('User')->infoData($where);

            if($data['info']['user_play_update'] != date("Y-m-d",time())){
              $where=[];
              $where['user_id'] = ['eq',$this->info['user_id']];
              model('User')->fieldData($where, 'user_play_nums', $data['info']['user_play_num']);
              model('User')->fieldData($where, 'user_cahce_nums', $data['info']['user_cahce_num']);
              model('User')->fieldData($where, 'user_play_update', date("Y-m-d",time()));
              $data = model('User')->infoData($where);
            }

            $res['user_id']           = $data['info']['user_id'];
            $res['user_name']         = $data['info']['user_name'];
            $res['user_nick_name']    = $data['info']['user_nick_name'];
            $res['user_reward']       = $data['info']['user_reward'];
            $res['user_play_num']     = $data['info']['user_play_num'];
            $res['user_play_nums']    = $data['info']['user_play_nums'];
            $res['user_cahce_num']    = $data['info']['user_cahce_num'];
            $res['user_cahce_nums']   = $data['info']['user_cahce_nums'];
            $res['id']   = $data['info']['id'];

            $message = Cache::get("message_".$this->info['user_id']);
            $res['message']           = intval($message);

            $domain = Env::get('domain.url');
            $domain = explode(",", $domain);

            $res['reward_url']        = $domain[rand(0, count($domain)-1)].'/?reward='.$data['info']['user_reward'];
            $res['group_url']         = 'https://pt.im/youtiaosp';
        } else {
            $id = $this->_param['id'];
            $jid = $this->_param['jid'];
            $os = intval($this->_param['os']);
            $osname = $this->_param['osname'];

            if (empty($id)) {
                return json_encode(['code' => 1001,'msg' => '设备ID不存在']);
            }

            $where=[];
            $where['id'] = ['eq',$id];
            $data = model('Id')->infoData($where);
            if ($data['code'] != 1) {
                $user_reward = $this->random();
                $data = [];
                $data['id'] = $id;
                $data['play_num'] = 3;
                $data['play_nums'] = 3;
                $data['user_reward'] = $user_reward;
                $data['user_play_update'] = date("Y-m-d",time());
                $data['jid']  = $jid;
                $data['os']   = $os;
                $data['osname']   = $osname;

                $data['time'] = time();
                model('Id')->saveData($data);
            }else{
              if($data['info']['play_update'] != date("Y-m-d",time())){
                $where=[];
                $where['id'] = ['eq',$id];
                model('Id')->fieldData($where, 'play_nums', $data['info']['play_num']);
                model('Id')->fieldData($where, 'play_update', date("Y-m-d",time()));

                model('Id')->fieldData($where, 'jid', $jid);
                model('Id')->fieldData($where, 'os', $os);
                model('Id')->fieldData($where, 'osname', $osname);
              }
            }

            $res = [];
            $res['user_id']           = 0;
            $res['user_name']         = '';
            $res['user_nick_name']    = '';
            $res['user_reward']       = '';
            $res['user_play_num']     = $data['code'] == 1 ? $data['info']['play_num'] : 3;
            $res['user_play_nums']    = $data['code'] == 1 ? $data['info']['play_nums'] : 3;
            $res['user_cahce_num']    = 3;
            $res['user_cahce_nums']   = 3;
            $res['id']                = $id;
            $res['message']           = 0;
            $res['user_reward']       = $data['code'] == 1 ? $data['info']['user_reward'] : $user_reward;
            $res['group_url']         = 'https://t.me/joinchat/JnBuBRXiqr-VNvkatGMZ4w';

            $domain = Env::get('domain.url');
            $domain = explode(",", $domain);

            $res['reward_url']        = $domain[rand(0, count($domain)-1)].'/?reward='.$res['user_reward'];
        }

        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode(['code' => 1,'msg' => '用户数据','info' => $res]);
    }

    public function cahce_total()
    {
        if (Request()->isPost()) {
            $this->checkToken();
            $this->info = $this->authinfo();

            $this->_param['id'] = intval($this->_param['id']);

            $where=[];
            $where['user_id'] = ['eq',$this->info['user_id']];
            $data = model('User')->infoData($where);

            $where = [];
            $where['user_id'] = $this->info['user_id'];

            if ($data['info']['user_cahce_nums'] >0) {
                $res = model('User')->fieldData($where, 'user_cahce_nums', $data['info']['user_cahce_nums']-1);
            } else {
                $res = model('User')->fieldData($where, 'user_cahce_nums', $data['info']['user_cahce_nums']);
            }
            return json_encode($res);
        }
    }

    public function play_total()
    {
        if (Request()->isPost()) {
            // $this->checkToken();
            // $this->info = $this->authinfo();

            $this->_param['id'] = $this->_param['id'];

            //评分加1次观影
            $play_key = Cache::get("qr_play_".$this->_param['id']);
            if (!$play_key) {
                // $where=[];
                // $where['user_id'] = ['eq',$this->info['user_id']];
                // $data_info = model('User')->infoData($where);
                // $where = [];
                // $where['user_id'] = $this->info['user_id'];
                // model('User')->fieldData($where, 'user_play_nums', $data_info['info']['user_play_nums']+1);

                $where=[];
                $where['id'] = ['eq',$this->_param['id']];
                $data = model('Id')->infoData($where);
                $where = [];
                $where['id'] = $this->_param['id'];
                model('Id')->fieldData($where, 'play_nums', $data_info['info']['play_nums']+1);
                Cache::set("qr_play_".$this->_param['id'], 1, 3600*24);
            }

            return json_encode(['code' => 1,'msg' => '设置成功']);
        }
    }

    public function login_play_total()
    {
        if (Request()->isPost()) {
            $this->checkToken();
            $this->info = $this->authinfo();

            $this->_param['id'] = intval($this->_param['id']);
            $this->_param['type'] = intval($this->_param['type']);

            //评分加1次观影
            $play_key = Cache::get("qr_login_play_".$this->info['user_id']);
            if (!$play_key) {
                $where=[];
                $where['user_id'] = ['eq',$this->info['user_id']];
                $data = model('User')->infoData($where);
                $where = [];
                $where['user_id'] = $this->info['user_id'];
                model('User')->fieldData($where, 'user_play_nums', $data['info']['user_play_nums']+1);
                Cache::set("qr_login_play_".$this->info['user_id'], 1, 3600*24);
            }
            return json_encode(['code' => 1,'msg' => '设置成功']);
        }
    }
}
