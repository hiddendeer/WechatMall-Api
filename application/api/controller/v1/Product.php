<?php

namespace app\api\controller\v1;

use app\api\model\Product as ProductModel;
use app\api\validate\Count;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\ProductException;

class Product
{
    public function getRecent($count = 15)
    {
        //参数合法性验证
        (new Count())->goCheck();

        $products = ProductModel::getMostRecent($count);

        if ($products->isEmpty()) {
            throw new ProductException();
        }

        $products = $products->hidden(['summary']);

        return $products;
    }

    public function getAllInCategory($id)
    {
        (new IDMustBePostiveInt())->gocheck();

        $products = ProductModel::getProductsByCategoryID($id);
        $products->hidden(['summary']);
        
        if ($products->isEmpty()) {
            throw new ProductException();
        }

        return $products;
    }

    public function getOne($id){
        (new IDMustBePostiveInt())->gocheck();

        
    }
}
