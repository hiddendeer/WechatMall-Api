<?php

/* 分类列表接口 */

namespace app\api\controller\v1;

use app\api\model\Category as CategoryModel;
use app\lib\exception\CategoryException;

class Category
{

    public function getAllCategories()
    {

        $categories = CategoryModel::all([11, 12], 'img');

        if ($categories->isEmpty()) {
            throw new CategoryException();
        }

        return $categories;

    }

}
