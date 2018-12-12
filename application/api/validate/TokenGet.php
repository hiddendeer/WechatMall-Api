<?php

namespace app\api\validate;

class TokenGet extends BaseValidate
{
    protected $rules = [
        'code' => 'require|isNotEmpty'
    ];
}