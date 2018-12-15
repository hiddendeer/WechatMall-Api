<?php
/* 令牌接口的业务逻辑 */
namespace app\api\server;

use app\api\model\User as UserModel;
use app\lib\exception\WeChatException;
use think\Exception;

class UserToken extends Token
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

    /**
     * 请求url接口，返回openid和session_key
     */
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

    /**
     * 获取openid
     * @param array $wxResult 拿到有openid的返回值
     */
    private function grantToken($wxResult)
    {
        //拿到openid
        //数据库里看一下，这个openid是不是已经存在
        //如果存在 则不处理，如果不存在那么新增一条user记录
        //生成令牌，准备缓存数据，写入缓存
        //把令牌返回到客户端去
        $openid = $wxResult['openid'];
        $user = UserModel::getByOpenID($openid);

        if ($user) {

            $uid = $user->id;

        } else {

            $uid = $this->newUser($openid);

        }
    }

    private function saveToCache($cacheValue)
    {
        $key = generateToken();
    }

    /**
     * 需要缓存的数据
     */
    private function prepareCacheValue($wxResult, $uid)
    {
        $cacheValue = $wxResult;
        $cacheValue['uid'] = $uid;
        $cacheValue['scope'] = 16;

        return $cacheValue;
    }

    /**
     * 数据入库函数
     * @param string $openid
     */
    private function newUser($openid)
    {

        $user = UserModel::create([
            'openid' => $openid,
        ]);

        return $user->id;
    }

    /**
     * 异常处理函数
     * @param array $wxResult 携带返回值的数据
     */
    private function processLoginError($wxResult)
    {

        throw new WeChatException([
            'msg' => $wxResult['errmsg'],
            'errCode' => $wxResult['errcode'],
        ]);

    }
}
