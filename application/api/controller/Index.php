<?php
namespace app\api\controller;

use think\Controller;
use think\Env;

class Index extends Base
{
    public $_param;
    public $info;

    public function __construct()
    {
        parent::__construct();
    }

    //首页
    public function index()
    {
        $res = array();
        $res['code'] = 1;
        $res['msg'] = "获取数据成功";

        //banner轮播广告
        $where = [];
        $where['ad_type'] = 14; //首页头部广告位
        $order = 'ad_id DESC';
        $data1 = [];
        $data = model('Ad')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $value['ad_img'] = Env::get('upload.upload_domain').$value['ad_img'];
                unset($value['ad_id']);
                unset($value['ad_type']);
                unset($value['ad_title']);
                unset($value['ad_time']);
                $data1[] = $value;
            }
        }
        $res['info']['banner'] = $data1;


        // echo "<pre>";
        // print_r($res);
        // exit();

        //分类
        $where=[];
        $data1=[];
        $data2=[];
        $where['type_mid'] = ['eq','1'];
        $where['type_pid'] = ['eq','0'];
        $order='type_sort asc';
        $data = model('Type')->listData($where, $order);

        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $data2['type_id']   = $value['type_id'];
                $data2['type_name'] = $value['type_name'];
                $data2['type_pic']  = Env::get('upload.upload_domain').$value['type_pic'];
                $data1[] = $data2;
            }
        }
        $res['info']['class'] = $data1;
        // echo "<pre>";
        // print_r($res);
        // exit();

        //女优
        $where = [];
        $where['type_id'] = ['in',"1,2,3,4,5,6,7"];
        $data1=[];
        $data2=[];
        $order = "";
        $data = model('Topic')->listData(json_encode($where), $order, 1, 20);
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => $value) {
                $data2['topic_id']   = $value['topic_id'];
                $data2['topic_name'] = $value['topic_name'];
                $data2['topic_pic']  = Env::get('upload.upload_domain').$value['topic_pic'];
                $data2['topic_pic_thumb']  = Env::get('upload.upload_domain').$value['topic_pic_thumb'];
                $data1[] = $data2;
            }
        }
        $res['info']['nuyou'] = $data1;

        // echo "<pre>";
        // print_r($res);
        // exit();

        //专题
        $where = [];
        $data1 = [];
        $data2 = [];
        $order = "";
        $where['type_id'] = ['eq',0];
        $data = model('Topic')->listData(json_encode($where), $order, 1, 20);

        if (count($data['list'])>0) {
            $data_list = array_chunk($data['list'],2);
            foreach ($data_list as $key => &$value) {
              //专题广告位
              $where = [];
              $where['ad_type'] = 3 + $key;
              $order = 'ad_id DESC';
              $data = model('Ad')->listData(json_encode($where), $order, $this->_param['page'], $this->_param['limit']);
              !empty($data['list'][0]['ad_img']) && $data['list'][0]['ad_img'] = Env::get('upload.upload_domain').$data['list'][0]['ad_img'];
              count($data['list'])>0 && array_push($value,$data['list'][0]);
            }

            foreach ($data_list as $value1) {
              foreach ($value1 as $value2) {
                $topic[] = $value2;
              }
            }

            // echo "<pre>";
            // print_r($topic);
            // exit();

            foreach ($topic as $key => $value3) {
              if($value3['ad_id'] > 0){
                $value3['type'] = 1;
                unset($value3['ad_id']);
                unset($value3['ad_type']);
                unset($value3['ad_time']);
                $data9[] = $value3;
              }else{
                $where = [];
                $where['topic_id'] = ['eq',$value3['topic_id']];
                $res1 = model('Topic')->infoData($where, '*', 1);
                unset($res1['info']['topic_extend']);
                unset($res1['info']['art_list']);

                $data1['topic_id'] = $res1['info']['topic_id'];
                $data1['type'] = 0;
                $data1['topic_name'] = $res1['info']['topic_name'];
                $data1['topic_pic'] = Env::get('upload.upload_domain').$res1['info']['topic_pic'];
                $data1['topic_pic_thumb'] = Env::get('upload.upload_domain').$res1['info']['topic_pic_thumb'];

                if (count($res1['info']['vod_list'])>0) {
                    foreach ($res1['info']['vod_list'] as $key4 => $value4) {
                        $data2[$key4]['vod_id']         = $value4['vod_id'];
                        $data2[$key4]['vod_name']       = $value4['vod_name'];
                        $data2[$key4]['vod_pic']        = Env::get('upload.upload_domain').$value4['vod_pic'];
                        $data2[$key4]['vod_pic_thumb']  = Env::get('upload.upload_domain').$value4['vod_pic_thumb'];
                        $data2[$key4]['vod_score']      = $value4['vod_score'];
                        $data2[$key4]['vod_hits']       = $value4['vod_hits'];
                        $data2[$key4]['vod_time_add']   = $value4['vod_time_add'];
                    }
                }

                $data1['list'] = $data2;
                $data2 = [];
                $data9[] = $data1;
              }
            }
        }
        $res['info']['topic'] = $data9;

        // echo "<pre>";
        // print_r($res['info']['topic']);
        // exit();

        //今日更新
        $where=[];
        //$where['vod_level'] = ['in','6,7,8,9,10,11,12'];
        $order = 'vod_time_add desc';
        $data = model('vod')->listData(json_encode($where), $order, 1, 20);
        $data1 = [];
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => &$value) {
                $data1[$key]['vod_id'] = $value['vod_id'];
                $data1[$key]['vod_name'] = $value['vod_name'];
                $data1[$key]['vod_pic'] = Env::get('upload.upload_domain').$value['vod_pic'];
                $data1[$key]['vod_pic_thumb'] = Env::get('upload.upload_domain').$value['vod_pic_thumb'];
                $data1[$key]['vod_score'] = $value['vod_score'];
                $data1[$key]['vod_hits'] = $value['vod_hits'];
                $data1[$key]['vod_time_add'] = $value['vod_time_add'];
            }
        }
        $res['info']['new'] = $data1;

        //重磅热播
        $where=[];
        $data1 = [];
        //$where['vod_level'] = ['in','6,7,8,9,10,11,12'];
        $order = 'vod_hits desc';
        $data = model('vod')->listData(json_encode($where), $order, 1, 20);
        if (count($data['list'])>0) {
            foreach ($data['list'] as $key => &$value) {
                $data1[$key]['vod_id'] = $value['vod_id'];
                $data1[$key]['vod_name'] = $value['vod_name'];
                $data1[$key]['vod_pic'] = Env::get('upload.upload_domain').$value['vod_pic'];
                $data1[$key]['vod_pic_thumb'] = Env::get('upload.upload_domain').$value['vod_pic_thumb'];
                $data1[$key]['vod_score'] = $value['vod_score'];
                $data1[$key]['vod_hits'] = $value['vod_hits'];
                $data1[$key]['vod_time_add'] = $value['vod_time_add'];
            }
        }
        $res['info']['hot'] = $data1;

        // echo "<pre>";
        // print_r($res);
        // exit();
        return json_encode($res);
    }
}
