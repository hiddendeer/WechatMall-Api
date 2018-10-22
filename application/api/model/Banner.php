<?php

namespace app\api\model;

use think\Exception;
use think\Db;
use think\Model;

class Banner extends Model
{
    //需要隐藏字段
    protected $hidden = ['delete_time','update_time'];

    public function items () {
        return $this->hasMany('BannerItem','banner_id','id');
    }

    public static function getBannerById($id)
    {   
        $banner = self::with(['items','items.img'])
            ->find($id);

        return $banner;

    }
}
