<?php
/**
 * 异常类
 */
namespace app\lib\exception;

use think\Exception;
use think\exception\Handle;

class ExceptionHandler extends Handle
{

    private $code;
    private $msg;
    private $errorCode;
    //需要返回客户端当前请求的URL地址

    /* 全局异常处理 */
    public function render(Exception $e)
    {
        if ($e instanceof BaseException) {
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {

        }
        $result = [
            'msg' => $this->msg,
            'error_code' => $this->errorCode,
        ];

    }
}
