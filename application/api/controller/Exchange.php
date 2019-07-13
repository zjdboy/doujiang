<?php
namespace app\api\controller;

use think\Controller;
use think\Cache;
use think\Env;

class exchange extends Base
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

    //兑换
    public function index()
    {
        if (Request()->isPost()) {
            $code = $this->_param['code'];
            if(empty($code)){
              return json_encode(['code'=>1001,'msg'=>'兑换码必传！']);
            }

            $where = [];
            $where['card_no'] = ['eq',$code];
            $where['user_id'] = ['eq',0];
            $card = model('Card')->infoData($where);

            if($card['code'] != 1){
              return json_encode(['code'=>1002,'msg'=>'兑换码不存在！']);
            }

            $where=[];
            $where['user_id'] = ['eq',$this->info['user_id']];
            $data = model('User')->infoData($where);

            $where=[];
            $where['user_id'] = ['eq',$this->info['user_id']];
            $res = model('User')->fieldData($where,'user_play_num',$data['user_play_num'] + 3);

            $where=[];
            $where['card_id'] = ['eq',$card['info']['card_id']];
            model('Card')->fieldData($where, 'user_id', $this->info['user_id']);
            model('Card')->fieldData($where, 'card_use_time', time());
            model('Card')->fieldData($where, 'card_use_status', 1);
            return json_encode(['code'=>1,'msg'=>'兑换成功！']);
        }
    }
}
