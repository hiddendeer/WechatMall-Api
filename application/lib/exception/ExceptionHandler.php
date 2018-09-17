<?php
/**
 * 异常类
*/
namespace app\lib\exception;

use think\exception\Handle;
use think\Exception;


class ExceptionHandler extends Handle
{
    /* 全局异常处理 */
    public function render(Exception $e)
    {
        
    }
}