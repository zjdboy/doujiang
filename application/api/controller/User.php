<?php
namespace app\api\controller;

use think\Controller;
use think\Request;
use think\Cache;
use Firebase\JWT\JWT;
// use Nexmo\Client;
// use Nexmo\Client\Credentials\Basic;
use think\Env;
use Twilio\Rest\Client;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, x-requested-with');

class User extends Base
{
    public $_param;

    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
    }

    //获取用户登陆信息
    public function index()
    {
        $this->checkToken();
        return json_encode(['code' => 1, 'msg' => '获取用户信息成功', 'info' => $this->authinfo()]);
        exit();
    }

    //注册
    public function register()
    {
      $sid = 'AC34ba31bc958a9f7292271f008b78039b';
      $token = 'cddbee4efa4de413769370993aa20434';
      $client = new Client($sid, $token);
      $client->messages->create(
          '+15035071418',
          array(
              'from' => '+15608331454',
              'body' => 'Hey Jenny! Good luck on the bar exam!'
          )
      );
      echo "<pre>";
      print_r($client);
      exit();

        $type = intval($this->_param['type']);
        if (Request()->isPost()) {
            if($type == 0){
              $this->_param['user_name'] = $this->genUsername();
              $this->_param['user_pwd'] = "yg123456";
              $this->_param['user_pwd2'] = "yg123456";
              $this->_param['user_nick_name'] = $this->randomNickname();
            }
            if ($type <= 1) {
                $res = model('User')->register($this->_param, $type);
            } else {
                $country_code = $this->_param['country_code'];
                $cache_key =  'SMS'.md5($country_code.$this->_param['user_name']);

                if (!Cache::has($cache_key)) {
                    return json_encode(['code' => 1001, 'msg' => '验证失败']);
                }

                $request_id = Cache::get($cache_key)['id'];

                try {
                    //验证验证码
                    $basic  = new Basic(Env::get('sms.SMS_KEY', '45d3ce9a'), Env::get('sms.SMS_SECRET', 'cOzubBwhsN7UDBIZ'));
                    $client = new Client($basic);
                    $client->verify()->check($request_id, $this->_param['code']);
                    Cache::rm($cache_key);
                } catch (\Exception $e) {
                    return json_encode([
                      'status' => 1002,
                      'msg' => '验证错误'
                      ]);
                    exit;
                }

                $this->_param['user_pwd'] = $this->_param['user_pwd2'] = substr(md5(time()), 0, 6);
                $res = model('User')->register($this->_param, 2);
            }
            if ($res['code'] > 1) {
                return json($res);
            }
            $res = model('User')->login($this->_param, $type);

            if ($res['code'] == 1) {
                $token = [
                  'token' => $this->createJwt($res['userinfo']),
                  'type' => 'Bearer',
                  'expired_at' => time() + 3600,
              ];
                model('User')->settoken($res['info']['user_id'], $token['token'], $token['expired_at']);
                $res['info']['userinfo'] = $res['userinfo'];
                $res['info']['token'] = $token;
                unset($res['userinfo']);
            }
            return json_encode($res);
        }
        exit();
    }

    //登陆接口
    public function login()
    {
        if (Request()->isPost()) {
            $type = $this->_param['type'];

            if ($type <= 1) {
                $res = model('User')->login($this->_param, $type);
            } else {
                $country_code = $this->_param['country_code'];
                $cache_key =  'SMS'.md5($country_code.$this->_param['user_name']);
                if($this->_param['test'] == 'ok'){
                  echo "<pre>";
                  $c = Cache::get($cache_key);
                  print_r($c);
                  exit();
                }
                if (!Cache::has($cache_key)) {
                    return json_encode(['code' => 1001, 'msg' => '验证失败']);
                }

                $request_id = Cache::get($cache_key)['id'];

                try {
                    //验证验证码
                    $basic  = new Basic(Env::get('sms.SMS_KEY', '45d3ce9a'), Env::get('sms.SMS_SECRET', 'cOzubBwhsN7UDBIZ'));
                    $client = new Client($basic);
                    $client->verify()->check($request_id, $this->_param['code']);
                    Cache::rm($cache_key);
                } catch (\Exception $e) {
                    return json_encode([
                      'status' => 1002,
                      'msg' => '验证错误'
                      ]);
                    exit;
                }
                $res = model('User')->login($this->_param, $type);
                if ($res['code'] == 1005) {
                    $this->_param['user_pwd'] = $this->_param['user_pwd2'] = substr(md5(time()), 0, 6);
                    $res = model('User')->register($this->_param, $type);
                    if ($res['code'] == 1) {
                        $res = model('User')->login($this->_param, $type);
                    }
                }
            }

            if ($res['code'] == 1) {
                $admin = Env::get('agent.admin_id', '1');
                $admin = explode(',', $admin);
                if (in_array($res['userinfo']['user_id'], $admin)) {
                    $res['userinfo']['is_admin'] = 1;
                }else{
                    $res['userinfo']['is_admin'] = 0;
                }

                $domain = Env::get('domain.url');
                $domain = explode(",",$domain);
                $res['userinfo']['reward_url'] = $domain[rand(0,count($domain)-1)].'/?reward='.$res['userinfo']['user_reward'];

                $token = [
                  'token' => $this->createJwt($res['userinfo']),
                  'type' => 'Bearer',
                  'expired_at' => time() + 3600,
                ];
                model('User')->settoken($res['info']['user_id'], $token['token'], $token['expired_at']);
                $res['info']['userinfo'] = $res['userinfo'];
                $res['info']['token'] = $token;
                unset($res['userinfo']);
            }
            return json_encode($res);
        }
        exit();
    }

    //退出接口
    public function logout()
    {
        // $info = $this->authinfo();
        // if ($info['user_id'] > 0) {
        //     model('User')->settoken($info['user_id'], '', '');
        // }
        return json_encode(['code' => 1, 'msg' => '退出成功']);
    }

    //发送验证码
    public function smssend()
    {
        $country_code = $this->_param['country_code'];
        $phone = $country_code . $this->_param['phone'];

        if (Request()->isPost()) {
            $cache_key =  'SMS'.md5($phone);

            if (Cache::has($cache_key)) {
                $cache = Cache::get($cache_key);
                $diff_time = $cache['time'] + 60 - time();
                if ($diff_time > 0) {
                    return json_encode(['code' => 1001, 'msg' => '当前获取短信频繁，请'.$diff_time.'秒后重试']);
                }
            }

            try {
                $basic  = new Basic(Env::get('sms.SMS_KEY', '45d3ce9a'), Env::get('sms.SMS_SECRET', 'cOzubBwhsN7UDBIZ'));
                $client = new Client($basic);
                $request_id = $client->verify()->start(['number' => $phone,'brand'  => Env::get('sms.SMS_BRAND', 'Youtiao')])->getRequestId();
                Cache::set($cache_key, ['id' => $request_id,'time' => time()]);
            } catch (\Exception $e) {
                return json_encode(['status' => 1002,'msg' => '验证码发送失败']);
                exit;
            }

            if (!empty($request_id)) {
                return json_encode(['code' => 1, 'msg' => '验证码发送成功']);
            }
        }
        exit();
    }

    //修改密码
    public function setpassword()
    {
        if (Request()->isPost()) {
            $res = model('User')->info($this->_param, $this->authinfo());
            return json_encode(['code' => $res['code'], 'msg' => $res['msg']]);
            exit;
        }
    }

    //更新头像
    public function portrait()
    {
        if (Request()->isPost()) {
            $this->info = $this->authinfo();
            $file = request()->file('file');
            if (empty($file)) {
                return json(['code' => 0, 'msg' => '未找到上传的文件(原因：表单名可能错误，默认表单名“file”)！']);
            }
            if ($file->getMime() == 'text/x-php') {
                return json(['code' => 0, 'msg' => '禁止上传php,html文件！']);
            }

            $upload_image_ext = 'jpg,png,gif';
            if ($file->checkExt($upload_image_ext)) {
                $type = 'image';
            } else {
                return json(['code' => 0, 'msg' => '非系统允许的上传格式！']);
            }

            $uniq = $this->info['user_id'] % 10;
            // 上传附件路径
            $_upload_path = Env::get('upload.upload_dir') . '/user/' . $uniq . '/';

            // 附件访问路径
            $_save_path = Env::get('upload.upload_dir') . '/user/' . $uniq . '/';
            $_save_name = $this->info['user_id'] . '.jpg';

            //不能打包了?
            $_url_path = '/user/' . $uniq . '/' . $_save_name;

            if (!file_exists($_save_path)) {
                mac_mkdirss($_save_path);
            }
            $upfile = $file->move($_upload_path, $_save_name);
            if (!is_file($_upload_path . $_save_name)) {
                return json(['code' => 0, 'msg' => '文件上传失败！']);
            }
            $file = $_save_path . str_replace('\\', '/', $_save_name);
            $config = [
            'thumb_type' => 6,
            'thumb_size' => '100x100',
            ];

            $new_thumb = $this->info['user_id'] . '.jpg';
            $new_file = $_save_path . $new_thumb;
            try {
                $image = \think\Image::open($file);
                $t_size = explode('x', strtolower('100x100'));
                if (!isset($t_size[1])) {
                    $t_size[1] = $t_size[0];
                }
                $res = $image->thumb($t_size[0], $t_size[1], 6)->save($new_file);

                $update = [];
                $update['user_portrait'] = $_url_path;
                $where = [];
                $where['user_id'] = $this->info['user_id'];
                $res = model('User')->where($where)->update($update);
                if ($res === false) {
                    return json(['code' => 0, 'msg' => '更新会员头像信息失败！']);
                }
                return json(['code' => 1, 'msg' => '上传成功!', 'info' =>  ['file' => Env::get('upload.upload_domain') . $_url_path .'?'.mt_rand(1, 9999)]]);
            } catch (\Exception $e) {
                return json(['code' => 0, 'msg' => '生成缩放头像图片文件失败！']);
            }
        }
    }

    //修改
    public function setnickname()
    {
        if (Request()->isPost()) {
            $res = model('User')->editinfo($this->_param, $this->authinfo());
            return json_encode(['code' => $res['code'], 'msg' => $res['msg']]);
            exit;
        }
    }

    public function genUsername(){
            $rand_num1 = str_repeat(rand(0,9),3);
            $lh = rand(0,7);
            $rand_num2 = $lh.($lh+1).($lh+2);
            $rh1 = rand(0,9);
            $rh2 = rand(0,9);
            while($rh1 == $rh2){
                $rh2 = rand(0,9);
            }
            $rand_num3 = str_repeat($rh1,2).str_repeat($rh2,2);

            $rand_num_v = rand(1,3);

            if($rand_num_v == 1){
                $rand_num_len = 3;
            }elseif($rand_num_v == 2){
                $rand_num_len = 3;
            }else{
                $rand_num_len = 4;
            }

            $rand_nums = $this->generate_rand_num(8-$rand_num_len);

            $valstr = "rand_num".$rand_num_v;
            $rand_num = $$valstr;
            $rand_nums_arr = str_split($rand_nums);

            $username = 'yt';
            $rand_insert = rand(0,count($rand_nums_arr)-1);
            foreach ($rand_nums_arr as $k=>$v){
                if($k == $rand_insert){
                    $username .= $rand_num;
                }
                $username .= $v;
            }
            return $username;
    }

    function generate_rand_num($length = 4) {
      $min = pow(10 , ($length - 1));
      $max = pow(10, $length) - 1;
      return rand($min, $max);
    }

    /*
     * 随机昵称
     * @param $male int 性别1男2女
     * @return string
     */
    function randomNickname(){
      $nicheng_tou=array('母狗的','3p的','女奴的','sm的','69的','口爆的','五指的','啪啪的','嘿嘿的','淫乱的','乱伦的','美臀的','白虎的','颜射的','童颜的','熟女的','束缚的','监禁的','调教的','捆绑的','痴女的','拷问的','羞辱的','约炮的','吃精的','自慰的','油条的','开车的','撸管的','快乐的','冷静的','醉熏的','潇洒的','糊涂的','积极的','冷酷的','深情的','粗暴的','温柔的','可爱的','愉快的','义气的','认真的','威武的','帅气的','传统的','潇洒的','漂亮的','自然的','专一的','听话的','昏睡的','狂野的','等待的','搞怪的','幽默的','魁梧的','活泼的','开心的','高兴的','超帅的','留胡子的','坦率的','直率的','轻松的','痴情的','完美的','精明的','无聊的','有魅力的','丰富的','繁荣的','饱满的','炙热的','暴躁的','碧蓝的','俊逸的','英勇的','健忘的','故意的','无心的','土豪的','朴实的','兴奋的','幸福的','淡定的','不安的','阔达的','孤独的','独特的','疯狂的','时尚的','落后的','风趣的','忧伤的','大胆的','爱笑的','矮小的','健康的','合适的','玩命的','沉默的','斯文的','香蕉','苹果','鲤鱼','鳗鱼','任性的','细心的','粗心的','大意的','甜甜的','酷酷的','健壮的','英俊的','霸气的','阳光的','默默的','大力的','孝顺的','忧虑的','着急的','紧张的','善良的','凶狠的','害怕的','重要的','危机的','欢喜的','欣慰的','满意的','跳跃的','诚心的','称心的','如意的','怡然的','娇气的','无奈的','无语的','激动的','愤怒的','美好的','感动的','激情的','激昂的','震动的','虚拟的','超级的','寒冷的','精明的','明理的','犹豫的','忧郁的','寂寞的','奋斗的','勤奋的','现代的','过时的','稳重的','热情的','含蓄的','开放的','无辜的','多情的','纯真的','拉长的','热心的','从容的','体贴的','风中的','曾经的','追寻的','儒雅的','优雅的','开朗的','外向的','内向的','清爽的','文艺的','长情的','平常的','单身的','伶俐的','高大的','懦弱的','柔弱的','爱笑的','乐观的','耍酷的','酷炫的','神勇的','年轻的','唠叨的','瘦瘦的','无情的','包容的','顺心的','畅快的','舒适的','靓丽的','负责的','背后的','简单的','谦让的','彩色的','缥缈的','欢呼的','生动的','复杂的','慈祥的','仁爱的','魔幻的','虚幻的','淡然的','受伤的','雪白的','高高的','糟糕的','顺利的','闪闪的','羞涩的','缓慢的','迅速的','优秀的','聪明的','含糊的','俏皮的','淡淡的','坚强的','平淡的','欣喜的','能干的','灵巧的','友好的','机智的','机灵的','正直的','谨慎的','俭朴的','殷勤的','虚心的','辛勤的','自觉的','无私的','无限的','踏实的','老实的','现实的','可靠的','务实的','拼搏的','个性的','粗犷的','活力的','成就的','勤劳的','单纯的','落寞的','朴素的','悲凉的','忧心的','洁净的','清秀的','自由的','小巧的','单薄的','贪玩的','刻苦的','干净的','壮观的','和谐的','文静的','调皮的','害羞的','安详的','自信的','端庄的','坚定的','美满的','舒心的','温暖的','专注的','勤恳的','美丽的','腼腆的','优美的','甜美的','甜蜜的','整齐的','动人的','典雅的','尊敬的','舒服的','妩媚的','秀丽的','喜悦的','甜美的','彪壮的','强健的','大方的','俊秀的','聪慧的','迷人的','陶醉的','悦耳的','动听的','明亮的','结实的','魁梧的','标致的','清脆的','敏感的','光亮的','大气的','老迟到的','知性的','冷傲的','呆萌的','野性的','隐形的','笑点低的','微笑的','笨笨的','难过的','沉静的','火星上的','失眠的','安静的','纯情的','要减肥的','迷路的','烂漫的','哭泣的','贤惠的','苗条的','温婉的','发嗲的','会撒娇的','贪玩的','执着的','眯眯眼的','花痴的','想人陪的','眼睛大的','高贵的','傲娇的','心灵美的','爱撒娇的','细腻的','天真的','怕黑的','感性的','飘逸的','怕孤独的','忐忑的','高挑的','傻傻的','冷艳的','爱听歌的','还单身的','怕孤单的','懵懂的');
      $nicheng_wei=array('嚓茶','凉面','便当','毛豆','花生','可乐','灯泡','哈密瓜','野狼','背包','眼神','缘分','雪碧','人生','牛排','蚂蚁','飞鸟','灰狼','斑马','汉堡','悟空','巨人','绿茶','自行车','保温杯','大碗','墨镜','魔镜','煎饼','月饼','月亮','星星','芝麻','啤酒','玫瑰','大叔','小伙','哈密瓜，数据线','太阳','树叶','芹菜','黄蜂','蜜粉','蜜蜂','信封','西装','外套','裙子','大象','猫咪','母鸡','路灯','蓝天','白云','星月','彩虹','微笑','摩托','板栗','高山','大地','大树','电灯胆','砖头','楼房','水池','鸡翅','蜻蜓','红牛','咖啡','机器猫','枕头','大船','诺言','钢笔','刺猬','天空','飞机','大炮','冬天','洋葱','春天','夏天','秋天','冬日','航空','毛衣','豌豆','黑米','玉米','眼睛','老鼠','白羊','帅哥','美女','季节','鲜花','服饰','裙子','白开水','秀发','大山','火车','汽车','歌曲','舞蹈','老师','导师','方盒','大米','麦片','水杯','水壶','手套','鞋子','自行车','鼠标','手机','电脑','书本','奇迹','身影','香烟','夕阳','台灯','宝贝','未来','皮带','钥匙','心锁','故事','花瓣','滑板','画笔','画板','学姐','店员','电源','饼干','宝马','过客','大白','时光','石头','钻石','河马','犀牛','西牛','绿草','抽屉','柜子','往事','寒风','路人','橘子','耳机','鸵鸟','朋友','苗条','铅笔','钢笔','硬币','热狗','大侠','御姐','萝莉','毛巾','期待','盼望','白昼','黑夜','大门','黑裤','钢铁侠','哑铃','板凳','枫叶','荷花','乌龟','仙人掌','衬衫','大神','草丛','早晨','心情','茉莉','流沙','蜗牛','战斗机','冥王星','猎豹','棒球','篮球','乐曲','电话','网络','世界','中心','鱼','鸡','狗','老虎','鸭子','雨','羽毛','翅膀','外套','火','丝袜','书包','钢笔','冷风','八宝粥','烤鸡','大雁','音响','招牌','胡萝卜','冰棍','帽子','菠萝','蛋挞','香水','泥猴桃','吐司','溪流','黄豆','樱桃','小鸽子','小蝴蝶','爆米花','花卷','小鸭子','小海豚','日记本','小熊猫','小懒猪','小懒虫','荔枝','镜子','曲奇','金针菇','小松鼠','小虾米','酒窝','紫菜','金鱼','柚子','果汁','百褶裙','项链','帆布鞋','火龙果','奇异果','煎蛋','唇彩','小土豆','高跟鞋','戒指','雪糕','睫毛','铃铛','手链','香氛','红酒','月光','酸奶','银耳汤','咖啡豆','小蜜蜂','小蚂蚁','蜡烛','棉花糖','向日葵','水蜜桃','小蝴蝶','小刺猬','小丸子','指甲油','康乃馨','糖豆','薯片','口红','超短裙','乌冬面','冰淇淋','棒棒糖','长颈鹿','豆芽','发箍','发卡','发夹','发带','铃铛','小馒头','小笼包','小甜瓜','冬瓜','香菇','小兔子','含羞草','短靴','睫毛膏','小蘑菇','跳跳糖','小白菜','草莓','柠檬','月饼','百合','纸鹤','小天鹅','云朵','芒果','面包','海燕','小猫咪','龙猫','唇膏','鞋垫','羊','黑猫','白猫','万宝路','金毛','山水','音响');
      $tou_num=rand(0,350);
      $wei_num=rand(0,325);
      $nicheng=$nicheng_tou[$tou_num].$nicheng_wei[$wei_num];
      return $nicheng;
    }
}
