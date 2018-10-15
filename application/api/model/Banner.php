<?php

namespace app\api\model;

use think\Exception;
use think\Db;

class Banner
{
    public static function getBannerById($id)
    {
        //原生查询
        // $result = Db::query(
        //     'select * from banner_item where banner_id = ?', [$id]);
        
        //查询条件
        $where_arr = [
            'banner_id' => ['=',$id]
        ];
        //查询构造器
        $result = Db::name('banner_item')
        ->where(function ($query) use ($id) {
            $query->where('banner_id','=',$id);
        })
        ->select();

        return $result;
    }
}
