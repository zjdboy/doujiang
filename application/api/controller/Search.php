<?php
namespace app\api\controller;

use think\Controller;
use think\Cache;
use think\Env;

class Search extends Base
{
    public $_param;
    public $info;

    public function __construct()
    {
        parent::__construct();
        //$this->checkToken();
        $this->_param = input();
        //$this->info = $this->authinfo();
    }

    //搜搜
    public function index()
    {
        $this->_param['page'] = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit'] = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $this->_param['wd'] = $this->_param['wd'];
        $this->_param['by'] = $this->_param['by'];

        $where = [];

        if (!empty($this->_param['wd'])) {
            $param['wd'] = urldecode($this->_param['wd']);
            $where['vod_name'] = ['like','%'.$this->_param['wd'].'%'];
        }

        if (!empty($param['by'])) {
            if ($param['by'] == 'time') {
                $order='vod_time_add desc';
            } elseif ($param['by'] == 'hits') {
                $order='vod_hits desc';
            } elseif ($param['by'] == 'score') {
                $order='vod_score desc';
            }
        }

        $keyword_hot = Cache::get("keyword_hot");
        if ($keyword_hot) {
            $cache_keyword = [
            $param['wd'] => $keyword_hot[$param['wd']] + 1,
          ];
            Cache::set("keyword_hot", $cache_keyword, 3600*24*30);
        } else {
            $cache_keyword = [
            $param['wd'] => 1,
          ];
            Cache::set("keyword_hot", $cache_keyword, 3600*24*30);
        }

        $data = model('Vod')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);

        $res['code']  = $data['code'];
        $res['msg']   = $data['msg'];
        $res['info']  = [];

        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $value1['vod_id'] = $value['vod_id'];
                $value1['vod_name'] = $value['vod_name'];
                $value1['vod_pic'] = Env::get('upload.upload_domain').$value['vod_pic'];
                $value1['vod_pic_thumb'] = Env::get('upload.upload_domain').$value['vod_pic_thumb'];
                $value1['vod_hits'] = $value['vod_hits'];
                $value1['vod_up'] = $value['vod_up'];
                $value1['vod_score'] = $value['vod_score'];
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

    public function hot()
    {
        //备用
        $keyword_hot = Cache::get("keyword_hot");
        // echo "<pre>";
        // print_r($keyword_hot);
        // exit();
        $res = ["keyword"=>['无码','新加坡冠希哥大全','巨乳','动漫','熊仓祥子']];
        return json_encode(['code' => 1,'msg' => '获取信息成功','info' => $res]);
    }

    public function loading_word()
    {
      $res = [
        "keyword"=>
          [
          '时间的多少，在于前戏的多少！',
          '长与短，深与浅，试试才知道！',
          '想探索黑洞的秘密么！',
          '尽情的去感受，舒服就嗯啊嗯啊....',
          '生命在于床上运动',
          '别停下我很享受',
          '还在找套，你先准备好',
          '三点的含义是：大点、粗点、久点。',
          '女神哪里跑，我已受不了',
          '你的蝌蚪，会游向哪里',
          '每天都要操，花样很重要',
          '洞房花烛夜是SM最早的文献记录',
          '心急吃不了热豆腐',
          '官人奴家想赏鸟---',
          '男人总沉迷与A与B之间...',
          '女人是唯一可以使用阴谋的动物~'
          ]
      ];
      return json_encode(['code' => 1,'msg' => '获取信息成功','info' => $res]);
    }
}
