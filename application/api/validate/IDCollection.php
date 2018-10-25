<?php

namespace app\api\validate;

class IDCollection extends BaseValidate
{
    protected $rule = [
        'ids' => 'require|checkIDs'
    ];

    protected $message = [
        'ids' => 'ids参数必须是以逗号分割的多个正整数'
    ];

    public function checkIDs($value)
    {
        $values = explode(',', $value);

        if (empty($values)) {
            return false;
        }

        foreach ($values as $id) {
            if (!$this->isPositiveInteger($id)) {
                return false;
            }
        }

        return true;
    }
}