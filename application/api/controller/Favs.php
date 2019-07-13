<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class favs extends Base
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

    //我的消息
    public function index()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $where = [];
        $where['user_id'] = $this->info['user_id'];
        $where['ulog_type'] = 2;
        $order = 'ulog_id desc';
        $data = model('Ulog')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']  = [];
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => &$value) {
                $value['data']['pic'] = Env::get('upload.upload_domain').$value['data']['pic'];
                $data['list'][$key] = $value['data'];
                unset($data['list'][$key]['link']);
                unset($data['list'][$key]['type']);
            }
            $res['info'] = [
            "page"      => $data['page'],
            "pagecount" => $data['pagecount'],
            "limit"     => $data['limit'],
            "total"     => $data['total'],
            "list"      => $this->unique_arr($data['list'])
          ];
        }

        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode($res);
    }

    //暂用
    function unique_arr($array2D,$stkeep=false,$ndformat=true)
    {
        // 判断是否保留一级数组键 (一级数组键可以为非数字)
        if($stkeep) $stArr = array_keys($array2D);
        // 判断是否保留二级数组键 (所有二级数组键必须相同)
        if($ndformat) $ndArr = array_keys(end($array2D));
        //降维,也可以用implode,将一维数组转换为用逗号连接的字符串
        foreach ($array2D as $v){
            $v = join(",",$v);
            $temp[] = $v;
        }
        //去掉重复的字符串,也就是重复的一维数组
        $temp = array_unique($temp);
        //再将拆开的数组重新组装
        foreach ($temp as $k => $v)
        {
            if($stkeep) $k = $stArr[$k];
            if($ndformat)
            {
                $tempArr = explode(",",$v);
                foreach($tempArr as $ndkey => $ndval) $output[$k][$ndArr[$ndkey]] = $ndval;
            }
            else $output[$k] = explode(",",$v);
        }
        return $output;
    }
}
