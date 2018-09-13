<?php
namespace app\api\validate;

use think\Exception;
use think\Request;
use think\Validate;

class BaseValidate extends Validate
{
    public function gocheck()
    {

        /* 获取所有http传入的参数 */
        $request = Request::instance();
        $params = $request->param();

        /* 检验参数规则 */
        $result = $this->check($params);

        if (!$result) {
            $error = $this->error;
            throw new Exception($error);
        } else {
            return true;
        }

    }
}
