<?php
namespace app\api\validate;

use app\api\validate\BaseValidate;

class IDMustPostiveInt extends BaseValidate
{
    protected $rule = [
        'id' => 'require|isPositiveInt',
    ];

    protected function isPositiveInt($value, $rule = '', $data = '', $field = '')
    {
        if (is_numeric($value) && is_int($value + 0) && ($value + 0) > 0) {
            return true;
        } else {
            return $field . '不正确';
        }
    }

}
