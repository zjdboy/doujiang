<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class Nuyou extends Base
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

    //视频列表
    public function index()
    {
        $this->_param['page']   = intval($this->_param['page']) < 1 ? 1 : intval($this->_param['page']);
        $this->_param['limit']  = intval($this->_param['limit']) < 20 ? 20 : intval($this->_param['limit']);
        $this->_param['type_id']   = intval($this->_param['type_id']);
        $this->_param['by']   = $this->_param['by'];

        $where=[];
        if ($this->_param['type_id'] > 0) {
            $where = ['type_id' => $this->_param['type_id']];
        }

        if ($this->_param['by'] == 'new') {
            $order='topic_time_add desc';
        } elseif ($this->_param['by'] == 'hit') {
            $order='topic_hits desc';
        } elseif ($this->_param['by'] == 'play') {
            $order='topic_score desc';
        } else {
            $order='topic_time_add desc';
        }

        $list = model('Topic')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);

        $res['code']  = $list['code'];
        $res['msg']   = $list['msg'];
        $res['info']  = [];

        $data1=[];
        $data2=[];

        if (count($list['list'])>0) {
            foreach ($list['list'] as $key => $value) {
                $data1['topic_id']        = $value['topic_id'];
                $data1['topic_name']      = $value['topic_name'];
                $data1['topic_content']   = strip_tags($value['topic_content']);
                $data1['topic_pic']       = Env::get('upload.upload_domain').$value['topic_pic'];
                $data1['topic_pic_thumb'] = Env::get('upload.upload_domain').$value['topic_pic_thumb'];
                $data1['topic_vod_total'] = count(explode(",", $value['topic_rel_vod']));
                $data2[] = $data1;
            }

            //分类
            $data4 = [
            [
              "type_id" => 1,
              "type_name" => "A罩杯",
            ],
            [
              "type_id" => 2,
              "type_name" => "B罩杯",
            ],
            [
              "type_id" => 3,
              "type_name" => "C罩杯",
            ],
            [
              "type_id" => 4,
              "type_name" => "D罩杯",
            ],
            [
              "type_id" => 5,
              "type_name" => "E罩杯",
            ],
            [
              "type_id" => 6,
              "type_name" => "F罩杯",
            ],
          ];

            $res['info'] = [
            "page"      => $list['page'],
            "pagecount" => $list['pagecount'],
            "limit"     => $list['limit'],
            "total"     => $list['total'],
            "list"      => $data2,
            "class"     => $data4
          ];
        }
        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode($res);
    }

    //视频详情
    public function detail()
    {
        $this->_param['vod_id']   = intval($this->_param['vod_id']);

        $where = [];

        if (is_numeric($this->_param['vod_id'])) {
            $where['vod_id'] = ['eq',$this->_param['vod_id']];
        }

        $where['vod_status'] = ['eq',1];

        $data = model('Vod')->infoData($where, '*', 1);
        $detail['vod_id'] = $data['info']['vod_id'];
        $detail['vod_name'] = $data['info']['vod_name'];
        $detail['vod_sub'] = $data['info']['vod_sub'];
        $detail['vod_pic'] = Env::get('upload.upload_domain').$data['info']['vod_pic'];
        $detail['vod_pic_thumb'] = Env::get('upload.upload_domain').$data['info']['vod_pic_thumb'];
        $detail['vod_hits'] = $data['info']['vod_hits'];
        $detail['vod_score'] = $data['info']['vod_score'];
        $detail['vod_up'] = $data['info']['vod_up'];
        $detail['vod_tag'] = $data['info']['vod_tag'];

        if ($data['code'] == 1) {
            $res['code']    = $data['code'];
            $res['msg']     = $data['msg'];
            $res['info']['detail']    = $detail;
        }

        //喜欢
        $where=[];
        //$order = 'vod_time_add desc';
        $data = model('vod')->listData(json_encode($where), $order, 1, 20);
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => &$value) {
                $data1[$key]['vod_id'] = $value['vod_id'];
                $data1[$key]['vod_name'] = $value['vod_name'];
                $data1[$key]['vod_pic'] = Env::get('upload.upload_domain').$value['vod_pic'];
                $data1[$key]['vod_pic_thumb'] = Env::get('upload.upload_domain').$value['vod_pic_thumb'];
                $data1[$key]['vod_time_add'] = $value['vod_time_add'];
            }
        }
        $res['info']['love'] = $data1;

        //评论
        $where = ['comment_rid' => $this->_param['vod_id']];
        //$order = 'vod_time_add desc';
        $data = model('comment')->listData(json_encode($where), $order, 1, 20);
        $data1 = [];
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => &$value) {
                unset($value['data']);
                $value['user_portrait'] = Env::get('upload.upload_domain').$value['user_portrait'];
                foreach ($value['sub'] as $key1 => &$value1) {
                    $value1['user_portrait'] = Env::get('upload.upload_domain').$value1['user_portrait'];
                }
                $data1[$key] = $value;
            }
        }
        $res['info']['comment'] = $data1;

        // echo "<pre>";
        // print_r($res);
        // exit();

        return json_encode($res);
    }

    public function score()
    {
        $id = $this->_param['id'];
        $mid = $this->_param['mid'];
        $score = $this->_param['score'];

        if (empty($id) ||  !in_array($mid, ['1','2','3','8','9'])) {
            return json(['code'=>1001,'msg'=>'参数错误']);
        }

        $mids = [1=>'vod',2=>'art',3=>'topic',8=>'actor',9=>'role'];
        $pre = $mids[$mid];
        $where = [];
        $where[$pre.'_id'] = $id;
        $field = $pre.'_score,'.$pre.'_score_num,'.$pre.'_score_all';
        $model = model($pre);

        $res = $model->infoData($where, $field);
        if ($res['code']>1) {
            return json($res);
        }
        $info = $res['info'];

        if ($info) {
            if ($score) {
                $update=[];
                $update[$pre.'_score_num'] = $info[$pre.'_score_num']+1;
                $update[$pre.'_score_all'] = $info[$pre.'_score_all']+$score;
                $update[$pre.'_score'] = number_format($update[$pre.'_score_all'] / $update[$pre.'_score_num'], 1, '.', '');
                $model->where($where)->update($update);

                $data['score'] = $update[$pre.'_score'];
                $data['score_num'] = $update[$pre.'_score_num'];
                $data['score_all'] = $update[$pre.'_score_all'];
            } else {
                $data['score'] = $info[$pre.'_score'];
                $data['score_num'] = $info[$pre.'_score_num'];
                $data['score_all'] = $info[$pre.'_score_all'];
            }
        } else {
            $data['score'] = 0.0;
            $data['score_num'] = 0;
            $data['score_all'] = 0;
        }
        return json_encode(['code'=>1,'msg'=>'感谢您的参与，评分成功！','info'=>$data]);
    }
}
