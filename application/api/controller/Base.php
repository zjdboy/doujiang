<?php
namespace app\api\controller;

use think\Controller;
use think\Request;
use app\common\controller\All;
use Firebase\JWT\JWT;

header('Access-Control-Allow-Origin:*');
header('Access-Control-Allow-Methods:*');
header('Access-Control-Allow-Headers:Authorization, Content-Type, If-Match, If-Modified-Since, If-None-Match, If-Unmodified-Since, x-requested-with');


class Base extends All
{
    public function __construct()
    {
        parent::__construct();
        $this->_param = input();
        $config = $GLOBALS['config']['site'];
        $this->assign($config);

        //站点关闭中
        if ($config['site_status'] == 0) {
        }
    }

    public function checkToken()
    {
        $header = Request::instance()->header();
        $token = $this->_param['token'];
        $header['authorization'] = !empty($token) ? $token : $header['authorization'];
        if (empty($header['authorization'])) {
            echo json_encode([
                    'status' => 1002,
                    'msg' => 'Token不存在,拒绝访问'
                ]);
            exit;
        } else {
            $checkJwtToken = $this->verifyJwt($header['authorization']);
            if ($checkJwtToken['status'] == 1001) {
                return true;
            }
        }
    }

    //校验jwt权限API
    protected function verifyJwt($jwt)
    {
        $key = md5('Youtiao');
        JWT::$leeway = 3600;
        try {
            $jwtAuth = json_encode(JWT::decode($jwt, $key, array('HS256')));
            $authInfo = json_decode($jwtAuth, true);
            if (!empty($authInfo['user_id'])) {
                $msg = [
                              'status' => 1001,
                              'msg' => 'Token验证通过'
                          ];
            } else {
                $msg = [
                              'status' => 1002,
                              'msg' => 'Token验证不通过,用户不存在'
                          ];
            }
            return $msg;
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            echo json_encode([
                          'status' => 1002,
                          'msg' => 'Token无效'
                      ]);
            exit;
        } catch (\Firebase\JWT\ExpiredException $e) {
            echo json_encode([
                          'status' => 1003,
                          'msg' => 'Token过期'
                      ]);
            exit;
        } catch (Exception $e) {
            return $e;
        }
    }

    //生成 token
    public function createJwt($info)
    {
        $key = md5('Youtiao');
        $token = array(
                "user_id"           => $info['user_id'],
                "user_name"         => $info['user_name'],
                "user_nick_name"    => $info['user_nick_name'],
                "user_portrait"     => $info['user_portrait'],
                "user_pwd"          => $info['user_pwd'],
                "user_reward"       => $info['user_reward'],
                "user_money"       => $info['user_money']
            );
        $jwt = JWT::encode($token, $key);
        return $jwt;
    }

    //token 信息
    public function authinfo()
    {
        $key = md5('Youtiao');
        $header = Request::instance()->header();
        $token = $this->_param['token'];
        $header['authorization'] = !empty($token) ? $token : $header['authorization'];

        try {
            $jwtAuth = json_encode(JWT::decode($header['authorization'], $key, array('HS256')));
            $authInfo = json_decode($jwtAuth, true);
            return $authInfo;
        } catch (\Firebase\JWT\SignatureInvalidException $e) {
            return json(['status' => 1002,'msg' => 'Token无效']);
            exit;
        } catch (\Firebase\JWT\ExpiredException $e) {
            return json(['status' => 1003,'msg' => 'Token过期']);
            exit;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function random(){
      $strs = "QWERTYUIOPASDFGHJKLZXCVBNM1234567890";
      $random = substr(str_shuffle($strs),mt_rand(0,strlen($strs)-11),6);
      return $random;
    }
}
