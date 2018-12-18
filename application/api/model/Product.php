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

    public function imgs()
    {
        return $this->hasMany('ProductImage', 'product_id', 'id');
    }

    public function properties()
    {
        return $this->hasMany('ProductProperty', 'product_id', 'id');
    }

    public static function getMostRecent($count)
    {
        //限制条数
        $products = self::limit($count)
            ->order('create_time desc')
            ->select();

        return $products;
    }

    public static function getProductsByCategoryID($categoryID)
    {
        $products = self::where('category_id', '=', $categoryID)->select();

        return $products;
    }

    public static function getProductDetail($id)
    {
        $product = self::with([
            'imgs' => function ($query) {
                $query->with(['imgUrl'])
                    ->order('order', 'asc');
            },
        ])
            ->with(['properties'])
            ->find($id);

        return $product;
    }

}
