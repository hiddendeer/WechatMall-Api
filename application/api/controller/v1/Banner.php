<?php

namespace app\api\controller\v1;

use app\api\model\Banner as BannerModel;
use app\api\validate\IDMustBePostiveInt;
use app\lib\exception\BannerMissException;

class Banner
{
    /**
     * 获取指定id的banner信息.
     *
     * @url /banner/:id
     * @http GET
     * @id banner的id号
     *
     **/
    public function getBanner($id)
    {
        //对传入的id检验
        (new IDMustBePostiveInt())->gocheck();

        //自定义Model方法
        // $banner = BannerModel::getBannerById($id);

        $banner = BannerModel::find(['banner_id','=',$id]);

        /* 抛出JSON异常处理 */
        if (!$banner) {
            throw new BannerMissException();
        }

        return $banner;
    }
}
