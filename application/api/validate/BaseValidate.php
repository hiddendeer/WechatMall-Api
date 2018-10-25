<?php
/**
 * 验证器基类
*/
namespace app\api\validate;

use think\Validate;
use think\Request;
use think\Exception;
use app\lib\exception\ParameterException;

class BaseValidate extends Validate
{
    public function gocheck () {
        
        //验证http传入的参数
        $request = Request::instance();
        $params = $request->param();

        $result = $this->batch()->check($params);

        if (!$result) {
            $e = new ParameterException([
                'msg' => $this->error
            ]);

            throw $e;
            
        }else {
            return true;
        }

    }

    protected function isPositiveInteger($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return $field.'必须是正整数';
        }
    }
    
}
