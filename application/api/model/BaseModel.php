<?php

namespace app\api\model;

use think\Model;

class BaseModel extends Model
{
    //拼接url
    protected function prefixImgUrl($value, $data)
    {

        $finaUrl = $value;

        if ($data['from'] == 1) {
            return $finaUrl = config('setting.img_prefix') . $value;
        }

        return $finaUrl;
        
    }
}