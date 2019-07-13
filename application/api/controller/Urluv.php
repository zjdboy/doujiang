<?php
namespace app\api\controller;

use think\Controller;
use think\Cache;

class Urluv extends Base
{
    public $_param;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
    }

    public function index()
    {
        $ip = sprintf('%u', ip2long(request()->ip()));
        $reward = $this->_param['reward'];

        // $cache_key = $reward.'_'.$ip;
        // $cache = Cache::get($cache_key);
        // if($cache){
        //   return json_encode(['code' => 1003, 'msg' => '同一个 IP 不能刷UV']);
        // }else{
        //   Cache::set($cache_key, 1, 3600*24*30);
        // }

        if (empty($reward)) {
            return json_encode(['code' => 1001, 'msg' => '推广码不能没有']);
        }

        $where=[];
        $where['user_reward'] = ['eq',$reward];
        $info = model('User')->infoData($where);
        $user_id = $info['info']['user_id'];
        if ($user_id<=0) {
            return json_encode(['code' => 1002, 'msg' => '找不到用户']);
        }

        $where=[];
        $where['user_id'] = ['eq',$user_id];
        $where['day'] = ['eq',date("Y-m-d", time())];
        $uv = model('Uv')->infoData($where);

        if ($uv['info']['user_id'] > 0) {
            $where=[];
            $where['user_id'] = ['eq',$user_id];
            $where['day'] = ['eq',date("Y-m-d", time())];
            model('Uv')->fieldData($where, 'uv', $uv['info']['uv']+1);
            if($uv['info']['uv'] > 10000){
              model('Uv')->fieldData($where,'money',intval($uv['info']['uv']/50));
            }
        } else {
            $data = [];
            $data['user_id']    = $user_id;
            $data['day']        = date("Y-m-d", time());
            $data['uv']         = 1;
            $data['money']      = 0;
            $data['create_at']  = date("Y-m-d H:i:s", time());
            $res = model('Uv')->saveData($data);
        }

        // 先关闭
        // $where=[];
        // $where['user_id'] = ['eq',$user_id];
        // $res = model('User')->fieldData($where,'user_money',$info['info']['user_money']+1);
        return json_encode(['code' => 1, 'msg' => 'UV']);
    }
}
