<?php
namespace app\api\controller;

use think\Controller;

class Update extends Base
{
    public $_param;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
    }

    //版本管理
    public function index()
    {
        $where = [];
        $where['type'] = 1;
        $order = 'id DESC';
        $data = model('Ver')->listData($where,$order,1,1);
        $res['ios'] = [
          "ver"       => $data['list'][0]['ver'],
          "down_url"  => $data['list'][0]['down_url'],
          "content"   => $data['list'][0]['content'],
          "uptime"    => $data['list'][0]['uptime']
        ];

        $where = [];
        $where['type'] = 2;
        $order = 'id DESC';
        $data = model('Ver')->listData($where,$order,1,1);
        $res['android'] = [
          "ver"       => $data['list'][0]['ver'],
          "down_url"  => $data['list'][0]['down_url'],
          "content"   => $data['list'][0]['content'],
          "uptime"    => $data['list'][0]['uptime']
        ];


        // $res['android'] = [
        //   "ver" => 1,
        //   "down_url" => "https://static.youtiao.live/YouTiao_V1.0.apk",
        //   "content" => "V1.0",
        //   "uptime" => "2019-07-07 00:00:00"
        // ];
        // $res['ios'] = [
        //   "ver" => 1,
        //   "down_url" => "https://static.youtiao.live/YouTiao_V1.0.ipa",
        //   "content" => "V1.0",
        //   "uptime" => "2019-07-07 00:00:00"
        // ];
        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode(['code' => 1, 'msg' => '获取信息成功', 'info' => $res]);
    }
}
