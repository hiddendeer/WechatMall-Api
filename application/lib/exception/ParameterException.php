<?php 
/**
 *验证id合法性自定义异常处理类 
 */

namespace app\lib\exception;

class ParameterException extends BaseException
{
  public $code = 400;
  public $msg = '参数错误';
  public $errorCode = 10000;

}