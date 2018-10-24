<?php

namespace app\api\model;

class Image extends BaseModel
{
    protected $hidden = ['id','from','delete_time','update_time'];

    //调用读取器,拼接url
    public function getUrlAttr ($value,$data) {

        return $this->prefixImgUrl($value,$data);

    }
}