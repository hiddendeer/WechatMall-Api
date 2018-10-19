<?php

namespace app\api\model;

use think\Exception;
use think\Db;
use think\Model;

class Banner extends Model
{
    public function items () {
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerById($id)
    {   
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
