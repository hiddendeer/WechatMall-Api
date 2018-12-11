<?php

namespace app\api\model;

use app\api\model\BaseModel;

class Category extends BaseModel
{
    public function img () {
        return $this->belongsTo('Image','topic_img_id','id');
    }

}