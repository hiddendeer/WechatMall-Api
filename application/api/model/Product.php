<?php

namespace app\api\model;

class Product extends BaseModel
{
    protected $hidden = [
        'delete_time', 'create_time', 'update_time', 'main_img_id', 'pivot', 'from', 'category_id',
    ];

    public function getMainImgUrlAttr($value, $data)
    {

        return $this->prefixImgUrl($value, $data);

    }

    public static function getMostRecent($count)
    {

        $product = self::limit($count)
            ->order('create_time desc')
            ->select();

        return $product;
    }

}
