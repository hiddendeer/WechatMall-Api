<?php

namespace app\api\model;

class Product extends BaseModel
{
    protected $hidden = [
        'delete_time','create_time','update_time','main_img_id','pivot','from','category_id'
    ];
}