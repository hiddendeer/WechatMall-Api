<?php

namespace app\api\model;

use think\Model;

class BannerItem extends BaseModel 
{

    //需要隐藏的字段
    protected $hidden = ['id','img_id','banner_id','delete_time','update_time'];

    public function img () {
        return $this->belongsTo('Image','img_id','id');
    }
}