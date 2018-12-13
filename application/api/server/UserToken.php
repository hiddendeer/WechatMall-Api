<?php
/* 令牌接口的业务逻辑 */
namespace app\api\server;

use think\Exception;
use app\lib\exception\WxChatException;

class UserToken
{
    protected $code;
    protected $wxAppID;
    protected $wxAppSecret;
    protected $wxLoginUrl;

    public function __construct($code)
    {
        $this->code = $code;
        $this->wxAppID = config('wx.app_id');
        $this->wxAppSecret = config('wx.app_secret');
        $this->wxLoginUrl = sprintf(config('wx.login_url'), $this->wxAppID, $this->wxAppSecret, $this->code);
      
    }
    public function get()
    {
        $result = curl_get($this->wxLoginUrl);
       
        $wxResult = json_decode($result, true);
     
        if (empty($wxResult)) {
            throw new Exception('获取session_key及openID时错误，微信内部错误');
        } else {
            $loginFail = array_key_exists('errcode', $wxResult);
            if ($loginFail) {
                $this->processLoginError($wxResult);
            } else {
                $this->grantToken($wxResult);
            }
        }
    }

    private function grantToken ($wxResult) {
        //拿到openid
        //数据库里看一下，这个openid是不是已经存在
        //如果存在 则不处理，如果不存在那么新增一条user记录
        //生成令牌，准备缓存数据，写入缓存
        //把令牌返回到客户端去
        $openid =  $wxResult['openid'];
    }

    private function processLoginError ($wxResult) {
     
        throw new WxChatException([
            'msg' => $wxResult['errmsg'],
            'errCode' => $wxResult['errcode']
        ]);
       

    }
}
